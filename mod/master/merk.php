<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">


<script type="text/javascript">	
$(document).ready(function(){
 $("#merk1").submit(function(){
		
		var nama	= document.getElementById("nama").value;
		var kode	= document.getElementById("id").value;
		
		
		if(kode == ''){
            alert("Kode Tidak Boleh Kosong");
			return false;
		}else if(nama == ''){
			alert("Nama Tidak Boleh Kosong");
			return false; 
		}
        
    });

});

</script>
   
<?php

function doBrowse(){
		$no=0;
		$query=mysql_query("select * from merk")or die("gagal".mysql_error());
		
?>
     <div class="tabelku">
	<div class="content-header"><center><h3><b><label>Data Merk Barang</label></b><h3></a></center></div>
    <div class="content-header">
		<a href="?mod=merk&act=addmerk" class="blue_solid">Tambah</a>
	</div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
                       <th>Merk Barang</th>
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
					   <td width="35%"><?php echo"$r[nm_merk]";?></td>
                       <td width="15%"><a href="?mod=merk&act=editmerk&id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="aksi.php?mod=merk&act=hapus_merk&id=<?php echo"$r[id]";?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a></td>
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
    <div class="content-header"><h3><b><label>Data Merk Barang</label></b><h3></a></div>
		<form action="aksi.php?mod=merk&act=insert" method="post" id="merk1" enctype="multipart/form-data">
		 
		 <?php
				
				if($aksi == "editmerk"){
           	        $edit=mysql_query("SELECT * FROM merk where id='$_GET[id]'");
	                $d=mysql_fetch_array($edit);   
           	       }
            ?> 
				
		<input type="hidden" name="id2" id="id2" value="<?php echo"$_GET[id]";?>" />
        <input type="hidden" name="aksi" id="aksi" value="<?php echo"$aksi";?>" />
        	
			<?php if( $aksi == "addmerk" ) {?>
				<div class="form-group">
				   <label>Kode Merk</label>
				   <input class="form-control" placeholder="Kode Merk" name="id" id="id" type="text" >
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>Kode Merk</label>
				   <input class="form-control" placeholder="Kode Merk" name="id" id="id" type="text" value="<?php echo"$d[id]"?>"  >
				</div>
			<?php }?>
			
			<?php if( $aksi == "addmerk" ) {?>
				<div class="form-group">
				   <label>Nama Merk</label>
				   <input class="form-control" placeholder="Merk" name="nama" id="nama" type="text" >
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>Nama Merk</label>
				   <input class="form-control" placeholder="Merk" name="nama" id="nama" type="text" value="<?php echo"$d[nm_merk]"?>"  >
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
	case "addmerk":
        doAdd();
     break;
	case "editmerk":
        doAdd();
     break;

break;
}