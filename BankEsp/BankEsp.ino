/*----------- I2C library ----------- */
#include <Wire.h>

/*----------- WIFI library en setup ----------- */
#include <ESP8266WiFi.h>\

const char* ssid     = "Het was maar een...";
const char* password = "SalvadoR2205";

const char* host = "145.24.222.43";

/*----------- Pins voor de motor ----------- */
#define enA 13
#define in1 12
#define in2 14

/*----------- Variabele voor het versturen/ontvangen van data naar de server ----------- */
String data;
String postVariableCard = "pasnummer=";
String pasnummer;
String postVariableKey = "key=";
char key;

String printInformatie = "";

/*----------- Andere variabele ----------- */
boolean bezig = false;


void setup() {
  //Begin een I2C verbinding met de arduino UNO
  Wire.begin(4,5);

  //Start de seriële monitor
  Serial.begin(115200);

  //Setup van de motor
  pinMode(enA, OUTPUT);
  pinMode(in1, OUTPUT);
  pinMode(in2, OUTPUT);
  motor1Uit();

  //Verbind de ESP met het WIFI-netwerk
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}


void loop() {
  //Er wordt eerst informatie opgevraagd van de UNO en vervolgens wordt er informatie geupload naar de server
  informatie();
  post();

  //Als er bezig is met pinnen en de pas wordt weggehaald, vraag informatie van de server over transactie, als die informatie langer is dan 5, begin met printen
  if(bezig && pasnummer == "................") {
    getBedrag();
    if(printInformatie.length() > 5){
      printen();
    }
  }
  delay(200);
}


/* Stuurt een get request naar de server voor de informatie om te printen, hij slaat de laatste regel (de echo van server) op */
void getBedrag()  {
  WiFiClient client;
  String line;
  const int httpPort = 80;

  //Verbind en stuur het request
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
//  String url = "/php/arduino_opgevraagd.php";
//  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
//               "Host: " + host + "\r\n" + 
//               "Connection: close\r\n\r\n");

  client.println("GET /php/arduino_opgevraagd.php HTTP/1.1");
  client.print  ("Host: ");
  client.println(host);
  client.println("Connection: close");
  client.println();
               
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }

  //Leest de laatste regel
  while(client.available()){
    line = client.readStringUntil('\r');
  }
  printInformatie = line;
  Serial.print("printinformatie is:");
  Serial.print(printInformatie);
  Serial.println();
  bezig = false;                                    //Zet bezig uit na de transactie voltooid is
}

/* Stuurt een post request naar de server */
void post(){
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }

  client.println("POST /php/arduino.php HTTP/1.1");
  client.print  ("Host: ");
  client.println(host);
  client.println("User-Agent: Arduino/1.0");
  client.println("Connection: close");
  client.println("Content-Type: application/x-www-form-urlencoded");
  client.print  ("Content-Length: ");
  client.println(data.length());
  client.println();
  client.print  (data);

  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  Serial.println();
}


/* Leest de string van de server uit en zorgt dat de juiste handelingen worden gedaan */
void printen(){
  // Leest de eerste 2 cijfers (het totale bedrag) en check of de bon geprint moet worden (het vierde karakter)
  int bedrag = printInformatie.substring(1,3).toInt();
  if (printInformatie.substring(4,5) == "j"){
    Wire.beginTransmission(13);
    Wire.write(bedrag);
    Wire.endTransmission();
  }

  // Leest de rest van de string uit en print de juiste biljetten
  for(int positie = 6; printInformatie.substring(positie,positie+2) != ".."; positie += 3){
    String biljet = printInformatie.substring(positie,positie+2);
    if(biljet == "50"){
      Serial.println("50");
    } else if(biljet == "20"){
      Serial.println("20");
      motor1Aan();
      delay(1000);
      motor1Uit();
    } else if(biljet == "10"){
      Serial.println("10");
    } else if(biljet == "05"){
      Serial.println("05");
    }    
    delay(100);
  }
  printInformatie = "";
}


/* Vraagt het pasnummer en de key aan de UNO en zet dit in een string voor het sturen naar de server */
void informatie(){
  Wire.requestFrom(13,17);
  key = Wire.read();
  pasnummer = "";

   while(Wire.available() > 0){ // loop through all but the last
      char c = Wire.read(); // receive byte as a character
      if(isAlphaNumeric(c) || c == '-'){
      pasnummer.concat(c);
      } else pasnummer.concat('.');
      delay(10);
   }
   if(pasnummer != "................") {
    bezig = true;
   }

  data = postVariableCard + pasnummer + "&" + postVariableKey + key;
  Serial.println("----------------------------------------");
  Serial.println(data);
}



/* Functies om motoren aan en uit te zetten */
void motor1Aan(){
  digitalWrite(enA, HIGH);
  digitalWrite(in1, HIGH);
  digitalWrite(in2, LOW);
}

void motor1Uit(){
  digitalWrite(in1, LOW);
  digitalWrite(in2, LOW);
}
