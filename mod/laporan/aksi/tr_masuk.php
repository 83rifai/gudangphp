<?php
include"../../../config/koneksi.php";

$tgl			=$_POST['tgl'];
$kd_tr_masuk	=$_POST['kd_tr_masuk'];
$nm_barang		=$_POST['nm_barang'];
$kd_barang		=$_POST['kd_barang'];
$kd_satuan		=$_POST['kd_satuan'];
$satuan			=$_POST['satuan'];
$jumlah			=$_POST['jumlah'];

$no_max=mysql_query("SELECT ifnull(max(no),0)+1 AS reg  FROM tr_brg_masuk");
$n=mysql_fetch_array($no_max);   

$no = $n[reg];
//insert tr_brg_masuk

$insert1=mysql_query("insert into tr_brg_masuk(id,tgl_masuk,no)
					  values('$kd_tr_masuk','$tgl','$no')");

for($i=1;$i<count($nm_barang);$i++){
	$jm	= substr($satuan[$i] , 0 ,1);

	if($jm == "B"){
		  $jmlb=mysql_query("SELECT b.st_besar,c.jumlah AS jml_besar,b.st_sedang,d.jumlah AS jml_sedang,b.st_kecil,e.jumlah AS jml_kecil 
							FROM satuan b 
							INNER JOIN besar c ON b.st_besar=c.id 
							INNER JOIN sedang d ON b.st_sedang=d.id 
							INNER JOIN kecil e ON b.st_kecil=e.id WHERE b.id='$kd_barang[$i]'");
		  $n_jmlb	=mysql_fetch_array($jmlb); 
		  $nl_sedang= $n_jmlb['jml_sedang'];
		  $nl_kecil = $n_jmlb['jml_kecil'];
		  $nl_hsl1 	= $jumlah[$i]*$nl_sedang;
		  $nl_hsl2	= $nl_hsl1*$nl_kecil;
		  $nl_konv	= $nl_hsl2;
	}else if($jm == "S"){
		 $jmlx=mysql_query("SELECT b.st_sedang,d.jumlah,b.st_kecil,e.jumlah FROM satuan b 
							INNER JOIN sedang d ON b.st_sedang=d.id
							INNER JOIN kecil e ON b.st_kecil=e.id where b.id='$kd_barang[$i]'");
		$n_jml=mysql_fetch_array($jmlx); 
		
		$nl_kecil  = $n_jml['jumlah'];
		
		$nl_hsl = $jumlah[$i]*$nl_kecil;
		$nl_konv= $nl_hsl;
	}else if($jm == "K"){
		$nl_konv = $jumlah[$i];
	}
	
	$insert1=mysql_query("insert into td_brg_masuk(id,kd_barang,satuan,kd_satuan,jumlah,jml_konversi)
					  values('$kd_tr_masuk','$kd_barang[$i]','$kd_satuan[$i]','$satuan[$i]','$jumlah[$i]','$nl_konv')");
	
}


if($insert1){
		echo "<script type=\"text/javascript\">
			  alert('Data berhasil tersimpan..');
		 </script>";
		
		echo "<script type=\"text/javascript\">
					   window.location = \"http://localhost/gudang/media.php?mod=brg_masuk\";	
			   </script>	
				";
	}else{
		echo "<script type=\"text/javascript\">
			  alert('Data gagal tersimpan..');
			  window.location = \"http://localhost/gudang/media.php?mod=brg_masuk\ \";
		  </script>";
	}
	
?>