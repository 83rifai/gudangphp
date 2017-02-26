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
		$query=mysql_query("SELECT
			master_produk.id,
			master_produk.nama as nama,
			master_produk.merk_id,
			master_produk.satuan_id,
			master_produk.warna as warna,
			master_produk.stock as stock,
			master_produk.konversi_satuan_id,
			master_produk.jenis_id,
			konversi_satuan.parent,
			getSatuan(konversi_satuan.satuan_terbesar) satuan_terbesar,
			getSatuan(konversi_satuan.satuan_terkecil) as satuan_terkecil,
			master_jenis.nama as jenis,
			master_merk.nama as merk
			FROM
				master_produk
			LEFT JOIN konversi_satuan ON konversi_satuan.id = master_produk.konversi_satuan_id
			LEFT JOIN master_jenis ON master_jenis.id = master_produk.jenis_id
			LEFT JOIN master_merk ON master_merk.id = master_produk.merk_id")or die("gagal".mysql_error());
		
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
                       <td width="5%"><?php echo $no;?></td>
					   <td width="20%"><?php echo $result['nama'];?></td>
                       <td width="20%"><?php echo $result['warna'];?></td>
					   <td width="20%"><?php echo $result['merk'];?></td>
					   <td width="20%"><?php echo $result['satuan_terkecil'];?></td>
                       <td width="15%" align="center">
					   <a href="?mod=barang&act=editbarang&id=<?php echo $result['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>&nbsp;
                       <a href="javascript:void(0)" class="btn btn-danger" onclick="DelData('controllers/master_barang.php?act=del&id=<?php echo $result['id'];?>');" ><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    </tr>
               <?php
			   }
			   ?>
             </tbody>
        </table>
    </div>
	<script type="text/javascript">
	function DelData(Url){
		$.post(Url,function(data){
			alert(data);
			window.location.reload();
		});
		return false;
		
	}
	</script>
    
<?php
    }
    // this function PHP add new data
    function doAdd(){
    $aksi = $_GET['act'];
	$results = "";
	if($_GET['id']){	
		$queries = mysql_query("select * from master_produk where id = ".$_GET['id']." ");
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

<form id="form-barang" method="post" action="<?=$_GET['id']?>">
	<div class="col-md-10">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Tambah Barang</legend>
			<div class="col-md-6">
			<input type="hidden" value="<?=$results['id']?$results['id']:""?>" name="id" >
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" class="form-control" value="<?=$results['nama']?$results['nama']:""?>" name="nama" placeholder="nama">
				</div>
				
				<div class="form-group">
					<label>Warna Barang</label>
					<input type="text" class="form-control" value="<?=$results['warna']?$results['warna']:""?>" name="warna" placeholder="warna">
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
							$selected = "";
							if($results['jenis_id']==$result['id']){$selected = "selected";}
							echo "<option ".$selected." value='".$result['id']."'>".$result['nama']."</option>";
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
							$s_selected = "";
							if($results['konversi_satuan_id'] == $result['id'] ){$s_selected = "selected";}
							echo "<option ".$s_selected." value='".$result['id']."'>".$result['satuan_terkecil']."</option>";
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
		var act = "add";
		if($('input[name=id]')){act = "edit";}
		$.post('controllers/master_barang.php?act='+act,$('#form-barang').serialize(),function(data){
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
 // end function
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