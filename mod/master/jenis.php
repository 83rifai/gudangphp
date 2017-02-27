<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">



   
<?php

function doBrowse(){
		$no = 0;
		$query = mysql_query("select * from master_jenis")or die("gagal".mysql_error());
		
?>
     <div class="tabelku">
	<div class="content-header"><center><h3><b><label>Data Jenis Barang</label></b><h3></a></center></div>
    <div class="content-header">
		<a href="?mod=jenis&act=addjenis" class="blue_solid">Tambah</a>
	</div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
                       <th>Jenis Barang</th>
                       <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
               
               <?php
			   while($result = mysql_fetch_assoc($query)){
			   $no++;
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
					   <td width="35%"><?php echo $result['nama'];?></td>
                       <td width="15%"><a href="?mod=jenis&act=editjenis&id=<?php echo $result['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="javascript:void(0)" class="btn btn-danger" onclick="DelData('controllers/master_jenis.php?act=del&id=<?php echo $result['id'];?>');" ><i class="fa fa-trash-o"></i></a></td>
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
    
    // function method add

    function doAdd(){
    $aksi = $_GET['act'];
    if($_GET['id']){
    	$queries = mysql_query("select * from master_jenis where id = ".$_GET['id']." ");
		$results = mysql_fetch_assoc($queries);
    }  
?>

<form id="form-jenis" method="post" action="<?=$_GET['id']?>">
	<div class="col-md-10">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Tambah Jenis</legend>
			<div class="col-md-6">
			<input type="hidden"  value=<?=$_GET[id]?$_GET[id]:""?>" name="id" >
				<div class="form-group">
					<label>Nama Barang</label>
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
	$('#form-jenis').submit(function(){
		var act = "add";
		if($('input[name=id]').val()){act = "edit";}
		$.post('controllers/master_jenis.php?act='+act,$('#form-jenis').serialize(),function(data){
			alert(data);
			window.location.href = "media.php?mod=jenis";
		});
		return false;
	}); // end function submit
}); // end function document
</script>

<?php
}
 // end function method add
?>

<?php
 // end function method add 
switch($_GET['act']){
    default:
        doBrowse();
     break;
	case "addjenis":
        doAdd();
     break;
	case "editjenis":
        doAdd();
     break;

break;
}