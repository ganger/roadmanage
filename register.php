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

##

?>
<html>
	<head></head>
	<body>
		<form action="check_register.php" method="post">
			Username:<input name="username" type="text"><br>
			Passwd:  <input name="passwd" type="password"><br>
			Passwd again<input name="passwd2" type="password"><br>
			<input type="submit" value="submit">

		</form>
	</body>

</html>
