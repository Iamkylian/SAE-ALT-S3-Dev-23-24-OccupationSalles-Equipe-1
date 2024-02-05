import unittest
from unittest.mock import patch, MagicMock
import sys

sys.path.append('../Python/')

from battery import get_batteryLevel, insertBatteryLevel

class TestBatteryLevelScript(unittest.TestCase):

    @patch('pymysql.connect')
    @patch('paho.mqtt.client.Client')
    def test_battery_level_insertion(self, mock_mqtt_client, mock_mysql_connect):

        mock_msg = MagicMock()
        mock_msg.topic = "application/1/device/+/event/status"
        mock_msg.payload = b'{"deviceName": "TestDevice", "batteryLevel": 75}'

        mqtt_client_instance = mock_mqtt_client.return_value
        db_connection_instance = mock_mysql_connect.return_value
        db_cursor_instance = db_connection_instance.cursor.return_value

        get_batteryLevel(mqtt_client_instance, None, mock_msg)

        db_cursor_instance.execute.assert_called() 

if __name__ == '__main__':
    unittest.main()
