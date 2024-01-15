#!/bin/bash

python3 -m pip install paho-mqtt
pip install cryptography
pip install pymysql 
python3 -m unittest Test-Device.py &
python3 -m unittest Test-Battery.py & 
python -u device.py &
python -u battery.py
