<?php
include"../../../config/koneksi.php";
include"../../../mpdf/mpdf.php";
$mpdf	=new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			
$tgl1= $_GET[tgl1]; 
$tgl2= $_GET[tgl2];

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

if($bln == '1' || $bln1 == '1' || $bln2 == '1'){
	$bulan = "Januari";
}else if($bln == '2' || $bln1 == '2' || $bln2 == '2'){
	$bulan = "Februari";
}else if($bln == '3' || $bln1 == '3' || $bln2 == '3'){
	$bulan = "Maret";
}else if($bln == '4' || $bln1 == '4' || $bln2 == '4'){
	$bulan = "April";
}else if($bln == '5' || $bln1 == '5' || $bln2 == '5'){
	$bulan = "Mei";
}else if($bln == '6' || $bln1 == '6' || $bln2 == '6'){
	$bulan = "Juni";
}else if($bln == '7' || $bln1 == '7' || $bln2 == '7'){
	$bulan = "Juli";
}else if($bln == '8' || $bln1 == '8' || $bln2 == '8'){
	$bulan = "Agustus";
}else if($bln == '9' || $bln1 == '9' || $bln2 == '9'){
	$bulan = "September";
}else if($bln == '10' || $bln1 == '10' || $bln2 == '10'){
	$bulan = "Oktober";
}else if($bln == '11' || $bln1 == '11' || $bln2 == '11'){
	$bulan = "November";
}else if($bln == '12' || $bln1 == '12' || $bln2 == '12'){
	$bulan = "Desember";
}


/*
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
*/

$html = "<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"100%\" >PT RAMA BERKAH ABADI</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"100%\" >Griya Taman Sari T5</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"100%\" >( Belakang Perum Fajar Indah Solo )</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"100%\" >Baturan , Colomadu , Karanganyar</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"100%\" >Telp : 085123456</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"100%\" >Email : xxx@gmail.com</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"100%\" ><b>Surat Jalan</b></td>
				</tr>
				
		</table> <br><br>
		<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"5%\" style=\"collor:blue;\"><b>No</b></td>
					<td  align=\"center\" width=\"20%\" style=\"bgcolor:FF0000\"><b>Kode <br>Transaksi</b></td>
					<td  align=\"center\" width=\"20%\" style=\"bgcolor:FF0000\"><b>Tanggal</b></td>
					<td  align=\"center\" width=\"25%\" style=\"bgcolor:FF0000\"><b>Nama Barang</b></td>
					<td  align=\"center\" width=\"15%\" style=\"bgcolor:FF0000\"><b>Jumlah</b></td>
					<td  align=\"center\" width=\"15%\" style=\"bgcolor:FF0000\"><b>Satuan</b></td>
				</tr>
				
		";
		
//query data	  

if($tgl1 == "" ){
	if($tgl2 == "" ){
		$baca = mysql_query("SELECT a.*,b.*,d.nm_barang FROM tr_brg_masuk a 
						INNER JOIN td_brg_masuk b ON a.id=b.id
						INNER JOIN satuan c ON b.kd_barang=c.id
						INNER JOIN barang d ON c.kd_barang=d.id
						order by a.id,a.tgl_masuk");
	}else{
		$baca = mysql_query("SELECT a.*,b.*,d.nm_barang FROM tr_brg_masuk a 
						INNER JOIN td_brg_masuk b ON a.id=b.id
						INNER JOIN satuan c ON b.kd_barang=c.id
						INNER JOIN barang d ON c.kd_barang=d.id
						WHERE a.tgl_masuk <= '$tgl2'
						order by a.id,a.tgl_masuk");
	}	
}else{
	if($tgl2 <> ""){
		$baca = mysql_query("SELECT a.*,b.*,d.nm_barang FROM tr_brg_masuk a 
						INNER JOIN td_brg_masuk b ON a.id=b.id
						INNER JOIN satuan c ON b.kd_barang=c.id
						INNER JOIN barang d ON c.kd_barang=d.id
						WHERE a.tgl_masuk >= '$tgl1' AND a.tgl_masuk <= '$tgl2'
						order by a.id,a.tgl_masuk");
	}else{
		$baca = mysql_query("SELECT a.*,b.*,d.nm_barang FROM tr_brg_masuk a 
						INNER JOIN td_brg_masuk b ON a.id=b.id
						INNER JOIN satuan c ON b.kd_barang=c.id
						INNER JOIN barang d ON c.kd_barang=d.id
						WHERE a.tgl_masuk <= '$tgl1' 
						order by a.id,a.tgl_masuk");
	}
}

$no = 0;
while($row = mysql_fetch_array($baca))
	{
	$no++;	
	$kode	= $row['id'];
	$tgl_masuk	= $row['tgl_masuk'];	
	$nm_barang	= $row['nm_barang'];
	$jumlah	= $row['jumlah'];		
	$satuam	= $row['satuan'];		
	
	
$html .= "
				<tr>
					<td style=\" valign:center\" align=\"center\" width=\"5%\">$no</td>
					<td style=\" valign:center\" align=\"left\" width=\"20%\" > $kode</td>
					<td style=\" valign:center\" align=\"left\" width=\"20%\" > $tgl_masuk</td>
					<td style=\" valign:center\" align=\"left\" width=\"25%\" >$nm_barang</td>
					<td style=\" valign:center\" align=\"left\" width=\"15%\" >$jumlah</td>
					<td style=\" valign:center\" align=\"left\" width=\"15%\" >$satuam</td>
				</tr>
			
		";
}
	
$html .= "</table>";

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>