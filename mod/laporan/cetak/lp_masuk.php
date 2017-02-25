<?php
include"../../../config/koneksi.php";
include"../../../mpdf/mpdf.php";
$mpdf	=new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			
$tgl1= $_GET[tgl1]; 
$tgl2= $_GET[tgl2];


//query data	  

if($tgl1 == "" ){
	if($tgl2 == "" ){
		$baca = mysql_query("SELECT a.id AS kode,a.*,b.*,c.* FROM tr_brg_masuk a 
							INNER JOIN td_brg_masuk b ON a.id=b.id
							INNER JOIN barang c ON b.kd_barang=c.id
							INNER JOIN suplier d ON a.id_suplier=d.id
							ORDER BY a.id,a.tgl_masuk");
	}else{
		$baca = mysql_query("SELECT a.id AS kode,a.*,b.*,c.* FROM tr_brg_masuk a 
							INNER JOIN td_brg_masuk b ON a.id=b.id
							INNER JOIN barang c ON b.kd_barang=c.id
							INNER JOIN suplier d ON a.id_suplier=d.id
							WHERE a.tgl_masuk <= '$tgl2'
							ORDER BY a.id,a.tgl_masuk");
	}	
}else{
	if($tgl2 <> ""){
		$baca = mysql_query("SELECT a.id AS kode,a.*,b.*,c.* FROM tr_brg_masuk a 
							INNER JOIN td_brg_masuk b ON a.id=b.id
							INNER JOIN barang c ON b.kd_barang=c.id
							INNER JOIN suplier d ON a.id_suplier=d.id
							WHERE a.tgl_masuk >= '$tgl1' AND a.tgl_masuk <= '$tgl2'
							ORDER BY a.id,a.tgl_masuk");
	}else{
		$baca = mysql_query("SELECT a.id AS kode,a.*,b.*,c.* FROM tr_brg_masuk a 
							INNER JOIN td_brg_masuk b ON a.id=b.id
							INNER JOIN barang c ON b.kd_barang=c.id
							INNER JOIN suplier d ON a.id_suplier=d.id
							WHERE a.tgl_masuk <= '$tgl1'
							ORDER BY a.id,a.tgl_masuk");
	}
}

$date	= explode('-',$tgl_masuk1);
$tgl3	= $date[2];
$bln3	= $date[1];
$thn3	= $date[0];

$date1	= explode('-',$tgl1);
$tg1	= $date1[2];
$bln1	= $date1[1];
$th1	= $date1[0];

$date2	= explode('-',$tgl2);
$tg2	= $date2[2];
$bln2	= $date2[1];
$th2	= $date2[0];


$thn_skr = date('d-m-Y');
$date	= explode('-',$thn_skr);
$tgl	= $date[0];
$bln	= $date[1];
$thn	= $date[2];

if($bln == '1' || $bln1 == '1' || $bln2 == '1' ){
	$bulan = "Januari";
}else if($bln == '2' || $bln1 == '2' || $bln2 == '2' ){
	$bulan = "Februari";
}else if($bln == '3' || $bln1 == '3' || $bln2 == '3'){
	$bulan = "Maret";
}else if($bln == '4' || $bln1 == '4' || $bln2 == '4' ){
	$bulan = "April";
}else if($bln == '5' || $bln1 == '5' || $bln2 == '5' ){
	$bulan = "Mei";
}else if($bln == '6' || $bln1 == '6' || $bln2 == '6' ){
	$bulan = "Juni";
}else if($bln == '7' || $bln1 == '7' || $bln2 == '7' ){
	$bulan = "Juli";
}else if($bln == '8' || $bln1 == '8' || $bln2 == '8' ){
	$bulan = "Agustus";
}else if($bln == '9' || $bln1 == '9' || $bln2 == '9' ){
	$bulan = "September";
}else if($bln == '10' || $bln1 == '10' || $bln2 == '10' ){
	$bulan = "Oktober";
}else if($bln == '11' || $bln1 == '11' || $bln2 == '11' ){
	$bulan = "November";
}else if($bln == '12' || $bln1 == '12' || $bln2 == '12' ){
	$bulan = "Desember";
}



if($tgl1 == "" ){
	if($tgl2 == "" ){
		$tgl="Keseluruhan";
	}else{
		$tgl="Tanggal $tg2 $bulan $th2";
	}	
}else{
	if($tgl2 <> ""){
		$tgl="Tanggal $tg1 $bulan $th1 s/d $tg2 $bulan $th2";
	}else{
		$tgl="Tanggal $tg1 $bulan $th1";
	}
}



$html = "<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"100%\" colspan=\"6\" style=\"font-size:24px\"><img src=\"http://localhost/gudang/img/logo.png\"/></td>
				</tr><br><br>
		</table> 
		<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"100%\" colspan=\"6\" style=\"font-size:24px\"><b>Laporan Barang Masuk <br>$tgl</b></td>
				</tr><br><br>
		</table> 
		<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"5%\"  bgcolor=\"#e6e6e6\"><b>No </b></td>
					<td  align=\"center\" width=\"20%\" bgcolor=\"#e6e6e6\"><b>Nomor <br>Transaksi</b></td>
					<td  align=\"center\" width=\"20%\" bgcolor=\"#e6e6e6\"><b>Tanggal <br> transaksi</b></td>
					<td  align=\"center\" width=\"20%\" bgcolor=\"#e6e6e6\"><b>Nama Suplier</b></td>
					<td  align=\"center\" width=\"25%\" bgcolor=\"#e6e6e6\"><b>Nama Barang</b></td>
					<td  align=\"center\" width=\"15%\" bgcolor=\"#e6e6e6\"><b>Jumlah<br>Satuan</b></td>
				</tr>
				
		";

$no = 0;
while($row = mysql_fetch_array($baca))
	{
	$no++;	
	$kode		= $row['kode'];
	$nm_suplier= $row['nm_suplier'];
	$tgl_masuk	= $row['tgl_masuk'];	
	$nm_jenis	= $row['nm_jenis'];
	$nm_warna	= $row['nm_warna'];
	$nm_merk	= $row['nm_merk'];
	$jumlah		= $row['jumlah'];		
	$satuam		= $row['satuan'];		

$date	= explode('-',$tgl_masuk);
$tgl3	= $date[2];
$bln3	= $date[1];
$thn3	= $date[0];

if( $bln3 == '01'){
	$bulan = "Januari";
}else if( $bln3 == '02'){
	$bulan = "Februari";
}else if( $bln3 == '03'){
	$bulan = "Maret";
}else if( $bln3 == '04'){
	$bulan = "April";
}else if( $bln3 == '05'){
	$bulan = "Mei";
}else if( $bln3 == '06'){
	$bulan = "Juni";
}else if( $bln3 == '07'){
	$bulan = "Juli";
}else if( $bln3 == '08'){
	$bulan = "Agustus";
}else if( $bln3 == '09'){
	$bulan = "September";
}else if( $bln3 == '10'){
	$bulan = "Oktober";
}else if( $bln3 == '11'){
	$bulan = "November";
}else if( $bln3 == '12'){
	$bulan = "Desember";
}	

if($no%2==0){
	$warna="#e6e6e6";
}else{
	$warna="#fff";
} 
	
$html .= "
				<tr>
					<td style=\" valign:center\" align=\"center\" width=\"5%\" bgcolor=\"$warna\">$no</td>
					<td style=\" valign:center\" align=\"left\" width=\"20%\" bgcolor=\"$warna\">$kode</td>
					<td style=\" valign:center\" align=\"left\" width=\"20%\" bgcolor=\"$warna\">$tgl3 $bulan $thn3</td>
					<td style=\" valign:center\" align=\"left\" width=\"20%\" bgcolor=\"$warna\">$nm_suplier</td>
					<td style=\" valign:center\" align=\"left\" width=\"25%\" bgcolor=\"$warna\">$nm_jenis <br>Merk : $nm_merk <br>Warna : $nm_warna </td>
					<td style=\" valign:center\" align=\"left\" width=\"15%\" bgcolor=\"$warna\">$jumlah <br> ( $satuan )</td>
				</tr>
			
		";
}
	
$html .= "</table>";

$footer = '<table cellpadding=0 cellspacing=0 style="border:none;">
			   <tr>
				   <td style="text-align:center">
					Halaman: {PAGENO} / {nb}
				   </td>
			   </tr>
		   </table>';


$mpdf->setHTMLFooter($footer);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>