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
$query = mysql_query("SELECT * FROM data_produk");
$mpdf	= new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			

$html = "<table cellspacing = '0' style='border: 1px solid #c0c0c0; width:100%;' >";
	$no = 1;
	$html .="<tr style='background: #f0f0f0;'>";
	$html .="<th width='5%' aling='center'>No</th>";
	$html .="<th aling='center'>Kode Produk</th>";
	$html .="<th aling='center'>Nama Produk</th>";
	$html .="<th aling='center'>Jenis</th>";
	$html .="<th aling='center'>Satuan Produk</th>";
	$html .="<th aling='center'>Stock</th>";
	$html .="</tr>";
	while ($result = mysql_fetch_assoc($query)) {
		$html .="<tr>";
		$html .="<td>".$no++."</td>";
		$html .="<td>".$result['kode']."</td>";
		$html .="<td>".$result['nama']."</td>";
		$html .="<td>".$result['jenis']."</td>";
		$html .="<td>".$result['satuan']."</td>";
		$html .="<td>".$result['stock']."</td>";
		$html .="</tr>";
	}
$html .= "</table>";

$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter("<hr/>");
$mpdf->Output("LAPORAN_DATA_PRODUK.pdf","I");
exit;
?>