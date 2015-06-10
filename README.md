# TuxSeeto
- PHP, Slim, MySQL, Backbone.js :: RESTful API

# Clone this project
```
git clone https://github.com/ASeeto/TuxSeeto
```

# Resources
- Slim Framework v2
- Backbone.js
- Underscore.js

# Resources
## Slim Framework v2
A pre-packaged RESTful framework that has all the necessary functions built in to execute Backbone server queries

1. Install using Composer:  
	https://getcomposer.org/download/  

	Here are the commands to install Composer and Slim:  
	```
	curl -sS https://getcomposer.org/installer | php
	
	php composer install
	
	php composer update
	
	cd TuxSeeto
	
	php composer.phar install
	
	php composer.phar update
	```
2. URL Rewriting
	1. Create a .htaccess file  
		```
		vi .htaccess
		```
		Include the following in the file:  
		```
		RewriteEngine On
		
		RewriteCond %{REQUEST_FILENAME} !-f
		
		RewriteCond %{REQUEST_FILENAME} !-d
		
		RewriteRule ^ index.php [QSA,L]
		```
	2. Navigate to the following directory on your server:  
		```
		/etc/httpd/conf/httpd.conf
		```
	3. Locate the code block for  
		```<Directory "/var/www/html">```  

		Replace the following:  
		```AllowOverRide None```  
		
		With the following:  
		```AllowOverride All```  
		
		This should allow .htaccess to perform URL rewriting!

## Backbone.js
Download or reference resource from the following link:  
https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.0/backbone-min.js

## Underscore.js
Download or reference resource from the following link:  
https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js

# Troubleshooting
## 403 Forbidden Error:
- Correct the file permissions so Apache is able to access referenced files
- sudo chmod 0777 

## 404 Page Not Found:
- Try http://yoursite/api/index.php/api/item

## 500 Internal Server Error:
- Be sure Slim autoloader is registered
- The following line should exist following initialization of new Slim:  
	```
	\Slim\Slim::registerAutoloader();
	```
- Check error log in following directory:  
	```
	/var/log/httpd
	```
