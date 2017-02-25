<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">


<script type="text/javascript">	
$(document).ready(function(){
 $("#sedang1").submit(function(){
		
		var nama	= document.getElementById("nama").value;
		var jumlah	= document.getElementById("jumlah").value;
		
		
		if(nama == ''){
			alert("Nama Tidak Boleh Kosong");
			return false;
		}else if(jumlah == ''){
            alert("Jumlah Tidak Boleh Kosong");
			return false; 
		}
        
    });

});

</script>
   
<?php

function doBrowse(){
		$no=0;
		$query=mysql_query("select id,nama,jumlah from satuan_sedang")or die("gagal".mysql_error());
		// $query=mysql_query("select * from sedang")or die("gagal".mysql_error());
		
?>
     <div class="tabelku">
	<div class="content-header"><center><h3><b><label>Data Satuan Sedang</label></b><h3></a></center></div>
    <div class="content-header">
		<a href="?mod=sedang&act=addsedang" class="blue_solid">Tambah</a>
	</div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
                       <th>Satuan</th>
					   <th>Jumlah</th>
                       <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
               
               <?php
			   while($r=mysql_fetch_assoc($query)){
			   $no++;
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
					   <td width="35%"><?php echo"$r[nama]";?></td>
                       <td width="25%"><?php echo"$r[jumlah]";?></td>
                       <td width="15%"><a href="?mod=sedang&act=editsedang&id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="aksi.php?mod=sedang&act=hapus_sedang&id=<?php echo"$r[id]";?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a></td>
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
<div class="tabelku col-md-5">
	<div class="box-body">
    <div class="content-header"><h3><b><label>Data Satuan Sedang</label></b><h3></a></div>
		<form action="aksi.php?mod=sedang&act=insert" method="post" id="sedang1" enctype="multipart/form-data">
		 
		 <?php
				$no_max=mysql_query("SELECT ifnull(count(id),0)+1 AS reg  FROM sedang");
	            $n=mysql_fetch_array($no_max);
				$id_reg = S.$n[reg];
				if($aksi == "editsedang"){
           	        $edit=mysql_query("SELECT id,nama,jumlah FROM satuan_sedang where id='$_GET[id]'");
	                $d=mysql_fetch_assoc($edit);   
           	       }
            ?> 
				
        <input type="hidden" name="id" id="id" value="<?php echo"$id_reg";?>" />
		<input type="hidden" name="id2" id="id2" value="<?php echo"$_GET[id]";?>" />
        <input type="hidden" name="aksi" id="aksi" value="<?php echo"$aksi";?>" />
        	
			<?php if( $aksi == "addsedang" ) {?>
				<div class="form-group">
				   <label>Nama Satuan</label>
				   <input class="form-control" placeholder="Nama Satuan" name="nama" id="nama" type="text" >
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>Nama Satuan</label>
				   <input class="form-control" placeholder="Nama Satuan" name="nama" id="nama" type="text" value="<?php echo"$d[nama]"?>"  >
				</div>
			<?php }?>
			
			<?php if( $aksi == "addsedang" ) {?>
				<div class="form-group">
				   <label>Jumlah</label>
				   <input class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah" type="text" >
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>Jumlah</label>
				   <input class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah" type="text" value="<?php echo"$d[jumlah]"?>"  >
				</div>
			<?php }?>
			
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
	case "addsedang":
        doAdd();
     break;
	case "editsedang":
        doAdd();
     break;

break;
}