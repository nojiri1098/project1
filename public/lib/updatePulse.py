# -*- coding: utf-8 -*-
import serial
import numpy as np
import datetime
import sys

def main():
    # COMポートを指定してシリアル通信開始
    # /dev/ttyACM0
    # /dev/usbmodem1421
    ser = serial.Serial('/dev/tty.usbmodem1411',9600,timeout=1)

    # 引数
    # 第1引数 : args[1]
    # 第2引数 : args[2]
    args = sys.argv
    flag = args[1] + ',' + args[2] + ',' + args[3]
    print(flag)
    flag2 = flag.encode('utf-8')

    #文字列送信
    ser.write(flag2)

    ser.close()

if __name__ == '__main__':
    main()
