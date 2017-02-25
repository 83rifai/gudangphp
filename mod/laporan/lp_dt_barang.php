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
?>
    <div class="tabelku">
   
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
		</div>	
    
<?php
    }
/////// akhir function edit //////// 
switch($_GET['act']){
    default:
        doBrowse();
     break;

break;
}
?>