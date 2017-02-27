<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">


<script type="text/javascript">	
$(document).ready(function(){
 $("#pelanggan1").submit(function(){
		
		var nm_pelanggan	= document.getElementById("nm_pelanggan").value;
		var almt_pelanggan	= document.getElementById("almt_pelanggan").value;
		var no_telp			= document.getElementById("no_telp").value;
		var email			= document.getElementById("email").value;
		
		
		if(nm_pelanggan == ''){
			alert("Nama Tidak Boleh Kosong");
			return false;
		}else if(almt_pelanggan == ''){
            alert("Alamat Tidak Boleh Kosong");
			return false; 
		}else if(no_telp == ''){
            alert("No Telp Tidak Boleh Kosong");
			return false; 
		}else if(email == ''){
			alert("Email lahir Tidak Boleh Kosong");
			return false; 
		}
        
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
	$query=mysql_query("SELECT * FROM pelanggan order by id")or die("gagal".mysql_error());
	

function doBrowse(){
		$no=0;
		$query=mysql_query("select * from master_pelanggan")or die("gagal".mysql_error());
		
?>
    <div class="tabelku">
	<div class="content-header"><center><h3><b><label>Data Pelanggan</label></b><h3></a></center></div>
    <div class="content-header">
		<a href="?mod=pelanggan&act=addpelanggan" class="blue_solid">Tambah pelanggan</a>
	</div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
                       <th>Nama</th>
					   <th>Alamat</th>
					   <th>No telp / Email</th>
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
                       <td width="25%"><?php echo $result['alamat'];?></td>
					   <td width="20%"><?php echo $result['no_telp'];?> / <br><?php echo $result['email'];?></td>
                       <td width="15%"><a href="?mod=pelanggan&act=editpelanggan&id=<?php echo $result['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="javascript:void(0)" class="btn btn-danger" onclick="DelData('controllers/master_pelanggan.php?act=del&id=<?php echo $result['id'];?>');" ><i class="fa fa-trash-o"></i></a></td>
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
    
    // this method for add new data
    function doAdd(){
    $aksi = $_GET['act'];
    if($_GET['id']){
    	$queries = mysql_query("select * from master_pelanggan where id = ".$_GET['id']." ");
		$results = mysql_fetch_assoc($queries);
    }
?>

<form id="form-pelanggan" method="post" action="<?=$_GET['id']?>">
	<div class="col-md-10">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Tambah Pelanggan</legend>
			<div class="col-md-6">
			<input type="hidden"  value=<?=$_GET['id']?$_GET['id']:""?>" name="id" >
				<div class="form-group">
					<label>Nama Pelanggan</label>
					<input type="text" class="form-control" value="<?=$results['nama']?$results['nama']:""?>" name="nama" placeholder="Nama">
				</div>
				
				<div class="form-group">
					<label>Alamat Pelanggan</label>
					<input type="text" class="form-control" value="<?=$results['alamat']?$results['alamat']:""?>" name="alamat" placeholder="Alamat">
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor Telephone</label>
					<input type="text" class="form-control" value="<?=$results['no_telp']?$results['no_telp']:""?>" name="no_telp" placeholder="Nomor Telephone">
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" value="<?=$results['email']?$results['email']:""?>" name="email" placeholder="Email">
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
	$('#form-pelanggan').submit(function(){
		var act = "add";
		if($('input[name=id]').val()){act = "edit";}
		$.post('controllers/master_pelanggan.php?act='+act,$('#form-pelanggan').serialize(),function(data){
			alert(data);
			window.location.href = "media.php?mod=pelanggan";
		});
		return false;
	}); // end function submit
}); // end function document
</script>


<?php
}
 // method add end
?>

<?php
 // method edit end 
switch($_GET['act']){
    default:
        doBrowse();
     break;
	case "addpelanggan":
        doAdd();
     break;
	case "editpelanggan":
        doAdd();
     break;

break;
}
?>