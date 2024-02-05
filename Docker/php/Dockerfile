# Use the official Python image as the base image
FROM python:3.9

# Set the working directory inside the container
WORKDIR /app

# Copy the Python scripts and test files into the container
COPY ../../Python/battery.py /app/battery.py
COPY ../../Python/device.py /app/device.py
COPY ../../Test/Test-Battery.py /app/Test-Battery.py
COPY ../../Test/Test-Device.py /app/Test-Device.py

# Copy the start script into the container
COPY ../start.sh /app/start.sh

# Install required Python packages
RUN pip install paho-mqtt cryptography pymysql

# Set execute permissions for the start script
RUN chmod +x /app/start.sh
