docker-compose cli

```sh
docker-compose down --rmi all -v
docker-compose up -d
```

docker cli
```sh
docker logs seller_service_mysql_container

docker network inspect seller_service_network

docker exec -it seller_service_php_container /bin/sh
docker exec -it seller_service_nginx_container /bin/sh

docker exec -it seller_service_mysql_container /bin/sh
docker exec -it seller_service_mysql_container mysql -u user -p
```
