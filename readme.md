## A quick php8 Nginx & MySQL instance for local dev using Docker  

This is a php8 Nginx & MySQL instance for local dev using Docker   

* Create the docker network by running `docker network create app_main_network` 

* docker-compose -f _docker/docker-compose.yml up -d --force-recreate 

    Starts the container 
    - php-app
    - nginx-web 
    - mysql-db

* Add the following entry to host file 
    127.0.0.1 php.local mysql.local

* Browse http://php.local

- mysql settings
    - host: mysql.local
    - db name: mydb
    - db username: db_admin
    - db password: devmysql
    - db port: 31003

See Dockerfile and docker-compose.yml for configuration details.

Create a database connection as follows:-

`$db = new \PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'] . ";", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);`

