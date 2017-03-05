<?php
session_start();
include_once "../config/koneksi.php";

$act = $_GET['act'];
// print_r($_POST['data']);

if($act == "add"){
	if($_POST){
		$header = mysql_query("INSERT INTO trans_produk_retur_header (nomor_transaksi,tanggal,master_pelanggan_id) VALUES('".$_POST['nomor_transaksi']."','".$_POST['tgl']."','".$_POST['master_pelanggan_id']."')");
		if($header){
			$header_id = mysql_insert_id();
			for($i = 1; $i <= count($_POST['data']);$i++){
				$result[] = mysql_query("INSERT INTO trans_produk_retur_detail (trans_produk_retur_header_id,master_produk_id,jumlah,konversi_satuan_id) VALUES('".$header_id."','".$_POST['data'][$i]['master_produk_id']."','".$_POST['data'][$i]['jumlah']."','".$_POST['data'][$i]['konversi_satuan_id']."') ");
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
		$query =  mysql_query("DELETE FROM trans_produk_retur_header where id = ".$_GET['id']." ");
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