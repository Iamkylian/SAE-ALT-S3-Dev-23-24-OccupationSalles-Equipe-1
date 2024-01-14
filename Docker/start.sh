#!/bin/bash

python3 -m pip install paho-mqtt
pip install cryptography
pip install pymysql 
python -u Test-Device.py &
python -u Test-Battery.py &
python -u device.py &
python -u battery.py