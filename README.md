# Mere PHP framework

Mere php framework structure that follows architectural pattern Model–View–Controller (MVC).
You will be able to start developing Web applications in the easy way!

## It includes "from the box" :

* Authentication based on [Password Hashing Functions](http://php.net/manual/en/ref.password.php),
* Datebase class (singleton) uses PDO driver,
* Simple routing

## How to start
- copy files from /web to your site root directory
- write settings in /engine/config.php
- if you're using Apache, make sure you activate the URL rewriting module, for Nginx servers use <pre>try_files $uri /index.php?$query_string;</pre>
- run



## Requirements
-   PHP 5 >= 5.5.0
-   MySQL >= 5.1

