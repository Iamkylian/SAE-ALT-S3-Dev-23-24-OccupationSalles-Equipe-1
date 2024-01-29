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

def get_deviceData(mqttc, obj, msg):
    print("----- DEVICE DATA -----")
    print(msg.topic + "\n\n")
    data = json.loads(msg.payload)
    #print(data)
    
    #
    if 'floor' in data[1]:
        insertDevice(data[1]['deviceName'],data[1]['room'],data[1]['floor'],data[1]['Building'])
    else: 
        insertDevice(data[1]['deviceName'],data[1]['room'],-1,data[1]['Building'])
        print("--- NO FLOOR ---")

    insertData(data[1]['deviceName'],data[0]['temperature'],data[0]['humidity'],data[0]['activity'],data[0]['co2'],data[0]['tvoc'],data[0]['illumination'])
    pass

def insertDevice(deviceName,room,floor,building):
    # Fait une requete pour savoir si le device existe deja
    query = "SELECT COUNT(*) FROM Device WHERE deviceName = '" + deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        count = row[0]
        #print(count)

    # Si le device n'existe pas, on l'ajoute
    if count == 0:
        query = "INSERT INTO Device (id,deviceName,room,floor,building) VALUES (NULL,'" + str(deviceName) + "','" + str(room) + "'," + str(floor) + ",'" + str(building) + "');"
        #print(query)
        cursor.execute(query)
        connection.commit()
    else:
        print("\033[92m DEVICE ALREADY INSERTED \033[0m")
        pass

def insertData(deviceName, temperature,humidity,activity,co2,tvoc,illumination):
    # Fait une requête pour récupérer l'id du device
    query = "SELECT id FROM Device WHERE deviceName = '" +  deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        deviceId = row[0]
        #print(deviceId)

    currentDate = time.strftime('%Y-%m-%d %H:%M:%S')

    # Insertion des données
    query = "INSERT INTO Donnes (idDevice,temperature,humidity,activity,co2,tvoc,illumination,time) VALUES (" + str(deviceId) + "," + str(temperature) + "," + str(humidity) + "," + str(activity) + "," + str(co2) + "," + str(tvoc) + "," + str(illumination) + ",'" + currentDate +"');"
    #print(query)
    print("\033[92m DATA INSERTED \033[0m")
    cursor.execute(query)
    connection.commit()

# creation du client
mqttc = mqtt.Client()
# Csonnection au broker
mqttc.connect(mqttServer, port=1883, keepalive=60)

mqttc.on_message = get_deviceData

# soucription au device
mqttc.subscribe("AM107/by-deviceName/+/data",0)
print("Connected !")

mqttc.loop_forever()

connection.close()
print("Closed !")
