<?php
session_start();
include_once "../config/koneksi.php";

$act = $_GET['act'];

if($act == "add"){
	if($_POST){
		$query = mysql_query("INSERT INTO konversi_satuan (satuan_terbesar,satuan_terkecil,jumlah) 
		VALUES ('".$_POST['satuan_terbesar']."','".$_POST['satuan_terkecil']."','".$_POST['jumlah']."')
		");

		if($query){
			echo "Berhasil Disimpan";
		}else{
			echo "Gagal Disimpan";
		}
	}
}else if($act == "del"){
	if($_GET['id']){
		$query =  mysql_query("DELETE FROM konversi_satuan where id = ".$_GET['id']." ");
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
		$query = mysql_query("UPDATE master_produk 
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