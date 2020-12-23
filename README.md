立ち上げ  
docker-compose up -d --build
---
各コンテナに入る  
winpty docker-compose exec php bash  
winpty docker-compose exec mysql bash
---
supervisorを立ち上げる場合  
docker-compose exec php bash  
service supervisor start  


phpの情報を見る

phpinfo();


mysql -u root -p

mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| myapp              |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
5 rows in set (0.05 sec)

mysql> use myapp;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+-----------------+
| Tables_in_myapp |
+-----------------+
| posts           |
+-----------------+

 