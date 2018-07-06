# -*- coding: utf-8 -*-

import sys
import serial
import time

if __name__=='__main__':
    #引数がある場合 [第1引数 => sys.argv[1], 第2引数 => sys.argv[2]]

    ser = serial.Serial('/dev/cu.usbmodem1421', 9600)

    ser.write("5".encode('ascii'))
    line = ser.readline()
    print line

ser.close()
