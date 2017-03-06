<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">

<!--
<script type="text/javascript">	
$(document).ready(function(){
 $("#satuan1").submit(function(){
		
		var aa		    = document.getElementById("nisn").value;
		var nm_kelas	= document.getElementById("nm_kelas").value;
		var nama		= document.getElementById("nama").value;
		var tgl_lahir	= document.getElementById("tgl_lahir").value;
		
		
		if(aa == ''){
			alert("NIP Tidak Boleh Kosong");
			return false;
		}else if(nm_kelas == ''){
            alert("Kelas Tidak Boleh Kosong");
			return false; 
		}else if(nama == ''){
            alert("Nama Tidak Boleh Kosong");
			return false; 
		}else if(tgl_lahir == ''){
			alert("Tanggal lahir Tidak Boleh Kosong");
			return false; 
		}
        
    });

});

$(function () {
    $('#tgl_lahir1').datetimepicker({
        format: 'YYYY-MM-DD',
    });

});

</script>
    -->
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
	$query=mysql_query("SELECT * FROM satuan order by id_satuan")or die("gagal".mysql_error());
	

function doBrowse(){
	$query = mysql_query("SELECT * FROM data_satuan_konversi");	

    
	?>
	<div class="col-md-11">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Data Satuan Barang</legend>
			

			<div class="table-responsive">
			<div class="col-md-12" style="margin-bottom: 15px;">
				 <a href="?mod=satuan&act=addsatuan" class="btn btn-md btn-primary">Tambah Satuan</a></div>
			</div>
				<table class="table table-bordered" id="example1">
					<thead>
						<tr>
							<th>No</th>
							<th>Satuan Terbesar</th>
							<th>Satuan Terkecil</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						while ($result = mysql_fetch_assoc($query)) {
							?>
							<tr>
								<td><?=$no++;?></td>
								<td><?=$result['satuan_terbesar'];?></td>
								<td><?=$result['satuan_terkecil'];?></td>
								<td width="15%"><center>
									<a href="?mod=brg_keluar&act=view_brgkeluar&id=<?php echo $result['id'];?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
									<a href="mod\transaksi\aksi\hp_keluar.php?id=<?php echo $result['id'];?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a>
								</center>
								</td>
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
    } // end

    function doAdd(){
    $aksi = $_GET[act];  
?>
<div class="tabelku col-md-8">
	<div class="box-body">
    
		<form action="aksi.php?mod=satuan&act=insert" method="post" id="satuan1" enctype="multipart/form-data">
		 <?php
                if($aksi == "editsatuan"){
           	        $edit=mysql_query("SELECT a.*,b.nama AS nm_besar,b.jumlah AS jum_besar,c.nama AS nm_sedang,c.jumlah AS jum_sedang,
									   d.nama AS nm_kecil,d.jumlah AS jum_kecil FROM satuan a 
									   INNER JOIN besar b ON a.st_besar=b.id 
									   INNER JOIN sedang c ON a.st_sedang=c.id 
									   INNER JOIN kecil d ON a.st_kecil=d.id
										where a.id_satuan='$_GET[id]'");
	                $d=mysql_fetch_array($edit);   
           	       }
            ?>       
        <input type="hidden" name="id" id="id" value="<?php echo"$_GET[id]";?>" />
        <input type="hidden" name="aksi" id="aksi" value="<?php echo"$aksi";?>" />
        
		<div class="form-group">
		     <table width="100%">
				<tr>
					<td colspan="6" style="text-align:center"><h3><label> Input Master Satuan Barang </label></h3></td>
				</tr>
				  <tr>
					<td width="35%">
						<label>Satuan besar</label>
					</td>
					<td width="60%">
						   <?php if($aksi == "editsatuan"){ ?>
						   <?php  echo"<select name='st_besar' id='st_besar' class='form-control'>
										  <option value='$d[st_besar]' selected>$d[nm_besar]</option>";
								   $tampil=mysql_query("SELECT * FROM besar ");
								   while($v=mysql_fetch_array($tampil)){
										echo "<option value='$v[id]'>$v[nama]</option>";
								   }
										echo "</select>";
						   ?>
						   <?php }else{ ?> 
							<?php echo"<select name='st_besar' id='st_besar' class='form-control'>
										  <option value='' selected>- Pilih Satuan Besar -</option>";
							   $tampil=mysql_query("SELECT * FROM besar ");
							   while($v=mysql_fetch_array($tampil)){
									echo "<option value='$v[id]'>$v[nama]</option>";
							   }
									echo "</select>";
							?>
							<?php } ?> 
					</td>
					 <td width="52%">
					   <label>&nbsp;</label>
					 </td>
				  </tr>
				  <tr>
					<td width="35%">
						<label>Satuan Sedang</label>
					</td>
					<td width="60%">
						   <?php if($aksi == "editsatuan"){ ?>
						   <?php  echo"<select name='st_sedang' id='st_sedang' class='form-control'>
										  <option value='$d[st_sedang]' selected>$d[nm_sedang] ( $d[jum_sedang] )</option>";
								   $tampil=mysql_query("SELECT * FROM sedang ");
								   while($v=mysql_fetch_array($tampil)){
										echo "<option value='$v[id]'>$v[nama] ( $v[jumlah] )</option>";
								   }
										echo "</select>";
						   ?>
							<?php }else{ ?> 
							<?php echo"<select name='st_sedang' id='st_sedang' class='form-control'>
										  <option value='' selected>- Pilih Satuan Sedang -</option>";
							   $tampil=mysql_query("SELECT * FROM sedang ");
							   while($v=mysql_fetch_array($tampil)){
									echo "<option value='$v[id]'>$v[nama] ( $v[jumlah] )</option>";
							   }
									echo "</select>";
							?>
							<?php } ?>  
					</td>
					 <td width="52%">
					   <label>&nbsp;</label>
					 </td>
				   </tr>
				  <tr>
					<td width="35%">
						<label>Satuan Kecil</label>
					</td>
					<td width="60%">
						   <?php if($aksi == "editsatuan"){ ?>
						   <?php  echo"<select name='st_kecil' id='st_kecil' class='form-control'>
										  <option value='$d[st_kecil]' selected>$d[nm_kecil] ( $d[jum_kecil] )</option>";
								   $tampil=mysql_query("SELECT * FROM kecil ");
								   while($v=mysql_fetch_array($tampil)){
										echo "<option value='$v[id]'>$v[nama] ( $v[jumlah] )</option>";
								   }
										echo "</select>";
						   ?>
							<?php }else{ ?> 
								<?php echo"<select name='st_kecil' id='st_kecil' class='form-control'>
											  <option value='' selected>- Pilih Satuan Kecil -</option>";
								   $tampil=mysql_query("SELECT * FROM kecil ");
								   while($v=mysql_fetch_array($tampil)){
										echo "<option value='$v[id]'>$v[nama] ( $v[jumlah] )</option>";
								   }
										echo "</select>";
								?>
							<?php } ?> 
					</td>
					 <td width="52%">
					   <label>&nbsp;</label>
					 </td>
				  </tr>
				 
			   </table>
			</div>
            <br><br>
			<div class="form-group" >
               <input type="submit" class="btn btn-info" value="simpan">
               <input type="button" class="btn btn-danger" onClick='self.history.back()'  value="batal">
			</div>                          
		</form>
	</div>
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
	case "addsatuan":
        doAdd();
     break;
	case "editsatuan":
        doAdd();
     break;

break;
}
?>