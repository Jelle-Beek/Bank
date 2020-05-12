//libraries
#include <Wire.h>
#include <ESP8266WiFi.h>

//connection stuff
const char* ssid     = "REVELATION-3";
const char* password = "SalvadoR2205";

const char* host = "145.24.222.43";

String data;
String postVariableCard = "pasnummer=";
String pasnummer;
String postVariableKey = "key=";
char key;

String printInformatie = "85:j:50,20,10,05,..";


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

  delay(200);
}


void post(){
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }

  client.println("POST /php/arduino.php HTTP/1.1");
  client.print("Host: ");
  client.println(host);
  client.println("User-Agent: Arduino/1.0");
  client.println("Connection: close");
  client.println("Content-Type: application/x-www-form-urlencoded");
  client.print("Content-Length: ");
  client.println(data.length());
  client.println();
  client.print(data);

  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
}


//void printen(){
//  int bedrag = printInformatie.substring(0,2).toInt();
//  if (printInformatie.substring(3,4) == "j"){
////    Wire.beginTransmission(13);
////    Wire.write(bedrag);
////    Wire.endTransmission();
//  }
//
// 
//  for(int positie = 5; printInformatie.substring(positie,positie+2) != ".."; positie += 3){
//    String biljet = printInformatie.substring(positie,positie+2);
//    if(biljet == "50"){
//      //zet motor van 50 aan
//    } else if(biljet == "20"){
//      
//    } else if(biljet == "10"){
//      
//    } else if(biljet == "05"){
//      
//    }    
//  }  
//}


void informatie(){
  Wire.requestFrom(13,12);
   key = Wire.read();
   pasnummer = "";

   while(Wire.available() > 0){ // loop through all but the last
      char c = Wire.read(); // receive byte as a character
      if(isAlphaNumeric(c) || c == ' '){
      pasnummer.concat(c);
      } else pasnummer.concat('.');
      delay(10);
   }

  data = postVariableCard + pasnummer + "&" + postVariableKey + key;
  Serial.println("----------------------------------------");
  Serial.println(data);
}
