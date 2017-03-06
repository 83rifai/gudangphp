<?php
session_start();
include"config/koneksi.php";
$lv  = $_SESSION[level];
//$id  = $_SESSION[id];
//$nis = $_SESSION[nis];
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
<title>INVENTORY</title>
<link rel="stylesheet" href="css/media.css" type="text/css">
<link rel="stylesheet" href="awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/datatables/dataTables.bootstrap.css" type="text/css">
 <link type="text/css" rel="stylesheet" href="js/plugin/calender/themes/ui-lightness/ui.all.css" />
<link rel="stylesheet" href="js/plugin/calender/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="js/plugin/calender/bootstrap-datetimepicker.min.css" type="text/css">
<script src="js/jQuery.js"></script>
<script src="js/plugin/calender/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/main.js" type="text/javascript"></script>
<script src="js/plugin/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugin/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script src="js/plugin/calender/bootstrap.min.js"></script>
<script src="js/plugin/calender/bootstrap-datetimepicker.min.js"></script>


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
			<a title="Dashboard" class="menu-utama" href="?mod=home"><i class="fa fa-dashboard"></i><span> Home </span></a> 
         	<?php if($lv == "admin") { ?>		
			<!-- Master Menu -->
                <a name="master-sub" title="master" class="menu-utama submenu" href="#"><i class="glyphicon glyphicon-asterisk"></i>
                       <span> Master</span>
                </a>
            <!-- Master Sub Menu-->       
                   
                    <div id="master-sub">
                        <a title="pelanggan" href="?mod=pelanggan"><i class="fa fa-user-md"></i>
                            <span>Data Pelanggan </span>
                        </a>
                        <a title="suplier" href="?mod=suplier"><i class="fa fa-user-md"></i>
                            <span>Data Suplier </span>
                        </a>
						<!--
						<a title="kategori" href="?mod=kategori"><i class="fa fa-user-md"></i>
                            <span>Data Kategori Barang </span>
                        </a>
						-->
                        <a title="barang" href="?mod=barang"><i class="fa fa-user-md"></i>
                            <span>Data Barang</span>
                        </a>
						<a title="jenis" href="?mod=jenis"><i class="fa fa-user-md"></i>
                            <span>Data Jenis</span>
                        </a>
						<!--a title="warna" href="?mod=warna"><i class="fa fa-user-md"></i>
                            <span>Data warna</span>
                        </a-->
						<!-- <a title="merk" href="?mod=merk"><i class="fa fa-user-md"></i>
                            <span>Data Merk</span>
                        </a> -->
	                    <a title="satuan" href="?mod=satuan"><i class="fa fa-user-md"></i>
                            <span>Data Satuan Barang</span>
                        </a>
                        <a title="satuan" href="?mod=konversi_satuan"><i class="fa fa-user-md"></i>
                            <span>Data Konversi Satuan</span>
                        </a>
						<!--a title="besar" href="?mod=besar"><i class="fa fa-user-md"></i>
                            <span>Data Satuan Besar</span>
                        </a>
						<a title="sedang" href="?mod=sedang"><i class="fa fa-user-md"></i>
                            <span>Data Satuan Sedang</span>
                        </a>
						<a title="kecil" href="?mod=kecil"><i class="fa fa-user-md"></i>
                            <span>Data Satuan Kecil</span>
                        </a-->
                    </div>
					
              <!-- Setting Menu -->     
 			  
                <a name="setting-sub" title="master" class="menu-utama submenu" href="#"><i class="glyphicon glyphicon-cog"></i>
                    <span> Pengaturan</span>
                </a>
              <!-- Setting Sub Menu -->      
                   
                    <div id="setting-sub">
                        <a title="user" href="?mod=user"><i class="glyphicon glyphicon-user"></i>
                            <span>User</span>
                        </a>
                    </div>
			 	
			<!-- transaksi Menu -->
                <a name="transaksi-sub" title="transaksi" class="menu-utama submenu" href="#"><i class="glyphicon glyphicon-shopping-cart"></i>
                    <span> Transaksi</span>
                </a>
			<!-- transaksi Sub Menu -->
    				<div id="transaksi-sub">
    					<a title="barang_masuk" href="?mod=brg_masuk"><i class="glyphicon glyphicon-log-in"></i>
                            <span>Barang Masuk </span>
                        </a>
					  	<a title="barang_keluar" href="?mod=brg_keluar"><i class="glyphicon glyphicon-log-out"></i>
                            <span>Barang Keluar</span>
                        </a>
                        <a title="barang_retur" href="?mod=brg_retur"><i class="glyphicon glyphicon-log-out"></i>
                            <span>Barang Retur</span>
                        </a>
					 
                    </div>		
				<!-- Laporan Menu -->
                <a name="laporan-sub" title="laporan" class="menu-utama submenu" href="#"><i class="glyphicon glyphicon-briefcase"></i>
                    <span> Laporan</span>
                </a>
				<!-- Laporan Sub -->				
					
					<div id="laporan-sub">
                        <a title="laporan Raport" href="?mod=lp_dtbarang"><i class="glyphicon glyphicon-duplicate"></i>
                            <span>Laporan Data Barang</span>
                        </a>
                        <a title="laporan Siswa" href="?mod=lp_brmasuk"><i class="glyphicon glyphicon-duplicate"></i>
                            <span>Laporan Barang Masuk</span>
                        </a>
						<a title="laporan Siswa" href="?mod=lp_brkeluar"><i class="glyphicon glyphicon-duplicate"></i>
                            <span>Laporan Barang Keluar</span>
                        </a>
						
                    </div>
					 <?php } else if($lv == "user") { ?>
					 <!-- Laporan Menu -->
                <a name="laporan-sub" title="laporan" class="menu-utama submenu" href="#"><i class="glyphicon glyphicon-briefcase"></i>
                    <span> Laporan</span>
                </a>
				<!-- Laporan Sub -->				
					
					<div id="laporan-sub">
                        <a title="laporan Raport" href="?mod=lp_dtbarang"><i class="glyphicon glyphicon-duplicate"></i>
                            <span>Laporan Data Barang</span>
                        </a>
                        <a title="laporan Siswa" href="?mod=lp_brmasuk"><i class="glyphicon glyphicon-duplicate"></i>
                            <span>Laporan Barang Masuk</span>
                        </a>
						<a title="laporan Siswa" href="?mod=lp_brkeluar"><i class="glyphicon glyphicon-duplicate"></i>
                            <span>Laporan Barang Keluar</span>
                        </a>
						
                    </div>
					 <?php } ?>	
	</div>
	<!--Menu-->
