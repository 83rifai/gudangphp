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
		$query=mysql_query("select * from suplier")or die("gagal".mysql_error());
		
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
			   while($r=mysql_fetch_array($query)){
			   $no++;
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
					   <td width="35%"><?php echo"$r[nm_suplier]";?></td>
                       <td width="25%"><?php echo"$r[almt_suplier]";?></td>
					   <td width="20%"><?php echo"$r[no_telp]";?> / <br><?php echo"$r[email]";?></td>
                       <td width="15%"><a href="?mod=suplier&act=editsuplier&id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="aksi.php?mod=suplier&act=hapus_suplier&id=<?php echo"$r[id]";?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a></td>
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
    // this function add new data
    function doAdd(){
    $aksi = $_GET[act];  
?>
<div class="tabelku col-md-5">
	<div class="box-body">
    <div class="content-header"><h3><b><label>Data Suplier</label></b><h3></a></div>
		<form action="aksi.php?mod=suplier&act=insert" method="post" id="suplier1" enctype="multipart/form-data">
		 
		 <?php
				$no_max=mysql_query("SELECT ifnull(max(id),0)+1 AS reg  FROM suplier");
	            $n=mysql_fetch_array($no_max);
				
				if($aksi == "editsuplier"){
           	        $edit=mysql_query("SELECT * FROM suplier where id='$_GET[id]'");
	                $d=mysql_fetch_array($edit);   
           	       }
            ?> 
				
        <input type="hidden" name="id" id="id" value="<?php echo"$n[reg]";?>" />
		<input type="hidden" name="id2" id="id2" value="<?php echo"$_GET[id]";?>" />
        <input type="hidden" name="aksi" id="aksi" value="<?php echo"$aksi";?>" />
        	
			<?php if( $aksi == "addsuplier" ) {?>
				<div class="form-group">
				   <label>Nama (Perusahaan)</label>
				   <input class="form-control" placeholder="Nama Suplier" name="nama" id="nm_suplier" type="text" >
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>Nama (Perusahaan)</label>
				   <input class="form-control" placeholder="Nama Suplier" name="nama" id="nm_suplier" type="text" value="<?php echo"$d[nm_suplier]"?>"  >
				</div>
			<?php }?>
			
			<?php if( $aksi == "addsuplier" ) {?>
				<div class="form-group">
				   <label>Alamat </label>
				   <textarea class="form-control" placeholder="Alamat Suplier" name="alamat" id="alamat" type="text"></textarea>
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>Alamat </label>
				   <textarea class="form-control" placeholder="Alamat Suplier" name="alamat" id="alamat" type="text"><?php echo"$d[almt_suplier]"?></textarea>
				</div>
			<?php }?>
			
			<?php if( $aksi == "addsuplier" ) {?>
				<div class="form-group">
				   <label>No Telp </label>
				   <input class="form-control" placeholder="No telp Suplier" name="no_telp" id="no_telp" type="text" >
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>No Telp</label>
				   <input class="form-control" placeholder="No telp Suplier" name="no_telp" id="no_telp" type="text" value="<?php echo"$d[no_telp]"?>"  >
				</div>
			<?php }?>
			
			<?php if( $aksi == "addsuplier" ) {?>
				<div class="form-group">
				   <label>Email </label>
				   <input class="form-control" placeholder="Email Suplier" name="email" id="email" type="text" >
				</div>
			<?php } else {?>
				<div class="form-group">
				   <label>Email</label>
				   <input class="form-control" placeholder="Email Suplier" name="email" id="email" type="text" value="<?php echo"$d[email]"?>"  >
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
	case "addsuplier":
        doAdd();
     break;
	case "editsuplier ":
        doAdd();
     break;

break;
}
?>