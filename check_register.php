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

$re_username=$_POST['username'];
$re_passwd1=$_POST['passwd'];
$re_passwd2=$_POST['passwd2'];
##

                                                                             

?>

<html>
<head></head>

<body>
<?php
	if($re_passwd1!=$re_passwd2)
	{
		echo '<script>alert("passwd1 don`t match passwd2")</script>';
	}
	else
	{
		$con=mysql_connect($host,$user,$passwd);
		if(!$con)
		{
			die("connect db failed!");
		}
		mysql_select_db($db_name,$con);
		$result=mysql_query('select * from users where username="'.$re_username.'"');
		$row = mysql_fetch_array($result);
  		if(!$row)
		{
			$string='insert into users  values("","'.$re_username.'","'.$re_passwd1.'",0,"","","","","")';
			$ins_status=mysql_query($string);
			if(!$ins_status)
			{
				echo $string;
				echo '<script>alert("insert err!")</script>';
			}
			else
			{
				echo '<script>alert("new user ok")</script>';

			}
			
		}
		else
		{
			echo '<script>alert("user exists")</script>';
		}
  			
		

		mysql_close();
	}
?>
</body>

</html>
