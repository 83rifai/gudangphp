<?php
include"../../../config/koneksi.php";
include"../../../mpdf/mpdf.php";
$mpdf	=new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			
$kode= $_GET[kd_tr]; 
$tgl2= $_GET[tgl2];


$jdl = mysql_query("SELECT a.id AS no_tr,a.*,b.*
					FROM tr_brg_keluar a
					INNER JOIN pelanggan b ON a.id_pelanggan=b.id
					WHERE a.id='$kode'");		
$row1 = mysql_fetch_array($jdl);
$no_sj	= $row1['no'];
$no_po	= $row1['no_po'];
$tgl1	= $row1['tgl_keluar'];
$nm_plg	= $row1['nm_pelanggan'];
$alamat	= $row1['almt_pelanggan'];	
$telp	= $row1['no_telp'];
$email	= $row1['email'];

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

if($bln == '1' || $bln1 == '01' || $bln2 == '1'){
	$bulan = "Januari";
}else if($bln == '2' || $bln1 == '02' || $bln2 == '2'){
	$bulan = "Februari";
}else if($bln == '3' || $bln1 == '03' || $bln2 == '3'){
	$bulan = "Maret";
}else if($bln == '4' || $bln1 == '04' || $bln2 == '4'){
	$bulan = "April";
}else if($bln == '5' || $bln1 == '05' || $bln2 == '5'){
	$bulan = "Mei";
}else if($bln == '6' || $bln1 == '06' || $bln2 == '6'){
	$bulan = "Juni";
}else if($bln == '7' || $bln1 == '07' || $bln2 == '7'){
	$bulan = "Juli";
}else if($bln == '8' || $bln1 == '08' || $bln2 == '8'){
	$bulan = "Agustus";
}else if($bln == '9' || $bln1 == '09' || $bln2 == '9'){
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

$html = "<table style=\"border-collapse:collapse; font-family:arial;\" width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"left\" width=\"100%\"  font-size=\"12px\">PT RAMA BERKAH ABADI</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"100%\" font-size=\"12px\">Griya Taman Sari T5</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"100%\" font-size=\"12px\">( Belakang Perum Fajar Indah Solo )</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"100%\" font-size=\"12px\">Baturan , Colomadu , Karanganyar</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"100%\" font-size=\"12px\">Telp : 085123456</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"100%\" font-size=\"12px\">Email : xxx@gmail.com</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"100%\" style=\"font-size:16px\"><b>Surat Jalan</b></td>
				</tr>
				
		</table>";

		
$html .= "<table style=\"border-collapse:collapse; font-size:12; font-family:arial;\" width=\"100%\" align=\"center\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">
				<tr>
					<td  align=\"left\" width=\"50%\" colspan=\"2\" rowspan=\"4\" valign=\"top\">Kepada Yth <br> $nm_plg <br> $alamat <br> $telp <br> $email</td>
					<td  align=\"left\" width=\"25%\" >Tanggal</td>
					<td  align=\"right\" width=\"25%\" >$tgl $bulan $thn</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"25%\" >No.Surat Jalan</td>
					<td  align=\"right\" width=\"25%\" >$no_sj</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"25%\" >No.PO</td>
					<td  align=\"right\" width=\"25%\" >$no_po</td>
				</tr>
				<tr>
					<td  align=\"left\" width=\"25%\" >&nbsp;&nbsp;&nbsp;</td>
					<td  align=\"right\" width=\"25%\" >&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td  align=\"center\" width=\"5%\" bgcolor=\"#e6e6e6\"><b>No</b></td>
					<td  align=\"center\" width=\"45%\" bgcolor=\"#e6e6e6\"><b>Nama Barang</td>
					<td  align=\"center\" width=\"25%\" bgcolor=\"#e6e6e6\"><b>Unit</b></td>
					<td  align=\"center\" width=\"25%\" bgcolor=\"#e6e6e6\"><b>Jumlah</b></td>
				</tr>
		";

$isi = mysql_query("SELECT a.*,CONCAT( b.nm_jenis , CONCAT(' ( ' , b.nm_warna ,' ' , b.nm_jenis , ' ) ') ) AS nama
					FROM td_brg_keluar a
					INNER JOIN barang b ON a.kd_barang=b.id
					WHERE a.id='$kode'");		
$no = 0;
while($row = mysql_fetch_array($isi))
	{
	$no++;	
	$nama	= $row['nama'];
	$satuan	= $row['satuan'];	
	$jumlah	= $row['jumlah'];	

if($no%2==0){
	$warna="#e6e6e6";
}else{
	$warna="#fff";
} 
		
$html .= "		<tr>
					<td  align=\"center\" width=\"5%\"  bgcolor=\"$warna\">$no</td>
					<td  align=\"left\" width=\"45%\"  bgcolor=\"$warna\">$nama</td>
					<td  align=\"center\" width=\"25%\"  bgcolor=\"$warna\">$satuan</td>
					<td  align=\"center\" width=\"25%\"  bgcolor=\"$warna\">$jumlah</td>
				</tr>
		";
	}		
$html .= "		<tr>
					<td  align=\"center\" colspan=\"2\" style=\"border:none;\" ><br> <b>Penerima</b>
						<br><br><br><br><br>
						(_________________________)
					</td>
					<td  align=\"center\" colspan=\"2\" style=\"border:none;\" ><br> <b>Pengirim</b>
						<br><br><br><br><br>
						(_________________________)
					</td>
				</tr>";
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