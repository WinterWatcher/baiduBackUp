#! /bin/bash
#一个简单的备份执行文件
mysqldump -uroot -pyourpasswd  book > /home/backup.sql
tar czvf /home/backup.tar.gz /home/wwwroot/* /home/backup.sql
lynx -source http://www.youwebsite.com/xxx/xxx/BackUp.php
rm -rf /home/backup.sql /home/backup.tar.gz
