<?php
session_start();
include_once "../config/koneksi.php";

$act = $_GET['act'];

if($act == "add"){
	if($_POST){
		$query = mysql_query("INSERT INTO master_suplier (nama) 
		VALUES ('".$_POST['nama']."')
		");

		if($query){
			echo "Berhasil Disimpan";
		}else{
			echo "Gagal Disimpan";
		}
	}
}else if($act == "del"){
	if($_GET['id']){
		$query =  mysql_query("DELETE FROM master_suplier where id = ".$_GET['id']." ");
		if($query){
			echo "Berhasil Dihapus";
		}else{
			echo "Gagal Dihapus";
		}
	}else{
		echo "Gagal Dihapus Data Tidak ditemukan ";
	}
}else if($act == "edit"){
	if($_POST){
		$query = mysql_query("UPDATE master_suplier (nama,alamat,no_telp,email) 
			SET nama = ('".$_POST['nama']."', jenis_id = '".$_POST['jenis_id']."', konversi_satuan_id = '".$_POST['konversi_satuan_id']."',warna = '".$_POST['warna']."')
			WHERE id = ".$_POST['id']."
			");

			if($query){
				echo "Berhasil Disimpan";
			}else{
				echo "Gagal Disimpan";
		}
	}
}




?>