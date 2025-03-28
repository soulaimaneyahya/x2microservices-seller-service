docker network
```sh
docker network create --subnet=192.168.0.0/24 --gateway=192.168.0.1 shared_network
```

docker-compose cli
```
docker-compose down --rmi all -v
docker-compose up -d
```

docker cli
```sh
cd /var/www/html/x2microservices-seller-service

docker logs seller_service_mysql_container

docker network inspect seller_service_network

docker exec -it seller_service_php_container /bin/sh
docker exec -it seller_service_nginx_container /bin/sh

docker exec -it seller_service_mysql_container /bin/sh
docker exec -it seller_service_mysql_container mysql -u user -p
```
