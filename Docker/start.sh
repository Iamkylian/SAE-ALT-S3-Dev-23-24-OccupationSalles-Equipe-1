#!/bin/bash

python3 -m unittest Test-Device.py &
python3 -m unittest Test-Battery.py & 
python -u device.py &
python -u battery.py
