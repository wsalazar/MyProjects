#!/bin/bash

echo $1

filename=$1

echo "What is the name of the file you wish to restore?"
read name
echo $name
if [ -e /home/deleted/$name ]; then
	sudo mv /home/deleted/$name $1
	if [ -e $1 ]; then
		echo "Hello"
		#echo  >> /home/.restore.info
		echo $name":"$filename >> /home/.restore.info
	fi
else 
	echo "Your file " $name " does not exist. Good bye."
fi
