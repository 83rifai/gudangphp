<?php
session_start();
include_once "../config/koneksi.php";

$act = $_GET['act'];

if($act == "add"){
	if($_POST){
		$query = mysql_query("INSERT INTO master_produk (nama,jenis_id,konversi_satuan_id,warna) 
		VALUES ('".$_POST['nama']."','".$_POST['jenis_id']."','".$_POST['konversi_satuan_id']."','".$_POST['warna']."')
		");

		if($query){
			echo "Berhasi Disimpan";
		}else{
			echo "Gagal Disimpan";
		}
	}
}else if($act == "del"){
	
}else if($act == "edit"){
	
}else if($act == "getEdit"){
	
}




?>