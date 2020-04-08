#include <SPI.h>
#include <MFRC522.h>
#include <Keypad.h>
 
#define SS_PIN 10
#define RST_PIN 9
MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.

const byte ROWS = 4; 
const byte COLS = 4;
byte rowPins[ROWS] = {4, 5, 6, 7}; //begin kant van ster 
byte colPins[COLS] = {8, 9, 10, 11};

char keyMap [ROWS] [COLS] = { 
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};

Keypad myKeypad = Keypad( makeKeymap(keyMap), rowPins, colPins, ROWS, COLS);

String content;
 
void setup() 
{
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  Serial.println("Approximate your card to the reader...");
  Serial.println();

}
void loop() {
  if(content.equals(null)){
    RFID();
  } else {
    getPassword();
    keypadLezen();
  }
  
 
} 



void getPassword(){
  //database stuff
}


void keypadLezen(){
  String input;
  int pos = 0; 

  char whichKey = myKeypad.getKey(); 
    if (whichKey) {
      switch (whichKey) {
        case '*':
          reset();
        break; 
    
        case '#':
          if (password != input){
              //-------------------------------foute pincode
            }
            else {
              //-------------------------------goede pincode
            }
        break;
    
        default:
          input[pos] = whichKey;
          pos++;
        break;    
    }
  }

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
//     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
//     Serial.print(mfrc522.uid.uidByte[i], HEX);
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
//  Serial.println();
//  Serial.print("Message : ");
  content.toUpperCase();
 
}
