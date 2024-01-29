import paho.mqtt.client as mqtt
import json
import base64
import pymysql
import time
from subprocess import run
from time import sleep

# connection to db
connection = pymysql.connect(
    host="db", 
    port=3306, 
    user="root", 
    passwd="ROOT_PASSWORD", 
    database="capteursDB")
cursor = connection.cursor()

# config
mqttServer = "chirpstack.iut-blagnac.fr"

print("\n \033[95m ---------------------------------- CONNECTED TO BROKER ---------------------------------- \033[0m \n")

print("Starting...")

def get_batteryLevel(mqttc, obj, msg):
    print("----- BATTERY LEVEL -----")
    print(msg.topic + "\n\n")
    data = json.loads(msg.payload)
    #print(data)
    insertBatteryLevel(data['deviceName'],data['batteryLevel'])
    
    pass

def insertBatteryLevel(deviceName,level):
    # Fait une requete pour savoir si le device existe deja
    query = "SELECT COUNT(*) FROM Battery,Device WHERE Device.id = Battery.deviceId AND Device.deviceName = '" + deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        count = row[0]
        #print(count)

    # Si le device n'existe pas, on l'ajoute
    if count == 0:
        query = "INSERT INTO Battery (deviceId,batteryLevel) VALUES ((SELECT id FROM Device WHERE deviceName = '" + deviceName + "')," + str(level) + ");"
        cursor.execute(query)
        connection.commit()
        print("\033[94m BATTERY INSERTED \033[0m")
    # Sinon on update le device
    else:
        query = "UPDATE Battery SET batteryLevel = " + str(level) + " WHERE deviceId = (SELECT id FROM Device WHERE deviceName = '" + deviceName + "');"
        cursor.execute(query)
        connection.commit()
        print("\033[94m BATTERY UPDATED \033[0m")
    pass

# creation du client
mqttc = mqtt.Client()
mqttc.connect(mqttServer, port=1883, keepalive=60)

mqttc.on_message = get_batteryLevel

# soucription au device
mqttc.subscribe("application/1/device/+/event/status",0)
print("Connected !")

mqttc.loop_forever()

connection.close()
print("Closed !")
