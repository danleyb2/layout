#!/bin/bash


#layout.sh new <app-name>
sourceroot=$( dirname $( readlink -m $0 ) )

if [ "$1" == "new" ]; then
	##
	appname=$2
	
	if [ ! -e $appname ]; then		
		if [ -z $3 ]; then
			destination=`pwd`
		else
			destination=$3
		fi
		destination=$destination'/'$appname
		echo -e "[*] creating new app [\033[0;31m $appname \033[00m] in $destination"
		mkdir -p $destination
		mkdir -p $destination'/cache'

		mkdir -p $destination'/classes'
		for i in '/classes/'{database,init,functions,session}'.class.php'; do 
			echo 'creating file '$i; 
			cp $sourceroot$i $destination'/classes'
		done

		

		mkdir -p $destination'/config'
		cp $sourceroot'/config/config.php' $destination'/config'

		mkdir -p $destination'/pages'
		for i in '/pages/'{404,500}'.php'; do 
			echo 'creating file '$i; 
			cp $sourceroot$i $destination'/pages'
		done


		#mkdir $appname'/public'
		#cp $sourceroot'/public/'{index}'.php' '.'$appname'/public'
		cp -R $sourceroot'/public' $destination

		mkdir -p $destination'/scripts'
		for i in '/scripts/'{main,about,contact}'.php'; do 
			echo 'creating file '$i; 
			cp $sourceroot$i $destination'/scripts'
		done


		mkdir -p $destination'/templates'
		for i in '/templates/'{footer,header,layout}'.phtml'; do 
			echo 'creating file '$i; 
			cp $sourceroot$i $destination'/templates'
		done


		mkdir -p $destination'/views'
		for i in '/views/'{main,about,contact}'.phtml'; do 
			echo 'creating file '$i; 
			cp $sourceroot$i $destination'/views'
		done
		echo '[*] complete.. run php -S localhost:3000 -t '$destination'/public'
	fi
	
fi

#create dir structure
#copy scripts


#create new route