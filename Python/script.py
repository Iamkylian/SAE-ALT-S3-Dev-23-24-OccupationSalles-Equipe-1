import paho.mqtt.client as mqtt
import json
import base64
import pymysql
import time

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
    
    insertDevice(data[1]['deviceName'],data[1]['room'],data[1]['floor'],data[1]['Building'])
    insertData(data[1]['deviceName'],data[0]['temperature'],data[0]['humidity'],data[0]['activity'],data[0]['co2'],data[0]['tvoc'],data[0]['illumination'])
    pass

def get_batteryLevel(mqttc, obj, msg):
    print("----- BATTERY LEVEL -----")
    print(msg.topic + "\n\n")
    data = json.loads(msg.payload)
    #print(data)
    insertBatteryLevel(data['deviceName'],data['batteryLevel'])
    
    pass

def insertBatteryLevel(deviceName,level):
    query = "SELECT COUNT(*) FROM Battery,Device WHERE Device.id = Battery.deviceId AND Device.deviceName = '" + deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        count = row[0]
        #print(count)

    if count == 0:
        query = "INSERT INTO Battery (deviceId,batteryLevel) VALUES ((SELECT id FROM Device WHERE deviceName = '" + deviceName + "')," + str(level) + ");"
        cursor.execute(query)
        connection.commit()
        print("\033[94m BATTERY INSERTED \033[0m")
    else:
        query = "UPDATE Battery SET batteryLevel = " + str(level) + " WHERE deviceId = (SELECT id FROM Device WHERE deviceName = '" + deviceName + "');"
        cursor.execute(query)
        connection.commit()
        print("\033[94m BATTERY UPDATED \033[0m")
    pass

def insertDevice(deviceName,room,floor,building):
    query = "SELECT COUNT(*) FROM Device WHERE deviceName = '" + deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        count = row[0]
        #print(count)

    if count == 0:
        query = "INSERT INTO Device (id,deviceName,room,floor,building) VALUES (NULL,'" + str(deviceName) + "','" + str(room) + "'," + str(floor) + ",'" + str(building) + "');"
        #print(query)
        cursor.execute(query)
        connection.commit()
    else:
        print("\033[92m DEVICE ALREADY INSERTED \033[0m")
        pass

def insertData(deviceName, temperature,humidity,activity,co2,tvoc,illumination):
    query = "SELECT id FROM Device WHERE deviceName = '" +  deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        deviceId = row[0]
        #print(deviceId)

    currentDate = time.strftime('%Y-%m-%d %H:%M:%S')

    query = "INSERT INTO Donnes (idDevice,temperature,humidity,activity,co2,tvoc,illumination,time) VALUES (" + str(deviceId) + "," + str(temperature) + "," + str(humidity) + "," + str(activity) + "," + str(co2) + "," + str(tvoc) + "," + str(illumination) + ",'" + currentDate +"');"
    #print(query)
    print("\033[92m DATA INSERTED \033[0m")
    cursor.execute(query)
    connection.commit()

# creation du client
mqttc = mqtt.Client()
mqttc2 = mqtt.Client()
mqttc.connect(mqttServer, port=1883, keepalive=60)
mqttc2.connect(mqttServer, port=1883, keepalive=60)

mqttc.on_message = get_deviceData
mqttc2.on_message = get_batteryLevel

# soucription au device
mqttc.subscribe("AM107/by-deviceName/+/data",0)
mqttc2.subscribe("application/1/device/+/event/status",0)
print("Connected !")

mqttc.loop_forever()
mqttc2.loop_forever()

connection.close()
print("Closed !")
