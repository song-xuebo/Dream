<?php
//首先得知道用户所有信息
include('./public.php');
//传openid  得到当前用户的信息
$openid=$_GET['openid'];
$sql="select * from user where user_openid='$openid'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
 echo json_encode($row);
?>