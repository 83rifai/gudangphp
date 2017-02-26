<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">


<script type="text/javascript">	
$(document).ready(function(){
 $("#suplier1").submit(function(){
		
		var nm_suplier	= document.getElementById("nm_suplier").value;
		var almt_suplier	= document.getElementById("almt_suplier").value;
		var no_telp			= document.getElementById("no_telp").value;
		var email			= document.getElementById("email").value;
		
		
		if(nm_suplier == ''){
			alert("Nama Tidak Boleh Kosong");
			return false;
		}else if(almt_suplier == ''){
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
	$query=mysql_query("SELECT * FROM master_suplier order by id")or die("gagal".mysql_error());
	

function doBrowse(){
		$no=0;
		$query=mysql_query("select * from master_suplier")or die("gagal".mysql_error());
		
?>
    <div class="tabelku">
	<div class="content-header"><center><h3><b><label>Data Suplier</label></b><h3></a></center></div>
    <div class="content-header">
		<a href="?mod=suplier&act=addsuplier" class="blue_solid">Tambah suplier</a>
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
                       <td width="5%"><?php echo $no;?></td>
					   <td width="35%"><?php echo $result['nama'];?></td>
                       <td width="25%"><?php echo $result['alamat'];?></td>
					   <td width="20%"><?php echo $result['no_telp'];?> / <br><?php echo $result['email'];?></td>
                       <td width="15%"><a href="?mod=suplier&act=editsuplier&id=<?php echo $result['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="javascript:void(0)" class="btn btn-danger" onclick="DelData('controllers/master_supplier.php?act=del&id=<?php echo $result['id'];?>');" ><i class="fa fa-trash-o"></i></a></td>
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
    // this function add new data
    function doAdd(){
    $aksi = $_GET['act'];
		if($_GET['id']){
			$queries = mysql_query("SELECT * FROM master_suplier WHERE id = ".$_GET['id']." ");
			$results = mysql_fetch_assoc($queries);
		}
?>

<form id="form-suplier" method="post" action="<?=$_GET['id']?>">
	<div class="col-md-10">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Tambah Suplier</legend>
			<div class="col-md-6">
			<input type="hidden" value="<?=$results['id']?$results['id']:"0"?>" name="id" >
				<div class="form-group">
					<label>Nama Suplier</label>
					<input type="text" class="form-control" value="<?=$results['nama']?$results['nama']:""?>" name="nama" placeholder="nama">
				</div>
				
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" class="form-control" value="<?=$results['alamat']?$results['alamat']:""?>" name="alamat" placeholder="Alamat Suplier">
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" class="form-control" value="<?=$results['alamat']?$results['alamat']:""?>" name="no_telp" placeholder="Nomor Telephone">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" value="<?=$results['email']?$results['email']:""?>" name="email" placeholder="Alamat Email">
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
	$('#form-suplier').submit(function(){
		var act = "add";
		if($('input[name=id]') == "0"){act = "edit";}
		$.post('controllers/master_supplier.php?act='+act,$('#form-suplier').serialize(),function(data){
			alert(data);
			window.location.href = "media.php?mod=suplier";
		});
		return false;
	}); // end function submit
}); // end function document
</script>

<?php
}
 // function end
?>

<?php
 // function end
switch($_GET['act']){
    default:
        doBrowse();
     break;
	case "addsuplier":
        doAdd();
     break;
	case "editsuplier ":
        doAdd();
     break;

break;
}
?>