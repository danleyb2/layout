#!/bin/bash
# danleyb2 <ndieksman@gmail.com>

#layout.sh new <app-name>
sourceroot=$( dirname $( readlink -m $0 ) )

if [ "$1" == "new" ]; then
	##
	appname=$2
	
	if [ ! -e $appname ]; then		
		if [ -z $3 ]; then
			destination=`pwd`
		else
			destination=`echo $3|sed 's/\/$//'`
		fi
		destination=$destination'/'$appname
		echo -e "[*] creating new app [\033[0;31m $appname \033[00m] in $destination"
		mkdir -p $destination
		#creating cache dir
		mkdir -p $destination'/cache'

        #creating Routes dir
        cp -R $sourceroot'/_router' $destination'/_router'


		#creating Classes dir
		cp -R $sourceroot'/classes' $destination'/classes'
		#mkdir -p $destination'/classes'
		#for i in '/classes/'{database,init,functions,session,request,router,view,controller}'.class.php'; do
		#	echo 'creating file '$i;
		#	cp $sourceroot$i $destination'/classes'
		#done

		#creating Controllers dir
		mkdir -p $destination'/controllers/core'
		for i in '/controllers/'{home,test,core/ErrorController}'.php'; do
			echo 'creating file '$i;
			cp $sourceroot$i $destination$i
		done


		#creating Config dir
		mkdir -p $destination'/config'
		cp $sourceroot'/config/config.php' $destination'/config'

		#creating Pages dir
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
		sed -e "s/Layout/$appname/" $sourceroot'/templates/header.phtml' > $destination'/templates/header.phtml'
		for i in '/templates/'{footer,layout}'.phtml'; do
			echo 'creating file '$i; 
			cp $sourceroot$i $destination'/templates'
		done



		mkdir -p $destination'/views'
		for i in '/views/'{main,about,contact,error}'.phtml'; do
			echo 'creating file '$i; 
			cp $sourceroot$i $destination'/views'
		done
		echo -e '[*] complete.. run \n\n\t\tphp -S localhost:3000 -t '$destination'/public \n and check it out.'
	fi
	
fi

#create dir structure
#copy scripts


#create new route