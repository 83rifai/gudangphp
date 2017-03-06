<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">

<script type="text/javascript">	
$(document).ready(function(){	
	$(function () {
		$('#tgl1').datetimepicker({
			format: 'YYYY-MM-DD',
		});
		
		$('#tgl2').datetimepicker({
			format: 'YYYY-MM-DD',
		});
	});
});


</script>
    
<?php

function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
	   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
	   "April", "Mei", "Juni",
	   "Juli", "Agustus", "September",
	   "Oktober", "November", "Desember");
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
	}
	//$query=mysql_query("SELECT * FROM siswa order by nisn DESC")or die("gagal".mysql_error());
	

function doBrowse(){

	$query = mysql_query("SELECT * FROM data_produk_masuk");
?>


<div class="col-md-11">
	<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
		<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Laporan Barang Masuk</legend>
		<div style="margin-bottom: 10px;">
		<a href="mod/laporan/cetak/lp_dt_barang.php" class="btn btn-primary btn-sm"><b class="fa fa-file"></b>&nbsp;Cetak PDF</a>
		</div>  

		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr style="background-color: #c0c0c0;"">
						<th width="5%">No</th>
						<th>Tanggal</th>
						<th>No. Transaksi</th>
						<th>Suplier</th>
						<th>Kode Nama Produk</th>
						<th  width="7%">Jumlah</th>
						<th>Satuan</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					while ($result = mysql_fetch_assoc($query)) {
						?>
						<tr>
							<td width="5%"><?=$no++?></td>
							<td><?=$result['tanggal']?></td>
							<td><?=$result['nomor_transaksi']?></td>
							<td><?=$result['suplier']?></td>
							<td><?=$result['kode']?> - <?=$result['nama']?></td>
							<td><?=$result['jumlah']?></td>
							<td><?=$result['satuan']?></td>
							
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>	
		</div>
		
	</fieldset>
</div>
    
<?php
}
// end do browse
    function doCtk(){
		
include"mpdf/mpdf.php";
$mpdf=new mPDF('utf-8', 'A4-P'); // Membuat file mpdf baru			
$aksi = $_GET[act];  


$html = "<table width=\"100%\">
				<tr>
					<td align=\"right\" width=\"100%\"><b>R.IN.7</b></td>
				</tr>
				<tr>
					<td align=\"center\" width=\"100%\"><h3><b>RAHASIA</b></h3></td>
				</tr>
				<tr>
					<td align=\"center\" width=\"100%\"></td>
				</tr>  
				<tr>
					<td align=\"right\" width=\"100%\"><br></td>
				</tr>
				<tr>
					<td align=\"center\" width=\"100%\"><b>SURAT PERINTAH TUGAS <br> ---------------------------------------</b> <br>
					NOMOR  PRINTUG - </td>
				</tr>
				<tr>
					<td align=\"right\" width=\"100%\"><br></td>
				</tr>
				<tr>
					<td align=\"center\" width=\"100%\"><b></b></td>
				</tr>
				<tr>
					<td align=\"right\" width=\"100%\"><p><br></td>
				</tr>
		</table>";




$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

}
/////// akhir function tambah ////////
?>

<?php
/////// akhir function edit //////// 
switch($_GET['act']){
    default:
        doBrowse();
     break;
	case "cetak":
        doCtk();
     break;

break;
}
?>