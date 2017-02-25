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
?>
    <div class="tabelku">
   
		<form action="mod\laporan\aksi\lp_keluar.php" method="post" id="siswa1" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-md-3"></div>
                <div class="col-md-9">
					<label style="font-size:24px;"><h3><label> Cetak Laporan Barang Keluar </label></h3></label> 
				</div>
			</div>	
			<br><br><br>
			<div class="form-group">
				<div class="col-md-2">
					<label>Tanggal Awal</label> 
				</div>
				<div class="col-md-3">		
					<div class='input-group date' id='tgl1' name='tgl1' >
                        <input type='text' class="form-control" id="tgl1" name="tgl1" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
				</div>
				<div class="col-md-1"><label>S/d</label></div>
				<div class="col-md-2">
					<label>Tanggal Akhir</label> 
				</div>
				<div class="col-md-3">		
					<div class='input-group date' id='tgl2' name='tgl2' >
                        <input type='text' class="form-control" id="tgl2" name="tgl2" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
				</div>
				<div class="col-md-1"></div>
			</div>
			
            <br><br>
			 <div class="form-group" >
               <input type="submit" class="btn btn-info" value="Cetak">
			</div>
		 </form>	
		</div>	
    
<?php
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