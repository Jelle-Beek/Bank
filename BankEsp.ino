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



  delay(100);
  

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

  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
}


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

   Serial.println(pasnummer);

   

  data = postVariableCard + pasnummer + "&" + postVariableKey + key;
  Serial.println();
  Serial.println(data);
  Serial.println();
}
