<?php

require_once './libs/BaiduPCS.class.php';
//请根据实际情况更新$access_token与$appName参数
 $readat=fopen("ATkey","r") ;
    
$access_token=fgets($readat);

//应用目录名
$appName = 'xingxiu';
//应用根目录
$root_dir = '/apps' . '/' . $appName . '/';


//上传文件的目标保存路径，此处表示保存到应用根目录下
$targetPath = $root_dir;
//要上传的本地文件路径
$file = '/home/backup.tar.gz';
//文件名称
$fileName = basename($file);
//新文件名，为空表示使用原有文件名
$newFileName = "xxbackup".date("Y-m-d-H-i-s",time()).".tar.gz";


//文件路径，此处列出的是应用根目录
$path = $root_dir;
//根据time排序
$by = 'time';
//升序或降序
$order = 'asc';
//记录区间
$limit = '0-99';



$pcs = new BaiduPCS($access_token);

//上传文件
if (!file_exists($file)) {
	exit('文件不存在，请检查路径是否正确');
} else {
	$fileSize = filesize($file);
	$handle = fopen($file, 'rb');
	$fileContent = fread($handle, $fileSize);

	$result = $pcs->upload($fileContent, $targetPath, $fileName, $newFileName);
	fclose($handle);

}

//罗列文件
$result = $pcs->listFiles($path, $by, $order, $limit);
$result=preg_replace('/\\\/is','',$result);
preg_match_all('^"path":"(.*?)","ctime":\d+,"mtime":(.*?),^is',$result,$result1);
$n=0;
$nowtime=time();
//删除时间长度,时间秒
$deltime = 1296000;

foreach($result1[2] as $part )
{
if ($nowtime-$part>$deltime)
{
$result = $pcs->deleteSingle($result1[1][$n]);

}

$n++;

}


?>