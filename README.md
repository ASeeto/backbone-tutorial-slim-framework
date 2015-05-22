# TuxSeeto
- Test RESTful API
- Mock Shopping Cart for practice

# Clone this project
```
git clone https://github.com/ASeeto/TuxSeeto
```

# Server
- http://www.digitalocean.com
- CentOS 7

# Resources
- Slim Framework v2
- Backbone.js
- Underscore.js

# Server Set-Up (LAMP installation)
1. Create a new droplet using CentOS 7 as the image  
	```
	https://cloud.digitalocean.com/droplets/new
	```
2. In terminal, connect to droplet  
	```
	ssh root@{DROPLET_IP_ADDRESS}
	```
3. Reset password for root upon successful login
4. Install Apache  
	```
	sudo yum update
	sudo yum install httpd
	```
5. Start Apache Server  
	```
	sudo systemctl start httpd.service
	```  
	Check server to verify Apache installation by visiting  
	http://{DROPLET_IP_ADDRESS}/
6. Enable Apache to start on boot  
	```
	sudo systemctl enable httpd.service
	```
7. Install MySQL (MariaDB)  
	```
	sudo yum install mariadb-server mariadb
	sudo systemctl start mariadb
	sudo mysql_secure_installation
	```
8. Enable MariaDB to start on boot  
	```
	sudo systemctl enable mariadb.service
	```
9. Install PHP  
	```
	sudo yum install php php-mysql
	```
10. Restart Apache  
	  ```
	  sudo systemctl restart httpd.service
	  ```  
    Create a snapshot at this point by powering off your droplet:  
    ```
    sudo shutdown -h now
    ```

# Resources
## Slim Framework
- Download Zip  
```
https://github.com/slimphp/Slim/releases
```
- Or, Install using Composer  
```
cd TuxSeeto
php composer.phar install
php composer.phar update
```

## Backbones.js  
```
https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.0/backbone-min.js
```

## Underscore.js  
```
https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js
```
