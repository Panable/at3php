#!/bin/bash

if [ $# -ne 1 ]; then
    echo "Usage: $0 <password>"
    exit 1
fi

password="$1"
hashed_password=$(php hash_password.php "$password")

if [ -z "$hashed_password" ]; then
    echo "Password hashing failed."
    exit 1
fi

echo "$hashed_password" >> password.txt
echo "Hashed password saved to password.txt"
