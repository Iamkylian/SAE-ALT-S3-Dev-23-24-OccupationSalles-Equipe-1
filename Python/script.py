import paho.mqtt.client as mqtt
import json
import base64
import pymysql
import time

# connection to db
connection = pymysql.connect(
    host="localhost", 
    port=9906, 
    user="root", 
    passwd="ROOT_PASSWORD", 
    database="capteursDB")
cursor = connection.cursor()

# config
mqttServer = "chirpstack.iut-blagnac.fr"

print("Starting...")

# callback appele lors de la reception d'un message
#def get_batterieLevel(mqttc, obj, msg):
    #print(msg.topic + "\n\n")
    #data = json.loads(msg.payload)
    #print(data)
    #pass

def get_data(mqttc, obj, msg):
    print(msg.topic + "\n\n")
    data = json.loads(msg.payload)
    print(data)
    
    insertDevice(data[1]['deviceName'],data[1]['room'],data[1]['floor'],data[1]['Building'])
    insertData(data[1]['deviceName'],data[0]['temperature'],data[0]['humidity'],data[0]['activity'],data[0]['co2'],data[0]['tvoc'],data[0]['illumination'])
    pass

def insertDevice(deviceName,room,floor,building):
    query = "SELECT COUNT(*) FROM Device WHERE deviceName = '" + deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        count = row[0]
        print(count)

    if count == 0:
        query = "INSERT INTO Device (id,deviceName,room,floor,building) VALUES (NULL,'" + str(deviceName) + "','" + str(room) + "'," + str(floor) + ",'" + str(building) + "');"
        print(query)
        cursor.execute(query)
        connection.commit()
    else:
        print("Already inserted")
        pass

def insertData(deviceName, temperature,humidity,activity,co2,tvoc,illumination):
    query = "SELECT id FROM Device WHERE deviceName = '" +  deviceName + "';"
    cursor.execute(query)
    rows = cursor.fetchall()

    for row in rows:
        deviceId = row[0]
        print(deviceId)

    currentDate = time.strftime('%Y-%m-%d %H:%M:%S')

    query = "INSERT INTO Donnes (idDevice,temperature,humidity,activity,co2,tvoc,illumination,time) VALUES (" + str(deviceId) + "," + str(temperature) + "," + str(humidity) + "," + str(activity) + "," + str(co2) + "," + str(tvoc) + "," + str(illumination) + ",'" + currentDate +"');"
    print(query)

    cursor.execute(query)
    connection.commit()

# creation du client
mqttc = mqtt.Client()
#mqttc2 = mqtt.Client()
mqttc.connect(mqttServer, port=1883, keepalive=60)
#mqttc2.connect(mqttServer, port=1883, keepalive=60)

mqttc.on_message = get_data
#mqttc2.on_message = get_batterieLevel

# soucription au device
#mqttc.subscribe("application/"+appID+"/device/+/event/up", 0)
mqttc.subscribe("AM107/by-deviceName/+/data",0)
#mqttc2.subscribe("application/1/device/+/event/up",0)
print("Connected !")

mqttc.loop_forever()
#mqttc2.loop_forever()

connection.close()
print("Closed !")
