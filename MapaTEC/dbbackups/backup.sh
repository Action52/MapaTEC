#!/bin/bash

#Credenciales

user="postgres"
password="schwarz"
host="127.0.0.1"
db_name="mapa"

backup_path="/Users/leonvillapun/Desktop/MapaTEC/MapaTEC/dbbackups"
date=$(date -j -f "%d-%b-%Y")

#permisions
umask 177

#Dump
pg_dump --username=$user --host=$host $db_name --port=5432> $backup_path/$db_name-$date.sql
