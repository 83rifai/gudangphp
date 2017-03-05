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
?>
    <div class="tabelku">
   
		<form action="mod\laporan\aksi\lp_masuk.php" method="post" id="siswa1" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-md-3"></div>
                <div class="col-md-9">
					<label style="font-size:24px;"><h3><label> Cetak Laporan Barang Masuk </label></h3></label> 
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
    /////// function tambah ////////
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