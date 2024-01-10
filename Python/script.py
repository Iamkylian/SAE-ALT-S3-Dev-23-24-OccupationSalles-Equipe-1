import paho.mqtt.client as mqtt
import json
import base64
import pymysql

# connection to db
connection = pymysql.connect(
    host="localhost", 
    port=9906, 
    user="root", 
    passwd="ROOT_PASSWORD", 
    database="donnesDB")
cursor = connection.cursor()

query = "SELECT * FROM Donnee;"

cursor.execute(query)
rows = cursor.fetchall()

for row in rows:
    print(row)

connection.close()

# config
mqttServer = "chirpstack.iut-blagnac.fr"

blue = "Ymx1ZQ=="
orange = "b3Jhbmdl"

print("Starting...")

# callback appele lors de la reception d'un message
def get_data(mqttc, obj, msg):
    print(msg.topic + str(msg.payload))

# creation du client
mqttc = mqtt.Client()
mqttc.connect(mqttServer, port=1883, keepalive=60)

mqttc.on_message = get_data

# soucription au device
#mqttc.subscribe("application/"+appID+"/device/+/event/up", 0)
mqttc.subscribe("AM107/by-deviceName/+/data",0)
print("Connected !")

mqttc.loop_forever()

