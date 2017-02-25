<?php
include"config/koneksi.php";
$user=$_POST['username'];
$pass=md5($_POST['password']);

$query=mysql_query("Select * from user where username='$user' AND password='$pass'") or die("gagal".mysql_error());
$ketemu=mysql_num_rows($query);
$r=mysql_fetch_array($query);
if($ketemu>0){
 	session_start();
	$_SESSION['namauser']=$r["username"];
	$_SESSION['passuser']=$r["password"];
	$_SESSION['level']=$r["level"];
	header('location:media.php?mod=home');
}
else{    
	echo "<script>alert('User & Password Tidak Sesuai...!!'); 
		  document.location='index.php'</script>\n";
}
?>
