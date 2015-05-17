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
}else
{
	mysql_select_db($db_name);//the create database step must be done in cloud
	mysql_query("create table if not exists users(
				carID varchar(20),
				username varchar(50),
				passwd varchar(50),
				status int(1),
				realname varchar(30),
				vehicleNo varchar(20),
				licenceNo varchar(20),
				phone varchar(20),
				email varchar(40)) ENGINE=InnoDB DEFAULT CHARSET=utf8");
	
	mysql_query("create table if not exists breakRules(
				breakID int(20) primary key,
				vehicleNo varchar(20),
				breakRules_time datetime,
				breakRule_type varchar(100),
				breakRule_place varchar(200)) ENGINE=InnoDB DEFAULT CHARSET=utf8");
	mysql_close($con);
	
}
?>
