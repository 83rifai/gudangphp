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
	$query=mysql_query("SELECT * FROM master_satuan order by id")or die("gagal".mysql_error());
	

function doBrowse(){
	$query = mysql_query("SELECT * FROM data_satuan_konversi");	

    
	?>
	<div class="col-md-11">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Data Konveris Satuan Barang</legend>
			

			<div class="table-responsive">
			<div class="col-md-12" style="margin-bottom: 15px;">
				 <a href="?mod=satuan&act=addsatuan" class="btn btn-md btn-primary">Tambah Konversi Satuan</a></div>
			</div>
				<table class="table table-bordered" id="example1">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>Satuan Terbesar</th>
							<th>Satuan Terkecil</th>
							<th>Jumlah</th>
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
								<td><?=$result['jumlah'];?></td>
								<td width="15%" align="center">
							   <a href="?mod=barang&act=editsatuan&id=<?php echo $result['id'];?>" class="btn btn-info btn-md"><i class="fa fa-edit"></i></a>&nbsp;
		                       <a href="javascript:void(0)" class="btn btn-danger btn-md" onclick="DelData('controllers/master_satuan.php?act=del&id=<?php echo $result['id'];?>');" ><i class="fa fa-trash-o"></i></a></td>
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
   
    $aksi = $_GET['act'];
	$results = "";
	if($_GET['id']){	
		$queries = mysql_query("select * from master_satuan where id = ".$_GET['id']." ");
		$results = mysql_fetch_assoc($queries);
	}
?>
<script type="text/javascript">	
$(function(){	
		
  $('#id_jenis').on('change', function() {
    if(this.value!=null){
      $("#nm_jenis").val($("#id_jenis option:selected").text());
    }
  })
  // $('#id_warna').on('change', function() {
    // if(this.value!=null){
      // $("#nm_warna").val($("#id_warna option:selected").text());
    // }
  // })
  $('#id_merk').on('change', function() {
    if(this.value!=null){
      $("#nm_merk").val($("#id_warna option:selected").text());
    }
  })

})
</script>

<form id="form-input" method="post" action="<?=$_GET['id']?>">
	<div class="col-md-10">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Tambah Satuan</legend>
			<div class="col-md-6">
			<input type="hidden"  value=<?=$_GET[id]?$_GET[id]:""?>" name="id" >
				<div class="form-group">
					<label>Nama Satuan</label>
					<input type="text" class="form-control" value="<?=$results['nama']?$results['nama']:""?>" name="nama" placeholder="nama">
				</div>
				
			</div>
						
			<div class="col-md-10">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary btn-md">
			</div>
		</fieldset>
	</div>
	
</form>

<script>
$(document).ready(function(){
	$('#form-input').submit(function(){
		var act = "add";
		if($('input[name=id]').val()){act = "edit";}
		$.post('controllers/master_satuan.php?act='+act,$('#form-input').serialize(),function(data){
			alert(data);
			window.location.href = "media.php?mod=satuan";
		});
		return false;
	}); // end function submit
}); // end function document
</script>

 


<?php
} // end function

 
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