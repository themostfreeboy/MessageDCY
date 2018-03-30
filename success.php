<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <title>留言系统</title>
</head>
<body>
    <?php
        $title = $_POST["title"];
        $content = $_POST["content"];
		$clienttime = $_POST["clienttime"];
		$clientip = $_POST["clientip"];
		$clientosinfo = $_POST["clientosinfo"];
		if($clienttime!="")
		{
			date_default_timezone_set('prc');
			$servertime = date('Y-m-d H:i:s',time());
			$str = "客户端留言时间:".$clienttime."\r\n服务器留言时间:".$servertime."\r\n客户端ip:".$clientip."\r\n客户端系统信息:".$clientosinfo."\r\n标题:".$title."\r\n内容:".$content."\r\n\r\n";
			$str = iconv("utf-8","gb2312//IGNORE",$str);
			$fp = fopen("./data.txt", "a");
			fwrite($fp,$str);
			fclose($fp);
			echo "<h1>标题为\"".$title."\"的留言已提交！</h1>";
		}
    ?>
</body>
</html>