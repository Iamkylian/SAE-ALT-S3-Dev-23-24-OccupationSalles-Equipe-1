

import paho.mqtt.client as mqtt
import json
import base64

# config
mqttServer = "chirpstack.iut-blagnac.fr"
appID = "6"
deviceID = "**DEVEUI de votre device**"

blue = "Ymx1ZQ=="
orange = "b3Jhbmdl"

print("Starting...")

# callback appele lors de la reception d'un message
def get_data(mqttc, obj, msg):
    print(msg)
    pass

# creation du client
mqttc = mqtt.Client()
mqttc.connect(mqttServer, port=1883, keepalive=60)

mqttc.on_message = get_data

# soucription au device
mqttc.subscribe("application/"+appID+"/device/"+deviceID+"/event/up", 0)

mqttc.loop_forever()

