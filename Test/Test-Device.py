import unittest
from unittest.mock import patch, MagicMock

import sys

sys.path.append('../Python/')

from device import get_deviceData, insertDevice, insertData

class TestDeviceDataScript(unittest.TestCase):

    @patch('pymysql.connect')
    @patch('paho.mqtt.client.Client')
    def test_device_data_insertion(self, mock_mqtt_client, mock_mysql_connect):

        mock_msg = MagicMock()
        mock_msg.topic = "AM107/by-deviceName/+/data"
        mock_msg.payload = b'{"deviceName": "TestDevice", "room": "TestRoom", "floor": 1, "Building": "TestBuilding"},' \
                           b'{"temperature": 25, "humidity": 50, "activity": "low", "co2": 400, "tvoc": 50, "illumination": 100}'

        mqtt_client_instance = mock_mqtt_client.return_value
        db_connection_instance = mock_mysql_connect.return_value
        db_cursor_instance = db_connection_instance.cursor.return_value

        get_deviceData(mqtt_client_instance, None, mock_msg)

        db_cursor_instance.execute.assert_called() 

if __name__ == '__main__':
    unittest.main()
