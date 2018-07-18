/*
  [p,(duty比),(cycle)]を入力
  温湿度表示: 'a'を入力
  LEDの点滅を止める場合：'e'を入力
  10秒毎に温湿度，土壌湿度の値を取得（割り込み処理）
*/

#include <DHT.h>
#define DHTTYPE DHT22
#define DHT22_PIN 7 //温湿度
#define Soil_PIN1 3
#define Soil_PIN2 4 
#define Soil_PIN3 5 
#define Soil_PIN4 6 
#define LED_PIN1 10
DHT dht(DHT22_PIN, DHTTYPE);

void flash() { 
  char humidity[10];
  char temperature[10];

  float h  = dht.readHumidity();
  float t  = 5.0/9.0*(dht.readTemperature(true)-32.0);

  // 小数hを6文字(小数点以下2文字)の文字列に変換
  dtostrf(h, 6, 2,humidity );
  dtostrf(t, 6, 2, temperature);
        
   // 温湿度，土壌湿度をひとつのString型変数
   String postData = humidity;
   postData.concat(",");
   postData.concat(temperature);
   postData.concat(",");
   postData.concat(Soil_moisture(analogRead(A0)));
   postData.concat(",");
   postData.concat(Soil_moisture(analogRead(A1)));
   postData.concat(",");
   postData.concat(Soil_moisture(analogRead(A2)));
   postData.concat(",");
   postData.concat(Soil_moisture(analogRead(A3)));
   Serial.println(postData);  
}

void setup() {
  pinMode(DHT22_PIN, INPUT);
  pinMode(LED_PIN1, OUTPUT);
  Serial.begin(9600);
}

void loop()
{ 
   //Serial.println('a');
  if(Serial.available() > 0){ 
          float duty = 0;
          float cycle = 0;
          float LED_ON = 0;
          float LED_OFF = 0;
          char LED_status;
          String temp = Serial.readString();
          String temp2[3] = {"\0"}; //分割された文字列をか格納する配列
           if(temp[0] == 'a'){
            flash();
           }
           if(temp[0] == 'p'){
              //分割数 = 分割処理(文字列,区切り文字,配列)
              int index = split(temp, ',', temp2);
              //結果表示
              for(int i=0; i<index; i++){
                //Serial.println(temp2[i]);
              }
              //文字列から数値に変換
              duty = temp2[1].toFloat(); 
              cycle = temp2[2].toFloat();
              LED_ON = cycle * duty; 
              LED_OFF = cycle * (1-duty);
              //Serial.println(LED_ON,7); //小数点以下7位まで出力

              while(1){
                if(Serial.available()){
                    LED_status = Serial.read();
                    //Serial.println(LED_status);
                      if(LED_status == 'a'){ //点滅中にaを入力
                        flash();
                      }
                      if(LED_status == 'e'){ //点滅中にeを入力
                        break; //無限ループ終了
                      }
                }
               digitalWrite(LED_PIN1, HIGH);
               delay(LED_ON);
               digitalWrite(LED_PIN1, LOW);
               delay(LED_OFF); 
              }
          }
       }
    }          

 /*
       # the sensor value description
      "1" # 0  ~300     dry soil
      "2" # 300~700     humid soil
      "3" # 700~950     in water
                                     */
String Soil_moisture(int soil){
  
     if(0 <= soil && soil < 300 ){
       return("1"); 
     }
     else if(300 <= soil && soil < 700){
       return("2");
     }
     else{
       return("3");
     }
}

int split(String data, char delimiter, String *dst){
  int index = 0;
  int arraySize = (sizeof(data)/sizeof((data)[0]));
  int datalength = data.length();
  for(int i=0; i<datalength; i++){
    char tmp = data.charAt(i);
    if(tmp == delimiter){
      index++;
      if(index > (arraySize - 1)) return -1;
    }
    else dst[index] += tmp;
  }
  return(index + 1);
}


  
