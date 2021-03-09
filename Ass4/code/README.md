# Apache/Mysql/PHP in a Docker Container 
## Run
```
docker-compose up
```
Docker will build the stack for you(one-time download).  
## Access the content at ```localhost/form```
<br>

# Troubleshooting: 
## If you get error ```Connection Refused```:
After running ```docker-compose up```,  
**Wait** until the logs in the terminal show:
```
mysql_server | 2021-03-09T13:41:47.926434Z 0 [System] [MY-010931] [Server] /usr/sbin/mysqld: ready for connections. Version: '8.0.23'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server - GPL.
```
The timestamp will differ but note that the port number mentioned should be **3306**(If it's 0 wait some more).  
Now the MySQL container will be for connections.  