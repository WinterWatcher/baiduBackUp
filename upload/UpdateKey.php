<?php 
    $saveref=fopen("Refkey","r") ;
    
      $getref=fgets( $saveref);
    $url="https://openapi.baidu.com/oauth/2.0/token?grant_type=refresh_token&refresh_token=".$getref."&client_id=C9oAt0Yamo46DLXSSfDmcWRz&client_secret=RG7eZVUC9MC7QlD5ldISGy4NmO4Wgv57&scope=netdisk";
    fclose($saveref);
    $curl = curl_init(); // 启动一个CURL会话   
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址               
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查   
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在   
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器   
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转   
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer   
    curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的Post请求     
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环   
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容   
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回   
    $tmpInfo = curl_exec($curl); // 执行操作   
    if (curl_errno($curl)) {   
       echo 'Errno'.curl_error($curl);   
    }   
    curl_close($curl); // 关闭CURL会话   

if(strstr($tmpInfo,"refresh_token")&&strstr($tmpInfo,"access_token"))
{
   preg_match('/refresh_token":"(.+)","access_token/s',$tmpInfo,$refkey);
   preg_match('/access_token":"(.+)","session_secret/s',$tmpInfo,$atkey);


   $saveref=fopen("Refkey","w") ;
   fwrite($saveref,$refkey[1]);
   fclose($saveref);

   $saveat=fopen("ATkey","w") ;
   fwrite($saveat,$atkey[1]);
   fclose($saveat); 

}


?>