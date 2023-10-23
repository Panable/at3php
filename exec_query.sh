#!/bin/bash

# MySQL service name as specified in docker-compose file
service_name='at3php-mysql-1'

# Database credentials
username='user'
password='password'
database='cafe'

# SQL file
sql_file='init.sql'

# Execute SQL file
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${sql_file}
