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
$mpdf	= new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			

$html = "<table class='table table-bordered'>";
	$html .= "<tr><td>DATA</td></tr>";
$html .= "</table>";

$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter("<hr/>");
$mpdf->Output("LAPORAN_DATA_PRODUK.pdf","I");
exit;
?>