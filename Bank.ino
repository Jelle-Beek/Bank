#include <SPI.h>
#include <MFRC522.h>
#include <Keypad.h>
 
#define SS_PIN 10
#define RST_PIN 9
MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.

const byte ROWS = 4; 
const byte COLS = 4;
byte rowPins[ROWS] = {4, 5, 6, 7}; //begin kant van ster 
byte colPins[COLS] = {A4, A3, A2, A1};

char keyMap [ROWS] [COLS] = { 
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};

Keypad myKeypad = Keypad( makeKeymap(keyMap), rowPins, colPins, ROWS, COLS);

String content = "";
String password;

String input;
int pos = 0;
 
void setup() 
{
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  Serial.println("Approximate your card to the reader...");
  Serial.println();

}
void loop() {
  if(content == ""){
    RFID();
  } else {
    if (content.substring(1) == "1A FD F3 0B"){
      getPassword();
      keypadLezen();
    }
  }
  
 
} 



void getPassword(){
  // ----------------------------------database stuff
  password = "1234";
}


void keypadLezen(){
 

  char whichKey = myKeypad.getKey(); 
    if (whichKey) {
      switch (whichKey) {
        case '*':
          reset();
        break; 
    
        case '#':
          if (password != input){
              Serial.println("fout");
              //-------------------------actie voor fout
            }
            else {
              Serial.println("goed");
              //------------------------actie voor goed
            }
        break;
    
        default:
          input+= whichKey;

          Serial.println(input);
        break;    
    }
  }

}


void reset() {
  input = "";
}


void RFID(){
    // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  Serial.print("UID tag :");
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     Serial.println();
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
//  Serial.println();
//  Serial.print("Message : ");
  content.toUpperCase();
 
}
