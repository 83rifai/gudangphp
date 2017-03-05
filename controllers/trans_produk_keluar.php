<?php
session_start();
include_once "../config/koneksi.php";

$act = $_GET['act'];
// print_r($_POST['data']);

if($act == "add"){
	if($_POST){
		$header = mysql_query("INSERT INTO trans_produk_keluar_header (nomor_transaksi,tanggal,master_pelanggan_id,purchase_order,delivery_order) VALUES('".$_POST['nomor_transaksi']."','".$_POST['tgl']."','".$_POST['master_pelanggan_id']."','".$_POST['purchase_order']."','".$_POST['delivery_order']."')");
		if($header){
			$header_id = mysql_insert_id();
			for($i = 1; $i <= count($_POST['data']);$i++){
				$result[] = mysql_query("INSERT INTO trans_produk_keluar_detail (trans_produk_keluar_id,master_produk_id,jumlah) VALUES('".$header_id."','".$_POST['data'][$i]['master_produk_id']."','".$_POST['data'][$i]['jumlah']."') ");
			}
			if($result){
				echo "Berhasil Disimpan";
			}else{
				echo "Gagl Disimpan";
			}
		}
		
	}
}else if($act == "del"){
	if($_GET['id']){
		$query =  mysql_query("DELETE FROM trans_produk_keluar_header where id = ".$_GET['id']." ");
		if($query){
			echo "Berhasil Dihapus";
		}else{
			echo "Gagal Dihapus";
		}
	}else{
		echo "Gagal Dihapus Data Tidak ditemukan ";
	}
}




?>