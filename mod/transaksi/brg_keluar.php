<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">

<script>	
	$(function () {
    $('#tgl').datetimepicker({
        format: 'YYYY-MM-DD',
    });

});

function tombol2(){
		 var w	=window.open("/gudang/mod/transaksi/data_barang_keluar.php","barangpopupWindow","width=1000,height=500,left=320,top=0,scrollbars=yes");
		 w.focus();
		 return false;
		  }

function tombol3(){
		 var kd  = document.getElementById("id_satuan").value;		
		 var w	=window.open("/gudang/mod/transaksi/data_satuan_keluar.php?kd="+kd,"satuanpopupWindow","width=1000,height=500,left=320,top=0,scrollbars=yes");
		 w.focus();
		 return false;
		  }
		  
function hapus(no){
	console.log(no);
    hpsbaris = $("tr#dt_barang"+no);
    hpsbaris.fadeOut("slow", function()
    {
        hpsbaris.remove();

    });
	
  }
  

function hapus1(no){
	console.log(no);
//	alert(x);
    hpsbaris = $("tr#dat"+no);
    hpsbaris.fadeOut("slow", function()
    {
        hpsbaris.remove();
    });
	
}

function hapus2(no){
	alert(no);
	
}


var no	= 1;
function addbarang1(str,vlue) {
			var id	   = document.getElementById("kd_tr_masuk").value;
			var kdID   = id+no;
			var nama   = $("#nm_barang").val();
			var kode   = $("#kd_barang").val();
			var satuan = $("#kd_satuan").val();
			var stn    = $("#satuan").val();
			var jumlah = $("#jumlah").val();
			//alert(id);
			
			//alert(nama+'|'+kode+'|'+satuan+'|'+jumlah);
			  row = '<tr id="dat'+no+'">'+
						'<td><input class="form-control" type="text" name="nm_barang[]" id="nm_barang'+nama+'" readonly="readonly" value="'+nama+'"></td>' +
						'<input class="form-control" type="hidden" name="kd_barang[]" id="kd_barang'+kode+'" readonly="readonly" value="'+kode+'">' +
						'<input class="form-control" type="hidden" name="satuan[]" id="satuan'+stn+'" readonly="readonly" value="'+stn+'">' +
						'<td><input class="form-control" type="text" name="kd_satuan[]" id="kd_satuan'+satuan+'" value="'+satuan+'"></td>' +
						'<td><input class="form-control" type="text" name="jumlah[]" id="jumlah" value="'+jumlah+'" readonly="readonly"></td>' +
						'<td><input type="button" class="btn btn-info" value="hapus"  onClick=hapus1('+no+')> </input></td>' +
					'</tr>';
					$(row).insertAfter("#dat");
					
			$("#nm_barang").val('');
			$("#kd_barang").val('');
			$("#kd_satuan").val('');
			$("#satuan").val('');
			$("#jumlah").val('');
		// */
			no++;
		 }

