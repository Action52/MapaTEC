#!/bin/bash

#Credenciales

user = "leonvillapun"
password = "schwarz"
host = "127.0.0.1"
db_name = "mapa"

backup_path ="/Users/leonvillapun/Desktop/MapaTEC/MapaTEC/dbbackups"
date = $(date + "%d-%b-%Y")

#permisions
umask 177

#Dump

pg_dump --username=$user --password=$password --host=$host $db_name > $backup_path/$db_name-$date.sql
