<?php
session_start();
include_once "../config/koneksi.php";

$act = $_GET['act'];
// print_r($_POST['data']);

if($act == "add"){
	if($_POST){
		$header = mysql_query("INSERT INTO trans_produk_masuk_header (nomor_transaksi,tanggal,id_suplier) VALUES('".$_POST['kd_tr_masuk']."','".$_POST['tgl']."','".$_POST['suplier_id']."')");
		if($header){
			$header_id = mysql_insert_id();
			for($i = 1; $i <= count($_POST['data']);$i++){
				$result[] = mysql_query("INSERT INTO trans_produk_masuk_detail (trans_produk_masuk_header_id,master_produk_id,jumlah) VALUES('".$header_id."','".$_POST['data'][$i]['master_produk_id']."','".$_POST['data'][$i]['jumlah']."') ");
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
		$query =  mysql_query("DELETE FROM trans_produk_masuk_header where id = ".$_GET['id']." ");
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