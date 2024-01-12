#!/bin/bash

python3 -m pip install paho-mqtt
pip install cryptography
pip install pymysql 
python -u device.py &
python -u battery.py