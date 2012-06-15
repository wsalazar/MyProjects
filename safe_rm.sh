#!/bin/bash

sudo touch /home/.restore.info

filename=$1
if [ /home/will/deleted ]; then
	echo "Directory already exists"
else
	sudo mkdir /home/deleted
fi
if [ "$1" = "" ]; then
	echo "You need a file to delete first."
elif [ -d $1 ]; then
	echo "Can not remove, this is a directory."
elif [ -e /home/deleted/$1 ]; then
	sudo rm $1
	sudo mv /home/deleted/$1 /home/deleted/$1_1234
elif [ ! -f $1 ]; then
	echo "File does not exist"
else
	#if [! -w $fileName ] && [! -x $fileName ] && [! -r $fileName ]; then
	#	chmod 777 $fileName
		#echo $1
		sudo mv $1 /home/deleted
	#else
	#	$fileName > luTable.txt
	#	sudo mv $1 /home/deleted
	#fi
fi

echo "Do you want to restore this file? [(y) for yes or (n) for n]"
read restoreFile
if [ "$restoreFile" = "y" ]; then
	./safe_rm_restore.sh $filename
fi
