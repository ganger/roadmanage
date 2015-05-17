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
if(!$con)
{
        die("connect database failed!");
}
else
{
	mysql_select_db($db_name,$con);
	$login_user=$_POST['username'];
	$login_passwd=$_POST['passwd'];
	$string='select * from users where username="'.$login_user.'" and passwd="'.$login_passwd.'"';
	$result=mysql_query($string);
	if(!$result)
	{
		echo '<script>alert("invalid user")</script>';
	}
	else
	{
		session_start();
		$_SESSION['user']=$login_user;
		header("Location:main.php");
		exit;
	}
}

?>
