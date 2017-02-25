<?php
session_start();
include"config/koneksi.php";
if(empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){
   echo "<script>alert('Andah Telah Logout, Maka silahkan Login Kembali'); 
		  document.location='index.php'</script>\n";
}
else{  
                
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RAPORT</title>
<link rel="stylesheet" href="css/media.css" type="text/css">
<link rel="stylesheet" href="awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/datatables/dataTables.bootstrap.css" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js" type="text/javascript"></script>
<script src="js/plugin/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugin/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
</head>
<body class="skin-blue fixed">


<?php include_once('./header.php'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left">

<div class="row rows-up"><!---ROWS--->
<div class="col-md-3">
<div id="menuku">
	<div id="responsive-menu">Admin Menu
		<div class="menuicon">≡</div>
	</div>
	<div id="logo"></div>
	<!--Menu-->
	<div id="menu">
			<a title="Dashboard" href="?mod=home"><i class="fa fa-dashboard"></i><span> Dashboard</span></a>
         	<!-- Master Sub -->
            <a name="master-sub" title="master" class="submenu" href="#">
                <i class="fa fa-graduation-cap"></i>
                   <span> Master</span></a>
                    <div id="master-sub">
                        <a title="mata pelajaran" href="?mod=mata_diklat"><i class="fa fa-user-md"></i><span>Mata Pelajaran</span></a>
	                    <a title="guru" href="?mod=guru"><i class="fa fa-user-md"></i><span>Guru</span></a>
                        <a title="siswa" href="?mod=siswa"><i class="fa fa-user"></i><span>Siswa</span></a>
                        <a title="kelas" href="?mod=kelas"><i class="fa fa-user-md"></i><span>Kelas</span></a>
                        <a title="wali murid" href="?mod=wali_murid"><i class="fa fa-user-md"></i><span>Wali Murid</span></a>
                    </div>
              <!-- Setting Sub -->      
              <a name="setting-sub" title="master" class="submenu" href="#">
                <i class="fa fa-graduation-cap"></i>
                   <span> Pengaturan</span></a>
                    <div id="setting-sub">
                        <a title="user" href="?mod=user"><i class="fa fa-user-md"></i><span>User</span></a>
                    </div>
                
			<!-- Media Sub Menu -->
			<a name="informasi-sub" title="akademik" class="submenu" href="#">
                <i class="fa fa-graduation-cap"></i>
                    <span> Akademik / Input Nilai</span></a>
			<!-- Media Sub Menu -->
    				<div id="informasi-sub">
                        <a title="Kompetensi Keahlian" href="?mod=kompetensi_keahlian"><i class="fa fa-bookmark-o">
                        </i><span>Kompetensi Keahlian</span></a>
    					<a title="Standar Kompetensi" href="?mod=standar_kompetensi"><i class="fa fa-bookmark">
                        </i><span>Standar Kompetensi</span></a>
    					<a title="Nilai" href="?mod=nilai"><i class="fa fa-star"></i><span>Nilai</span></a>
    				</div>
			<a title="cetak KHS" href="cetak.php"><i class="fa fa-print"></i><span>Cetak KHS</span></a>	
	</div>
	<!--Menu-->
</div>
</div>

<div class="right-side">
<section class="content-header">
                    <h1>E-Raport</h1>
                </section>
<section class="content">
<div class="row">
<div class="col-md-12">

<?php
if($_GET['mod']=='home'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/dashboard.php');
}

elseif($_GET['mod']=='guru'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/guru.php');
}
elseif($_GET['mod']=='siswa'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/siswa.php');
}
elseif($_GET['mod']=='wali_murid'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/walimurid.php');
}

elseif($_GET['mod']=='mata_diklat'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/mapel.php');
}
elseif($_GET['mod']=='kompetensi_keahlian'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/kk.php');
}
elseif($_GET['mod']=='standar_kompetensi'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/sk.php');
}
elseif($_GET['mod']=='nilai'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/nilai.php');
}
elseif($_GET['mod']=='user'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/user.php');
}
elseif($_GET['mod']=='kelas'){
	include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/kelas.php');
}
?>
	
<script type="text/javascript">

            $(function() {
                $("#example1").dataTable();
				$("#baca").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
				
            });
         
</script>

</div></div>
</section>
</div>
</div><!---END ROW--->
<div class="bersih"></div>
</div>

</body>
</html><?php
}
?>