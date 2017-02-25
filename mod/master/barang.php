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
		$query=mysql_query("SELECT e.*,a.id_satuan,
							CONCAT('Besar : ' , b.nama , CONCAT(' ( ' , b.jumlah , ' ) ')) AS besar,
							CONCAT('Sedang : ' , c.nama , CONCAT(' ( ' , c.jumlah , ' ) ')) AS sedang,
							CONCAT('Kecil : ' , d.nama , CONCAT(' ( ' , d.jumlah , ' ) ')) AS kecil FROM satuan a 
							INNER JOIN barang e ON a.id_satuan=e.id_satuan
							INNER JOIN besar b ON a.st_besar=b.id 
							INNER JOIN sedang c ON a.st_sedang=c.id 
							INNER JOIN kecil d ON a.st_kecil=d.id")or die("gagal".mysql_error());
		
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
			  
			   while($r=mysql_fetch_array($query)){
			   $no++;
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
					   <td width="20%"><?php echo"$r[nm_jenis]";?></td>
                       <td width="20%"><?php echo"$r[nm_warna]";?></td>
					   <td width="20%"><?php echo"$r[nm_merk]";?></td>
					   <td width="20%"><?php echo"$r[besar]";?> <br><?php echo"$r[sedang]";?><br><?php echo"$r[kecil]";?></td>
                       <td width="15%"><a href="?mod=barang&act=editbarang&id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="aksi.php?mod=barang&act=hapus_barang&id=<?php echo"$r[id]";?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a></td>
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
	<div class="col-md-10">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Tambah Barang</legend>

			<div class="form-group">
				<label>Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				</div>
				
		</fieldset>
	</div>


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