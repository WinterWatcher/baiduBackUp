baiduBackUp
===========

linux使用百度网盘自动备份

测试版,如有漏洞请到http://bbee.be/留言或者发邮件到be@bbee.be
我会及时跟进的

需要

1.php支持

2.lynx

3.百度开发者

4.百度网盘

5.cron

6.可能需要root权限(未测试)



使用方法

1.上传upload文件夹到web

2.在百度开发者中心获取REFkey,将Refkey添加到REFkey中
运行UpdateKey.php获取新Refkey和ATkey

3.配置BackUp.php,根据个人情况修改$appName 和 $deltime
默认保存在我的应用程序/album中

4.将BackUp.sh上传到/root/中,并修改其中你BackUp.php文件对应的位置 
http://www.youwebsite.com/xxx/xxx/BackUp.php

5.添加crontab,添加文件在crontab.txt中,修改其中网址,添加到cron中便可

默认每两天备份一次,每月1号 15号更新key(key30天过期)


图文教程可见我的博客 http://bbee.be/
