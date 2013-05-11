#! /bin/bash

mysqldump -uroot -pyourpasswd  book > /home/backup.sql
tar czvf /home/backup.tar.gz /home/wwwroot/* /home/backup.sql
lynx -source http://www.youwebsite.com/xxx/xxx/BackUp.php
rm -rf /home/backup.sql /home/backup.tar.gz
