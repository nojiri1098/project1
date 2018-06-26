# coding: UTF-8

# MacとArduinoが接続できているかどうかを確認するプログラム

import serial
import time

print os.path.abspath(__file__)
break

ser = serial.Serial('/dev/cu.usbmodem1421', 9600)
time.sleep(3)

    try:
        ser.write("5".encode('ascii'))
        line = ser.readline()
        line = line.decode('ascii')
        line = line.rstrip()
        print line
        time.sleep(1)
    except KeyboardInterrupt:
        break

ser.close()