</div>
</div>

<div class="right-side">
<section class="content-header">
	<h1><!--Inventory--></h1>
</section>

	<div class="row">
		<div class="col-md-12">

		<?php
		if($_GET['mod']=='home'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/dashboard.php');
		}
		elseif($_GET['mod']=='pelanggan'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/pelanggan.php');
		}
		elseif($_GET['mod']=='suplier'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/suplier.php');
		}
		/*
		elseif($_GET['mod']=='kategori'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/kategori.php');
		}*/
		elseif($_GET['mod']=='barang'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/barang.php');
		}
		elseif($_GET['mod']=='jenis'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/jenis.php');
		}
		elseif($_GET['mod']=='warna'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/warna.php');
		}
		elseif($_GET['mod']=='merk'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/merk.php');
		}
		elseif($_GET['mod']=='satuan'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/satuan.php');
		}
		elseif($_GET['mod']=='besar'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/besar.php');
		}
		elseif($_GET['mod']=='sedang'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/sedang.php');
		}
		elseif($_GET['mod']=='kecil'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/kecil.php');
		}
		elseif($_GET['mod']=='user'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/user.php');
		}
		elseif($_GET['mod']=='brg_masuk'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/transaksi/brg_masuk.php');
		}
		elseif($_GET['mod']=='brg_keluar'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/transaksi/brg_keluar.php');
		}elseif($_GET['mod']=='brg_retur'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/transaksi/brg_retur.php');
		}
		elseif($_GET['mod']=='lp_dtbarang'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/laporan/lp_dt_barang.php');
		}
		elseif($_GET['mod']=='lp_brmasuk'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/laporan/lp_brmasuk.php');
		}
		elseif($_GET['mod']=='lp_brkeluar'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/laporan/lp_brkeluar.php');
		}
		elseif($_GET['mod']=='data_barang'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/transaksi/data_barang.php');
		}elseif($_GET['mod']=='konversi_satuan'){
			include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mod/master/konversi_satuan.php');
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

		</div>
	</div>

</div>
</div><!---END ROW--->
<div class="bersih"></div>
</div>

</body>
</html><?php
}
?>