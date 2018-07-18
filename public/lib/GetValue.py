# -*- coding: utf-8 -*-
import serial
import numpy as np
import datetime
import sys
from time import sleep

def main():
    # COMポートを指定してシリアル通信開始
    # /dev/ttyACM0
    # /dev/usbmodem1421
    ser = serial.Serial('/dev/ttyACM0',9600,timeout=1)

    # 引数
    # 第1引数 : args[1]
    # 第2引数 : args[2]
    args = sys.argv
    try :
        flag = args[1] + ',' + args[2] + ',' + args[3]
        flag2 = flag.encode('utf-8')

        ser.write(flag2)
        ser.close()
    except:
        flag = args[1]
        flag2 = flag.encode('utf-8')

        num = 0
        while num < 3:
            ser.write(flag2)
            sleep(1)

            line = ser.readline()
            line2 = line.rstrip().decode('utf-8')

            try :
                all_sensors = line2.split(',')
            except:
                all_sensors = "取得がうまくいかなかった"

            num += 1
        try:
            print(all_sensors[0])
            print(all_sensors[1])
            print(all_sensors[3])
            print(all_sensors[2])
            print(all_sensors[4])
            print(all_sensors[5])
        except:
            print("取得がうまくいかなかった")
        
        ser.close()

if __name__ == '__main__':
    main()
