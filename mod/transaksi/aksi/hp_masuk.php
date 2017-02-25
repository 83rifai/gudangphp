<?php
include"../../../config/koneksi.php";
/*
$kd_br=mysql_query("SELECT * from td_brg_masuk where id='$_GET[id]'");
$kd_b=mysql_fetch_array($kd_br);
$kd_brg1=$kd_b[];
*/
$brg1=mysql_query("SELECT * from td_brg_masuk where id='$_GET[id]'");
while($r=mysql_fetch_array($brg1)){
$kd_brg=$r['kd_barang']; 
	for($i=1;$i<=count($kd_brg);$i++){
	// menghitung jumlah filter kd_barang n id_transaksi untuk mendapatkan jumlah yang akan di hapus di stok barang
	$brg=mysql_query("SELECT sum(jml_konversi) as jum_konv,kd_barang from td_brg_masuk where kd_barang='$kd_brg' and id='$_GET[id]'");
	$jml_stk_awal=mysql_fetch_array($brg); 
	$jm_brg_awal = $jml_stk_awal['jum_konv'];
	$kd_barang = $jml_stk_awal['kd_barang'];
	//cek stok barang berdasarkan kd_barang
	$brg2=mysql_query("SELECT jml_stok from barang where id='$kd_barang'");
	$jml_stk_awal1=mysql_fetch_array($brg2); 
	$jm_stok = $jml_stk_awal1['jml_stok'];
	// pengurangan jumlah stok dengan jumlah yang akan di hapus
	$jum_stok_akhir = $jm_stok-$jm_brg_awal;
	
//	echo"SELECT sum(jml_konversi) as jum_konv,kd_barang from td_brg_masuk where kd_barang='$kd_brg' and id='$_GET[id]' <br>"; 	
//	echo"update barang set jml_stok = '$jum_stok_akhir' where kd_barang='$kd_brg' <br>";


	//update stok barang berdasarkasn kd_barang
	$delete=mysql_query("update barang set jml_stok = '$jum_stok_akhir' where id='$kd_brg'");
	}
}
//	echo"Delete from tr_brg_masuk where id='$_GET[id]' <br>";
//	echo"Delete from td_brg_masuk where id='$_GET[id]' <br>";
	//hapus tr_brg_masuk
	$delete=mysql_query("Delete from tr_brg_masuk where id='$_GET[id]'");
	//hapus td_brg_masuk
	$delete=mysql_query("Delete from td_brg_masuk where id='$_GET[id]'");		


     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil terhapus..');
                      window.location = \"http://localhost/gudang/media.php?mod=brg_masuk\";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal terhapus..');
                      window.location = \"http://localhost/gudang/media.php?mod=brg_masuk\";
                  </script>";
            }

?>