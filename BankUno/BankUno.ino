#include <SPI.h>
#include <MFRC522.h>

#include <Keypad.h>

#include <Wire.h>

#include "Adafruit_Thermal.h"
#include "SoftwareSerial.h"
#include "RTClib.h"

//RFID stuff
#define SS_PIN 10
#define RST_PIN 9
MFRC522 mfrc522(SS_PIN, RST_PIN);

//printer stuff (TX = yellow(RX printer), RX = green(TX printer))
#define TX_PIN 2
#define RX_PIN 8

SoftwareSerial mySerial(RX_PIN, TX_PIN);
Adafruit_Thermal printer(&mySerial);
RTC_Millis rtc;


const byte ROWS = 4; 
const byte COLS = 4;
byte rowPins[ROWS] = {4, 5, 6, 7}; //begin kant van ster 
byte colPins[COLS] = {A3, A2, A1, 3};

char keyMap [ROWS] [COLS] = { 
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};

Keypad myKeypad = Keypad( makeKeymap(keyMap), rowPins, colPins, ROWS, COLS);

String content = "";
char key = '\0';
char pasnummer[11];

boolean boolPrint = false;
int bedrag = 0;

void setup() {
  Wire.begin(13); 
  Wire.onRequest(requestEvent);
  Wire.onReceive(receiveEvent);
  
  Serial.begin(9600);
  SPI.begin();
  mfrc522.PCD_Init();

  printer.begin();

  attachInterrupt(digitalPinToInterrupt(3), keypadLezen, RISING);
  
}


void loop() {
  if(content == ""){
    RFID();
    content.substring(1).toCharArray(pasnummer, 12);
  } else{
    keypadLezen();
  }
  

//  if (boolPrint){
//    printBon();
//  }
  Serial.println(content);
  Serial.println(key);
  delay(100);
}

void receiveEvent(int bytes) {
  bedrag = Wire.read();
  boolPrint = true;
}


void requestEvent() {
  Wire.write(key);
  Wire.write(pasnummer);
  key = 0;
}



void keypadLezen(){
  char whichKey = myKeypad.getKey(); 
  if(whichKey){
    if(whichKey == 'D'){
      content = "";
    }
    key = whichKey;
  }
}

void RFID(){
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return;
  }
  if (!mfrc522.PICC_ReadCardSerial()){
    return;
  }
  
  Serial.print("UID tag :");
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++){
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     Serial.println();
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  content.toUpperCase();
}


void printBon(){
  rtc.begin(DateTime(F(__DATE__), F(__TIME__)));
  DateTime now = rtc.now();

  
  // NAAM BANK
  printer.justify('C');
  printer.setSize('L');
  printer.println(F("BATBANK\n"));  
  printer.justify('L');
  printer.setSize('S');

  // DATUM
  printer.print(F("Datum : "));
  printer.print(now.day(), DEC);
  printer.print('/');
  printer.print(now.month(), DEC);
  printer.print('/');
  printer.println(now.year(), DEC);

  // TIJD
  printer.print(F("Tijd : "));
  printer.print(now.hour(), DEC);
  printer.print(':');
  printer.print(now.minute(), DEC);
  printer.print(':');
  printer.println(now.second(), DEC);
  printer.println();

  // REKENING NUMMER
//  printer.println("Kaart nummer : *********\n");

  // HOEVEELHEID GELD
  printer.setSize('M');
  printer.print("Opgenomen bedrag : ");
  printer.println(bedrag);
  printer.println();
  
  // BEDANKT ...
  printer.justify('C');
  printer.setSize('M');
  printer.println(F("Bedankt voor het gebruiken van"));
  printer.println(F("onze bank!\n"));

  boolPrint = false; 
  
}
