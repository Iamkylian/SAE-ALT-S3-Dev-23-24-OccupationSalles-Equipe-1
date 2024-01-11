FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

# FROM python:3.6.1-alpine
# WORKDIR /usr/app/src
# COPY ../../Python/script.py ./
# CMD [ "python","./script.py"]
