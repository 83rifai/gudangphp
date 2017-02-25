<?php 
include"config/koneksi.php"; 

$nm  = $_SESSION[namauser];
$pass= $_SESSION[passuser];
$lvl = $_SESSION[level];
$nis = $_SESSION[nis];

$query=mysql_query("Select * from user where username='$nm' and password='$pass'");
$r=mysql_fetch_array($query);
?>
<style >

body > .header2 .logo .logo {
    display: block;
	float: left;
	font-family: "Kaushan Script",cursive;
	font-size: 20px;
	font-weight: 500;
	height: 70px;
	line-height: 50px;
	padding: 0px 5px 5px 0px;
	text-align: center;
	width: 23.3%;
}

body > .header .navbar {
    height: 50px;
    margin-bottom: 0;
    margin-left: 80px;
}

.logo2{
	display: block;
    float: left;
    margin-left: 50px;
	height:69px;
	align:center;
}


.logo3{
    display: block;
    float: right;
    height:50px;
    align:center;
    padding: 12px 5px 5px 0px;
}

.header2 {
    background: #39B3D7;
    border-bottom: 1px solid #39B3D7;
    height: 70px;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 99999999;
}

</style>

<header class="header2">
  <img src="img/logo.png" class="logo">
  <img src="img/aub.jpg" class="logo2">
 <nav class="navbar navbar-static-top" role="navigation">
    <div>
        <ul id="nav">
            <li id="notification_li">
            <a href="#" id="notificationLink">
				<img src="img/user.png" class="logo3"> 
			</a>
            <div id="notificationContainer">
            <div id="notificationTitle">Managemen User</div>
            <div id="notificationsBody" class="notifications">
            	<div class="notificationsgambar"><img src="img/<?php if($r[foto]!=null){  echo"$r[foto]"; }else{ echo"user-default.png"; } ?>" /></div>
                <p style="font-weight:normal;"><?php echo "$nm" ?></p>
                <p style="font-weight:normal;"><i>Level User :</i> <?php echo "$lvl"  ?></p>
				<p style="font-weight:normal;"><i>Nis 	:</i> <?php echo "$nis"  ?></p>
                <div id="notificationFooter">
                	
                    <button class="btn btn-default" onClick="window.location.href='logout.php'">Sign Out</button>
                </div>
            	</div>
            </div>
            </li>
        </ul>
    </div>
  </nav>
</header>
