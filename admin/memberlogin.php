<?php
include "admincontrol.php";
$userid = $_GET['userid'];
$userinfo=mysql_query ("select * from members where userid='".$userid."'");
$userrecord=mysql_fetch_array($userinfo);
$login = true;
$userid = $userrecord['userid'];
$password = $userrecord['pword'];
$goto = "/members/index.php?userid=" . $userid . "&password=" . $password;
echo '<META HTTP-EQUIV="Refresh" Content="0;URL=' . $goto . '">';
mysql_close($dblink);
?>