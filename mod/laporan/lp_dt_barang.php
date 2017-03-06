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

function doBrowse(){

	$query = mysql_query("SELECT * FROM data_produk");
?>


<div class="col-md-11">
	<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
		<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Laporan Barang</legend>
		<div style="margin-bottom: 10px;">
		<a href="#" class="btn btn-primary btn-sm"><b class="fa fa-file"></b>&nbsp;Cetak PDF</a>
		</div>  

		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr style="background-color: #c0c0c0;"">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>Jenis</th>
						<th>Warna</th>
						<th width="7%">Stock</th>
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
							<td><?=$result['nama']?></td>
							<td><?=$result['jenis']?></td>
							<td><?=$result['warna']?></td>
							<td><?=$result['stock']?></td>
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

switch($_GET['act']){
    default:
        doBrowse();
     break;

break;
}
?>