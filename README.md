# backbone-tutorial-slim-framework
[Backbone Tutorial](https://github.com/thomasdavis/backbonetutorials/tree/gh-pages/videos/beginner) is a simple user registration application built with [Backbone.js](http://documentcloud.github.com/backbone/). The application allows you to Create, Read, Update, and Delete users via a web admin tool.

Further expanding upon this project, I have reimplemented the server side utilizing [Slim Framework](https://github.com/slimphp/Slim). In addition, minor changes to the front end components of the code has converted this project to an admin console for product listings as opposed to a user database.

# Manual Setup
Prerequisites: LAMP Server (Linux, Apache, MySQL, PHP) - [10 Step Guide](https://gist.github.com/ASeeto/1ebec9b2802c0469f848)

1) Clone the project:  
  ```
  git clone https://github.com/ASeeto/backbone-tutorial-slim-framework
  ```

2) Create a MySQL database named 'project':  
  - Execute items.sql to create and populate the "items" table:  
  ```
  mysql directory -uroot < items.sql
  ```

3) Slim Framework Installation
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
		1. Navigate to the following directory on your server:  
			```
			/etc/httpd/conf/httpd.conf
			```
		2. Locate the code block for  
			```<Directory "/var/www/html">```  
	
			Replace the following:  
			```AllowOverRide None```  
			
			With the following:  
			```AllowOverride All```  
			
			This should allow api/.htaccess to perform URL rewriting!

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
