//libraries
#include <Wire.h>
#include <ESP8266WiFi.h>

//connection stuff
const char* ssid     = "Ziggo94EB696";
const char* password = "d6yehVs4xned";

const char* host = "145.24.222.43";

String data;
String postVariableCard = "pasnummer=";
String pasnummer;
String postVariableKey = "key=";
char key;

boolean bezig = false;
String printInformatie = "";



void setup() {
  Wire.begin(4,5); 
  Serial.begin(115200);

  //connect esp to wifi
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
  informatie();
  post();


  if(bezig && pasnummer == "................") {
    getBedrag();
    if(printInformatie.length() > 5){
      printen();
    }
  }
  delay(200);
}

void getBedrag()  {
  WiFiClient client;
  String line;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  String url = "/php/arduino_opgevraagd.php"; //alallaala
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  while(client.available()){
    line = client.readStringUntil('\r');
  }

  printInformatie = line;
  Serial.print("printinformatie is:");
  Serial.print(printInformatie);
  Serial.println();
  bezig = false;
}

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

void printen(){
  int bedrag = printInformatie.substring(1,3).toInt();
  if (printInformatie.substring(4,5) == "j"){
    Wire.beginTransmission(13);
    Wire.write(bedrag);
    Wire.endTransmission();
  }
  
  for(int positie = 6; printInformatie.substring(positie,positie+2) != ".."; positie += 3){
    String biljet = printInformatie.substring(positie,positie+2);
    if(biljet == "50"){
      //zet motor van 50 aan
      Serial.println("50");
    } else if(biljet == "20"){
      Serial.println("20");
    } else if(biljet == "10"){
      Serial.println("10");
    } else if(biljet == "05"){
      Serial.println("05");
    }    
    delay(100);
  }
  printInformatie = "";
}

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
