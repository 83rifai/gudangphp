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

function doBrowse(){
$query = mysql_query("SELECT * FROM data_produk_masuk");
?>


<div class="col-md-11">
	<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
		<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Laporan Barang Keluar</legend>
		<div style="margin-bottom: 10px;">
		<a href="mod/laporan/cetak/lp_dt_barang.php" class="btn btn-primary btn-sm"><b class="fa fa-file"></b>&nbsp;Cetak PDF</a>
		</div>  

		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr style="background-color: #c0c0c0;"">
						<th width="5%">No</th>
						<th>Tanggal</th>
						<th>Nomor Transaksi</th>
						<th>Kode Nama Produk</th>
						<th  width="7%">Jumlah</th>
						<th>Satuan</th>
						<th>Pelanggan</th>
						
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
							<td><?=$result['kode']?> - <?=$result['nama']?></td>
							<td><?=$result['jumlah']?></td>
							<td><?=$result['satuan']?></td>
							<td><?=$result['pelanggan']?></td>
							
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
    } // end function
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