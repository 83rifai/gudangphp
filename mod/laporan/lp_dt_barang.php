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
    <!-- <div class="tabelku">
   
		<form action="mod\laporan\aksi\lp_dt_barang.php" method="post" id="siswa1" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-md-3"></div>
                <div class="col-md-9">
					<label style="font-size:24px;"><h3><label> Cetak Laporan Data Barang </label></h3></label> 
				</div>
			</div>	
			<br><br><br>
			<div class="form-group">
				<div class="col-md-2">
					<label>Tanggal Cetak</label> 
				</div>
				<div class="col-md-3">		
					<div class='input-group date' id='tgl1' name='tgl1' >
                        <input type='text' class="form-control" id="tgl1" name="tgl1" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
				</div>
			</div>
			
            <br><br>
			 <div class="form-group" >
               <input type="submit" class="btn btn-info" value="Cetak">
			</div>
		 </form>	
		</div>	 -->

<div class="col-md-11">
	<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
		<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Laporan Barang</legend>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr style="background-color: #c0c0c0;"">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>Jenis</th>
						<th>Warna</th>
						<th width="7%">Stock</th>
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