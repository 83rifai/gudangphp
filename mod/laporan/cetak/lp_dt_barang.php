<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">

<script type="text/javascript">	
$(document).ready(function(){	
	$(function () {
		$('#tgl1').datetimepicker({
			format: 'YYYY-MM-DD',
		});
		
	});
});


</script>

<?php
include"../../../config/koneksi.php";
include"../../../mpdf/mpdf.php";
$mpdf	=new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			
$tgl1= $_GET[tgl1];

//query data	  
$baca = mysql_query("SELECT a.id AS kode,a.*,b.*,c.jumlah AS besar,c.nama as st_besar,d.jumlah AS sedang,d.nama as st_sedang,e.jumlah AS kecil,
					e.nama as st_kecil FROM barang a 
					INNER JOIN satuan b ON a.id_satuan=b.id_satuan
					INNER JOIN besar c ON b.st_besar=c.id
					INNER JOIN sedang d ON b.st_sedang=d.id
					INNER JOIN kecil e ON b.st_kecil=e.id
					");

$date1	= explode('-',$tgl1);
$tg1	= $date1[2];
$bln1	= $date1[1];
$th1	= $date1[0];

$thn_skr = date('d-m-Y');
$date	= explode('-',$thn_skr);
$tgl	= $date[0];
$bln	= $date[1];
$thn	= $date[2];

if($bln == '1' || $bln1 == '1' ){
	$bulan = "Januari";
}else if($bln == '2' || $bln1 == '2' ){
	$bulan = "Februari";
}else if($bln == '3' || $bln1 == '3' ){
	$bulan = "Maret";
}else if($bln == '4' || $bln1 == '4' ){
	$bulan = "April";
}else if($bln == '5' || $bln1 == '5' ){
	$bulan = "Mei";
}else if($bln == '6' || $bln1 == '6' ){
	$bulan = "Juni";
}else if($bln == '7' || $bln1 == '7' ){
	$bulan = "Juli";
}else if($bln == '8' || $bln1 == '8' ){
	$bulan = "Agustus";
}else if($bln == '9' || $bln1 == '9' ){
	$bulan = "September";
}else if($bln == '10' || $bln1 == '10' ){
	$bulan = "Oktober";
}else if($bln == '11' || $bln1 == '11' ){
	$bulan = "November";
}else if($bln == '12' || $bln1 == '12' ){
	$bulan = "Desember";
}




$html = "<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"100%\" colspan=\"6\" style=\"font-size:24px\"><img src=\"http://localhost/gudang1/img/logo.png\"/></td>
				</tr><br><br>
		</table> 
		<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"100%\" colspan=\"6\" style=\"font-size:24px\"><b>Laporan Data Barang</b> </td>
				</tr><br><br>
		</table> 
		<table style=\"border-collapse:collapse; font-size:14;\" width=\"100%\" align=\"center\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"center\" width=\"5%\"  bgcolor=\"#e6e6e6\"><b>No </b></td>
					<td  align=\"center\" width=\"20%\" bgcolor=\"#e6e6e6\"><b>Kode Barang</b></td>
					<td  align=\"center\" width=\"20%\" bgcolor=\"#e6e6e6\"><b>Nama Barang</b></td>
					<td  align=\"center\" width=\"20%\" bgcolor=\"#e6e6e6\" height=\"60\"><b> &nbsp;Jumlah<br><br> </b></td>
				</tr>
				
		";

$no = 0;
while($row = mysql_fetch_array($baca))
	{
	$no++;	
	$kode		= $row['id'];
	$tgl_masuk	= $row['tgl_masuk'];	
	$nm_jenis	= $row['nm_jenis'];
	$nm_warna	= $row['nm_warna'];
	$nm_merk	= $row['nm_merk'];
	$jumlah		= $row['jml_stok'];		
	$besar		= $row['besar'];
	$sedang		= $row['sedang'];
	$kecil		= $row['kecil'];
	$st_kecil	= $row['st_kecil'];
	$st_sedang	= $row['st_sedang'];
	$st_besar	= $row['st_besar'];
	//$jm			= substr($satuan[$i] , 0 ,1);	
	//$jum 		= $jumlah/$sedang;
	//$hsl_awal  	= floor($jum);
	
	 //if($jumlah >= $sedang){
	 $jum 	   = $jumlah / $kecil; // pembagian menentukan jumlah	 
	 //Satuan Kecil
	 $awal_kc  = floor($jum);  // hasil pembulatan pembagian (jumlah/satuan kecil) 
	 $kli_kc   = $awal_kc*$kecil; // hasil pembulatan pembagian * satuan kecil
	 $jum_kcl  = $jumlah-$kli_kc; // jumlah konversi kecil
	 //Satuan Sedang
	 $awal_sd  = $awal_kc;  // pembagian menentukan perkalian jum konversi sedang
	 $kli_sd   = $awal_sd/$sedang; // pembagian menentukan total jum konversi sedang
	 $jum_kl_sd= floor($kli_sd); // konvert nilai sedang untuk perkalian
	 $jum_x_sd = $jum_kl_sd*$sedang; // menentukan jumlah nilai kali sedang
	 $jum_sd   = $awal_sd-$jum_x_sd; // jumlah konversi sedang
	 //Satuan Besar
	 $jum_bs   = $jum_kl_sd;
	 //$jml =$kli_sd.$awal_sd.$sedang;
	 
	 
	 
	 $jml 	   = $jum_bs.' ( '.$st_besar.' ) '.' | '.$jum_sd.' ( '.$st_sedang.' ) '.' | '.$jum_kcl.' ( '.$st_kecil.' ) ';
	/*
	}else if($jumlah <= $sedang){
	 $jml = $jumlah.'('.$st_kecil.')';
	
	}*/
	
if($no%2==0){
	$warna="#e6e6e6";
}else{
	$warna="#fff";
} 
	
$html .= "
				<tr>
					<td style=\" valign:center\" align=\"center\" width=\"5%\" bgcolor=\"$warna\">$no</td>
					<td style=\" valign:center\" align=\"left\" width=\"20%\" bgcolor=\"$warna\">$kode</td>
					<td style=\" valign:center\" align=\"left\" width=\"20%\" bgcolor=\"$warna\">$nm_jenis <br>Merk : $nm_merk <br>Warna : $nm_warna </td>
					<td style=\" valign:center\" align=\"left\" width=\"25%\" bgcolor=\"$warna\">$jml $sd1</td>
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