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
<style type="text/css">
	table tr td {
		border: 1px solid #c0c0c0;
	}
</style>
<?php
include"../../../config/koneksi.php";
include"../../../mpdf/mpdf.php";
$query = mysql_query("SELECT * FROM data_produk_retur where trans_produk_retur_header_id = ".$_GET['id']."  ");
$mpdf	= new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			


$html = "<center><h3>SURAT RETUR</h3></center>"; 

$html .= "<table width='100%'>";
	$html .= "<tr>";
	$html .= "<td width='50%' style='font-size: 10pt;' >Purchase Order :</td>";
	$html .= "<td width='50%' style='font-size: 10pt;' >Delivery Order :</td>";
	$html .= "</tr><tr>";
	$html .= "<td width='50%'></td>";
	$html .= "<td width='50%'></td>";
	$html .= "</tr><tr>";
	$html .= "<td width='50%' style='font-size: 10pt;' >Dari :</td>";
	$html .= "<td width='50%' style='font-size: 10pt;' >Tujuan :</td>";
	$html .= "</tr><tr>";
	$html .= "<td width='50%' style='font-size: 10pt;' >PT. RAMA BERKAH ABADI<br/>Griya Taman Sari T5</td>";
	$html .= "<td width='50%'></td>";
	$html .= "</tr>";
$html .= "</table>";
$html .= "<br/>";

// $mpdf->SetHTMLHeader($header);

$html .= "<hr/>";

$html .= "<table cellspacing = '0' style='border: 1px solid #c0c0c0; width:100%;' >";
	$no = 1;
	$html .="<tr style='background: #f0f0f0;'>";
	$html .="<th width='5%' aling='center'>No</th>";
	$html .="<th aling='center'>Kode Produk</th>";
	$html .="<th aling='center'>Nama Produk</th>";
	$html .="<th aling='center'>Jumlah</th>";
	$html .="<th aling='center'>Satuan Produk</th>";
	// $html .="<th aling='center'>Suplier</th>";
	$html .="</tr>";
	while ($result = mysql_fetch_assoc($query)) {
		$html .="<tr>";
		$html .="<td>".$no++."</td>";
		$html .="<td>".$result['kode']."</td>";
		$html .="<td>".$result['nama']."</td>";
		$html .="<td>".$result['jumlah']."</td>";
		$html .="<td>".$result['satuan_terkecil']."</td>";
		// $html .="<td></td>";
		$html .="</tr>";
	}
$html .= "</table>";

$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter("<hr/>");
$mpdf->Output("SURAT_RETUR.pdf","I");
exit;
?>