<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">

<script type="text/javascript">	

$(function(){
    $("#barang1").submit(function(){
		
		var jenis    = $.trim($('#id_jenis').val());
        var warna    = $.trim($('#id_warna').val());
		var merk     = $.trim($('#id_merk').val());
		
		
		if(jenis == ''){
			alert("Jenis Tidak Boleh Kosong");
			return false;
		}else if(warna == ''){
			alert("Warna Tidak Boleh Kosong");
			return false;
		}else if(merk == ''){
			alert("Merk Tidak Boleh Kosong");
			return false;
		}
    });
});

</script>

 
<?php
function doBrowse(){
		$no=0;
		$query=mysql_query("SELECT * FROM master_produk")or die("gagal".mysql_error());
		
?>
    <div class="tabelku">
    <div class="content-header">
    <a href="?mod=barang&act=addbarang" class="blue_solid">Tambah barang</a></div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
                       <th>Nama</th>
					   <th>Warna</th>
					   <th>Merk</th>
					   <th>Satuan</th>
                       <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
               
               <?php
			  
			   while($result =mysql_fetch_array($query)){
			   $no++;
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
					   <td width="20%"><?php echo $result['nama'];?></td>
                       <td width="20%"><?php echo $result['warna'];?></td>
					   <td width="20%"><?php echo $result['nama'];?></td>
					   <td width="20%"><?php echo $result[''];?></td>
                       <td width="15%"><a href="?mod=barang&act=editbarang&id=<?php echo $result['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="aksi.php?mod=barang&act=hapus_barang&id=<?php echo $result['id'];?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    </tr>
               <?php
			   }
			   ?>
             </tbody>
        </table>
    </div>
    
<?php
    }
    /////// function tambah ////////
    function doAdd(){
    $aksi = $_GET[act];  
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
<form id="form-barang" method="post" action="">
	<div class="col-md-10">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Tambah Barang</legend>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" class="form-control" name="nama" placeholder="nama">
				</div>
				
				<div class="form-group">
					<label>Warna Barang</label>
					<input type="text" class="form-control" name="warna" placeholder="warna">
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Jenis Barang</label>
					<select name="jenis_id" class="form-control">
						<option value="">-Pilih Jenis Barang-</option>
						<?php
						$query = mysql_query("select * from master_jenis");
						while($result = mysql_fetch_assoc($query) ){
							echo "<option value='".$result['id']."'>".$result['nama']."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Satuan Barang</label>
					<select name="konversi_satuan_id" class="form-control">
						<option value="">-Pilih Satuan Barang-</option>
						<?php
						
						$query = mysql_query("select id, getSatuan(satuan_terkecil) as satuan_terkecil from konversi_satuan where parent = 0");
						while($result = mysql_fetch_assoc($query) ){
							echo "<option value='".$result['id']."'>".$result['satuan_terkecil']."</option>";
						}
						?>
					</select>
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
	$('#form-barang').submit(function(){
		$.post('controllers/master_barang.php?act=add',$('#form-barang').serialize(),function(data){
			alert(data);
			window.location.href = "media.php?mod=barang";
		});
		return false;
	}); // end function submit
}); // end function document
</script>

<?php
}
// end method add new barang
?>

<?php
/////// akhir function edit //////// 
switch($_GET['act']){
    default:
        doBrowse();
     break;
	case "addbarang":
        doAdd();
     break;
	case "editbarang":
        doAdd();
     break;

break;
}
?>