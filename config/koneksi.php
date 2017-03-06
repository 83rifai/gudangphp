<?php
$base_url	= "http://".$_SERVER["HTTP_HOST"].str_replace(basename($_SERVER["SCRIPT_NAME"]),"",$_SERVER["SCRIPT_NAME"]);

mysql_connect("127.0.0.1","root","");
mysql_select_db("gudang");
error_reporting(0);
?>

