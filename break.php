<?php
##reading configure file
$conf=fopen("conf","r") or die("reading conf error");
fgets($conf);
$host=fgets($conf);
$host=str_replace("\n","",$host);
fgets($conf);
$user=fgets($conf);
$user=str_replace("\n","",$user);
fgets($conf);
$passwd=fgets($conf);
$passwd=str_replace("\n","",$passwd);
fgets($conf);
$db_name=fgets($conf);
$db_name=str_replace("\n","",$db_name);

fclose($conf);
##connect
$con=mysql_connect($host,$user,$passwd);
mysql_query("SET NAMES 'UTF8'");
session_start();
$login_user=$_SESSION['user'];
?>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        <body>
                <a href="main.php">个人信息</a><br>
                <a href="break.php">违章记录</a><br>
                <a href="">车辆轨迹</a><br>
                <a href="">信息修改</a><br>
                <a href="">安全退出</a><br>
                <?php
                        mysql_select_db($db_name);
                        $result=mysql_query('select * from bureakrules where username="'.$login_user.'"');
                        $raw=mysql_fetch_array($result);
                        echo "车牌号:";
                        echo $raw['vehicleNo'];
                        echo "<br>";
		?>
	</body>
</html>



  