<!-- $('document').ready(function(){
	//$cek_all_cells = $('[name=nm_barang]'].val();
	//if($cek_all_cells == 
//}-->
/*$(document).ready(function() {
	$("#tambah").click(function(){
		var barang = $("#nm_barang").val();
		var satuan = $("#kd_satuan").val();
		if(barang == "" && satuan == ""){
			alert("tidak boleh kosong !");
		}
	}); 
});*/
		 
var no	= 1;
//no = $('#numbercount').val();
function addbarang() {
			var jum_tot  = document.getElementById("jum_tot").value;
			var jum_stok = document.getElementById("jum_masuk").value;
			var id	     = document.getElementById("kd_tr_keluar").value;
			var kd_barang = document.getElementById("kd_barang").value;
			//var kd_barang2= document.getElementByName("kd_barang[]").value;
			var nama     = $("#nm_barang").val();
			var kode     = $("#kd_barang").val();
			var satuan   = $("#kd_satuan").val();
			var id_satuan= $("#id_satuan").val();
			var stn      = $("#satuan").val();
			var jumlah   = $("#jumlah").val();
			var dot 	 = document.getElementById("tabletambah").rows.length-1;
			//alert(id);
			var jum_x    = jum_stok - jum_tot ;

			if(nama == "" && satuan == ""){
				alert("Data Barang Keluar Ditambahkan Tidak Boleh Kosong !");
			}else{
				//alert(dot);
				var i;
				for(i=1;i<=dot;i++){
				var dattable = $("#nm_barang_"+i).val();
					if(dattable == nama){
						alert("Tidak boleh memasukkan data barang yang sama lebih dari satu !");
						$("#nm_barang").val('');
						$("#kd_barang").val('');
						$("#kd_satuan").val('');
						$("#satuan").val('');
						$("#id_satuan").val('');
						$("#jumlah").val('');
						$("#jum_masuk").val('');
						$("#jum_x").val('');
						$("#jum_tot").val('');
						exit;
					}else{
						if(jum_x >= 0){
							row = '<tr id="dt_barang'+no+'">'+
									'<td><input class="form-control" type="text" name="nm_barang[]" id="nm_barang_'+no+'" readonly="readonly" value="'+nama+'"></td>' +
									'<input class="form-control" type="hidden" name="kd_barang[]" id="kd_barang'+kode+'" readonly="readonly" value="'+kode+'">' +
									'<input class="form-control" type="hidden" name="satuan[]" id="satuan'+stn+'" readonly="readonly" value="'+stn+'">' +
									'<input class="form-control" type="hidden" name="jum_tot[]" id="jum_tot'+jum_tot+'" readonly="readonly" value="'+jum_tot+'">' +
									'<td><input class="form-control" type="text" name="jumlah[]" id="jumlah" value="'+jumlah+'" readonly="readonly"></td>' +
									'<td><input class="form-control" type="text" name="kd_satuan[]" id="kd_satuan'+no+'" value="'+satuan+'" readonly="readonly"></td>' +
									'<input class="form-control" type="hidden" name="id_satuan[]" id="id_satuan'+id_satuan+'" readonly="readonly" value="'+id_satuan+'">' +
									'<td><input type="button" class="btn btn-info" value="hapus"  onClick=hapus('+no+')> </input></td>' +
								'</tr>';
							$(row).insertBefore("#dat");
							$("#nm_barang").val('');
							$("#kd_barang").val('');
							$("#kd_satuan").val('');
							$("#satuan").val('');
							$("#id_satuan").val('');
							$("#jumlah").val('');
							$("#jum_masuk").val('');
							$("#jum_x").val('');
							$("#jum_tot").val('');
						/*}*/			
					}else{
						//alert('gagal' + '|' + jum_tot + '|' + jum_stok);
						//alert(jum_tot + '<=' + jum_stok);
						alert('Jumlah Barang Keluar Melebihi Stok Barang');
						//$("#nm_barang").val('');
						//$("#kd_barang").val('');
						//$("#kd_satuan").val('');
						//$("#satuan").val('');
						//$("#id_satuan").val('');
						$("#jumlah").val('');
						$("#jumlah").focus();
						//$("#jum_masuk").val('');
						//$("#jum_x").val('');
						//$("#jum_tot").val('');
						
					}
					//alert(nama+'|'+kode+'|'+satuan+'|'+jumlah);
				
					no++;						
					}
				}
		 }	  
			}
	
    function total()
    {
		var satuan = document.getElementById("jum_x").value;
		//var id_barang = document.getElementById("kd_barang[]").value;
		var id_barang2= document.getElementById("kd_barang").value;
        var jumlah = document.getElementById("jumlah");
        var jum    = jumlah.value;
		var tot    = jum*satuan;
		//alert(tot);
		//alert('aaaa');
		//if(id_barang = )
        document.getElementById("jum_tot").value = tot;
  
    }


	
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
//	$query=mysql_query("SELECT * FROM brg_keluar order by id_brg_masuk")or die("gagal".mysql_error());
	

function doBrowse(){
$lvl = $_SESSION['level'];
		$no=0;
		$query=mysql_query("select * from tr_brg_keluar")or die("gagal".mysql_error());
		
?>
    <div class="tabelku">
    <?php if($lvl == "admin") {?>
	<div class="content-header">
		<a href="?mod=brg_keluar&act=addbrg_keluar" class="blue_solid">Tambah Barang keluar</a>
	</div>
	<?php } ?>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
					   <th>Kode Barang keluar</th>
                       <th>Tanggal Barang keluar</th>
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
					   <td width="40%"><?php echo"$r[id]";?></td>
					   <td width="30%"><?php echo"$r[tgl_keluar]";?></td>
                       <td width="25%">
						   <a href="?mod=brg_keluar&act=view_brgkeluar&id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-eye"></i></a> |
						   <!--<a href="?mod=brg_keluar&act=editbrg_keluar&id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | -->
						   <?php if($lvl == "admin") {?> 
						   <a href="mod\transaksi\aksi\hp_keluar.php?id=<?php echo"$r[id]";?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a>|
						   <?php } ?>
						   <a href="mod\transaksi\aksi\lp_srt_keluar.php?id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-print"></i></a> 
						   </td>
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
	
function doView(){
$id	 = $_GET[id];

?>
<div class="col-md-11" style="background:#fff;padding:15px;border:1px solid #ddd;">
	<?php
		$id=mysql_query("SELECT a.*,b.*,c.*
						FROM tr_brg_keluar a INNER JOIN td_brg_keluar b
						ON a.id = b.id LEFT JOIN barang c
						ON b.kd_barang = c.id
						where a.id='$id'")or die("gagal".mysql_error());
			$d=mysql_fetch_array($id);
	?>
	<table class="table table-bordered">
		<tr>
			<td colspan="6" style="text-align:center"><label><h3>Data Barang keluar</h3></label></td>
		</tr>
		<tr>
			<td width="14%">
			   <label>Tanggal </label>
			 </td>
			 <td width="2%"><label>:</label></td>
			 <td width="33%">
				<?php echo(DateToIndo("$d[tgl_keluar]")); ?>
			 </td>
			 <td width="14%">
			   <label>No Transaksi </label>
			 </td>
			 <td width="2%"><label>:</label></td>
			 <td width="33%">		
				<?php echo "$d[id]"; ?>
			 </td>
		</tr>
	</table>	
	<table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
					   <th>Nama Barang</th>
					   <th>Warna Barang</th>
					   <th>Merk Barang</th>
                       <th>Satuan Barang</th>
					   <th>Jumlah Barang</th>
                    </tr>
               </thead>
               <tbody>
               
               <?php
			  $id2=mysql_query("SELECT a.*,b.*,c.*
						FROM tr_brg_keluar a INNER JOIN td_brg_keluar b
						ON a.id = b.id LEFT JOIN barang c
						ON b.kd_barang = c.id
						where a.id='$_GET[id]'")or die("gagal".mysql_error());
						
			  while($r=mysql_fetch_array($id2)){
			   $no++;
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
					   <td width="35%"><?php echo"$r[nm_jenis]";?></td>
					   <td width="15%"><?php echo"$r[nm_warna]";?></td>
					   <td width="15%"><?php echo"$r[nm_merk]";?></td>
					   <td width="15%"><?php echo"$r[satuan]";?></td>
                       <td width="15%"><?php echo"$r[jumlah]";?></td>
                    </tr>
               <?php
			   }
	?>	
	</table>
	<div class="form-group" >
	   <input type="button" class="btn btn-danger" onclick='window.location ="media.php?mod=brg_keluar"' value="Keluar">
	</div>
</div>
 
<?php
}
    /////// function tambah ////////
    function doAdd(){
    $aksi = $_GET[act]; 
?>
	<div class="tabelku col-md-11">
	<div class="box-body">
    
		<form action="mod\transaksi\aksi\tr_keluar.php" method="post" id="brg_keluar1" enctype="multipart/form-data" >
		 <?php
				$thn_skr = date('d-m-Y');
				$date	= explode('-',$thn_skr);
				$tgl	= $date[0];
				$bln	= $date[1];
				$thn	= $date[2];
				$th		= substr($thn , 2 ,2);
				$no_max=mysql_query("SELECT ifnull(max(no),0)+1 AS reg  FROM tr_brg_keluar");
	            $n=mysql_fetch_array($no_max);   
                
				$no_tr= "BM-"."$tgl$bln$th"."00".$n[reg];
				
            ?>       
        <input type="hidden" name="id" id="id" value="<?php echo"$_GET[id]";?>" />
        <input type="hidden" name="number" id="numbercount" value="0" />		
        <input type="hidden" name="aksi" id="aksi" value="<?php echo"$aksi";?>" />
          <table>	
			<div class="form-group">
                <div class="col-md-12">
					<label style="font-size:24px;">Input Barang keluar</label> 
				</div>
			</div>	
				<br><br><br>
			<div class="form-group col-lg-12">
				<div class="col-md-1">
					<label>Tanggal</label> 
				</div>
				<div class="col-md-4">		
					<div class='input-group date' id='tgl' name='tgl' >
                        <input type='text' class="form-control" id="tgl" name="tgl" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
				</div>
				<div class="col-md-2">
					<label>No Surat Jalan</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" placeholder="Nomor Surat Jalan" name="no_tr_masuk" id="no_tr_masuk" type="text" required>
				</div>
			</div>
            
            <div class="form-group col-lg-12">
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<label>No PO</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" placeholder="Nomor PO" name="no_po" id="no_po" type="text" >
				</div>	
			</div>
            
			<div class="form-group col-lg-12">
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<label>No Transaksi</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" placeholder="Nomor Transaksi" name="kd_tr_keluar" id="kd_tr_keluar" type="text" value="<?php echo"$no_tr"?>" readonly="">
				</div>	
			</div>
			<br><br>
			<div class="form-group col-lg-12">
				<div class="col-md-1">
					<label>Pelanggan</label> 
				</div>
				<div class="col-md-3">
					<?php echo"<select name='id_pelanggan' id='id_pelanggan' class='form-control'>
                                  <option value='' selected>- Pilih Pelanggan -</option>";
                   	   $tampil=mysql_query("SELECT * FROM pelanggan ");
                   	   while($v=mysql_fetch_array($tampil)){
                            echo "<option value='$v[id]'>$v[nm_pelanggan]</option>";
                       }
                            echo "</select>";
					?>
				</div>
			</div>
			<br><br>
			<div class="form-group col-lg-12">
				<div class="col-md-1">
					<label>Barang</label>
				</div>
				<div class="col-md-4">
					<input class="form-control" placeholder="Nama Barang" name="nm_barang[]" id="nm_barang" type="text" readonly="">
					<input class="form-control" name="kd_barang[]" id="kd_barang" type="hidden" >
					<input class="form-control" name="id_satuan[]" id="id_satuan" type="hidden" >
				</div>
				<div class="col-md-1">
					<input class="btn btn-info" type="button" value="cari" id="cari" onclick="tombol2()"> 
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<label>Jumlah Stok</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" name="jum_masuk[]" id="jum_masuk" type="text" readonly="">
				</div>	
			</div>
			<br><p></br>
			<div class="form-group col-lg-12">
				<div class="col-md-1">
					<label>Satuan</label> 
				</div>
				<div class="col-md-4">		
					<input class="form-control" placeholder="Satuan Barang" name="kd_satuan[]" id="kd_satuan" type="text" readonly="">
				    <input class="form-control" name="satuan[]" id="satuan" type="hidden" >
				    <input class="form-control" name="jum_x[]" id="jum_x" type="hidden" >
				</div>
				<div class="col-md-1">
					<input class="btn btn-info" type="button" value="cari" id="cari" onclick="tombol3()"> 
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<label>Jumlah</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" placeholder="Jumlah Barang" name="jumlah[]" id="jumlah" type="text"  onKeyUp="total()">
					<input class="form-control" name="jum_tot[]" id="jum_tot" type="text" >
				</div>	
			</div>
			
			<br></br>
		   </table>
            <div class="form-group col-lg-12" >
               <input type="submit" class="btn btn-info" value="simpan">
			   <input type="button" class="btn btn-info" id="tambah" value="tambah" onclick="addbarang()">
               <input type="button" class="btn btn-danger" onClick='self.history.back()'  value="Keluar">
			</div>
		   	<table class="table table-bordered" id="tabletambah">
				<thead>
				  <tr id="dt_barang">
					<th width="75%">Nama Barang</th>
					<th width="10%">Jumlah</th>
					<th width="10%">Satuan</th>
					<th width="5%">Hapus</th>
				  </tr>
				</thead>
				<tbody>
					<tr id="dat"></tr>
				</tbody>
			  </table>	
		</form>
	</div>
</div>
<?php
}

function doEdit(){
    $aksi = $_GET[act]; 
?>
	<div class="tabelku col-md-11">
	<div class="box-body">
    
		<form action="mod\transaksi\aksi\tr_keluar.php" method="post" id="brg_keluar1" enctype="multipart/form-data" >
		 <?php
				$thn_skr = date('d-m-Y');
				$date	= explode('-',$thn_skr);
				$tgl	= $date[0];
				$bln	= $date[1];
				$thn	= $date[2];
				$th		= substr($thn , 2 ,2);
				$no_max=mysql_query("SELECT ifnull(max(no),0)+1 AS reg  FROM tr_brg_keluar");
	            $n=mysql_fetch_array($no_max);   
                
				$no_tr= "BM-"."$tgl$bln$th"."00".$n[reg];
				$edit=mysql_query("SELECT a.id as no_tr,a.tgl_keluar,b.*,d.nm_barang FROM tr_brg_keluar a
								   INNER JOIN td_brg_keluar b ON a.id=b.id
								   LEFT JOIN satuan c ON b.kd_barang=c.id
								   LEFT JOIN barang d ON c.kd_barang=d.id
								   WHERE  a.id='$_GET[id]'");
	            $d=mysql_fetch_array($edit);   
           	      
            ?>       
        <input type="hidden" name="id" id="id" value="<?php echo"$_GET[id]";?>" />
        <input type="hidden" name="aksi" id="aksi" value="<?php echo"$aksi";?>" />
          <table>	
			<div class="form-group">
                <div class="col-md-12">
					<label style="font-size:24px;">Edit Barang Keluar</label> 
				</div>
			</div>	
			<br><br><br>
			<div class="form-group">
				<div class="col-md-1">
					<label>Tanggal</label> 
				</div>
				<div class="col-md-4">		
					<div class='input-group date' id='tgl' name='tgl' >
                        <input type='text' class="form-control" id="tgl" name="tgl" value="<?php echo"$d[tgl_keluar]"?>"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<label>No Transaksi</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" placeholder="Nomor Transaksi" name="kd_tr_keluar" id="kd_tr_keluar" type="text" value="<?php echo"$d[no_tr]"?>" readonly="">
				</div>	
			</div>
			<br><br>
			<div class="form-group">
				<div class="col-md-1">
					<label>Barang</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" placeholder="Nama Barang" name="nm_barang[]" id="nm_barang" type="text" readonly="">
					<input class="form-control" name="kd_barang[]" id="kd_barang" type="hidden" >
				</div>
				<div class="col-md-1">
					<input class="btn btn-info" type="button" value="cari" id="cari" onclick="tombol2()"> 
				</div>
			</div>
			<br><p></br>
			<div class="form-group">
				
				<div class="col-md-1">
					<label>Satuan</label> 
				</div> 
				<div class="col-md-3">
					<input class="form-control" placeholder="Satuan Barang" name="kd_satuan[]" id="kd_satuan" type="text" readonly="">
				   <input class="form-control" name="satuan[]" id="satuan" type="hidden" >
				   <!--	<select class="form-control2" placeholder="Satuan Barang" name="kd_satuan[]" id="kd_satuan" type="text" value=""></select> -->
				</div>
				<div class="col-md-1">
					<input class="btn btn-info" type="button" value="cari" id="cari" onclick="tombol3()"> 
				</div>
			</div>
			<br><p></br>
			<div class="form-group">
				<div class="col-md-1">
					<label>Jumlah</label> 
				</div>
				<div class="col-md-3">
					<input class="form-control" placeholder="Jumlah Barang" name="jumlah[]" id="jumlah" type="text" >
				</div>
			</div>
			<br></br>
		   </table>	
            <div class="form-group" >
               <input type="submit" class="btn btn-info" value="simpan">
			   <input type="button" class="btn btn-info" value="tambah" onclick="addbarang1()">
               <input type="button" class="btn btn-danger" onClick='self.history.back()'  value="Keluar">
			</div>  
		   	<table class="table table-bordered">
				<thead>
				  <tr id="dt_barang">
					<th width="75%">Nama Barang</th>
					<th width="10%">Jumlah</th>
					<th width="10%">Satuan</th>
					<th width="5%">Hapus</th>
				  </tr>
				</thead>
				<tbody>
					<?php  
						$no=1;
						while($row = mysql_fetch_array($edit))
						{
					?>
					<tr id="dat">
						<td>
							<input class="form-control" type="text" name="updatenm_barang[]" readonly="readonly" id="nm_barang<?php echo"$no"; ?>" value="<?php echo"$row[nm_barang]"; ?>">
						</td>
						<td>
							<input class="form-control" type="text" name="updatejumlah[]"  id="jumlah<?php echo"$no"; ?>" value="<?php echo"$row[jumlah]"; ?>">
						</td>
						<td>
							<input class="form-control" type="text" name="updatekd_satuan[]" readonly="readonly" id="kd_satuan<?php echo"$no"; ?>" value="<?php echo"$row[kd_satuan]"; ?>">
						</td>
						
						<td>
							<input type="button" class="btn btn-info" value="hapus"  onClick="hapus2('<?php echo"$no"; ?>')">
						</td>
					</tr>
					<?php 
					$no++;
						}?>
				</tbody>
			  </table>	
		</form>
	</div>
</div>
<?php
}
/////// akhir function tambah ////////
?>
<!--

						<td>
							<input class="form-control" type="text" name="updatekd_satuan[]" id="kd_satuan<?php echo"$x"; ?>" value="<?php echo"$dt[kd_satuan]"; ?>">
						</td>
						<td>
							<input class="form-control" type="text" name="updatejumlah[]" readonly="readonly" id="jumlah<?php echo"$x"; ?>" value="<?php echo"$dt[jumlah]"; ?>">
						</td>
						<td>
							<input type="button" class="btn btn-info" value="hapus"  onClick="hapus('<?php echo"$x"; ?>')">
						</td>
-->

<?php
/////// akhir function edit //////// 
switch($_GET['act']){
    default:
        doBrowse();
     break;
	case "addbrg_keluar":
        doAdd();
     break;
	 case "view_brgkeluar":
        doView();
     break;
	case "editbrg_keluar":
        doEdit();
     break;

break;
}
?>