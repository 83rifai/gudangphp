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
		$query=mysql_query("select * from trans_produk_keluar_header")or die("gagal".mysql_error());
		
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
			  
			  while($results = mysql_fetch_assoc($query)){
			   $no++;
			   ?>
                    <tr>
                       <td width="5%"><?php echo $no;?></td>
					   <td width="40%"><?php echo $results['nomor_transaksi'];?></td>
					   <td width="30%"><?php echo $results['tanggal'];?></td>
                       <td width="25%">
						   <a href="?mod=brg_keluar&act=view_brgkeluar&id=<?php echo $results['id'];?>" class="btn btn-info"><i class="fa fa-eye"></i></a> |
						   <!--<a href="?mod=brg_keluar&act=editbrg_keluar&id=<?php echo $results['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | -->
						   <?php if($lvl == "admin") {?> 
						   <a href="mod\transaksi\aksi\hp_keluar.php?id=<?php echo $results['id'];?>" class="btn btn-danger"onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a>|
						   <?php } ?>
						   <a href="mod\transaksi\aksi\lp_srt_keluar.php?id=<?php echo $results['id'];?>" class="btn btn-info"><i class="fa fa-print"></i></a> 
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

function doAdd(){ // strat function do add

$aksi = $_GET['act']; 
$thn_skr = date('d-m-Y');
$date	= explode('-',$thn_skr);
$tgl	= $date[0];
$bln	= $date[1];
$thn	= $date[2];
$th		= substr($thn , 2 ,2);
$no_max = mysql_query("SELECT ifnull(max(no),0)+1 AS reg  FROM tr_brg_keluar");
$n = mysql_fetch_array($no_max);   
$no_tr = "BL-"."$tgl$bln$th"."00".$n[reg];


?>

<form method="post" id="form-transaksi" action="javascript:void(0);">
	<div class="col-md-11">
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<legend style="background-color: #c0c0c0; font-size: 11pt; border: none; margin: 5px; padding: 5px; width: auto; ">Transaksi Barang Keluar</legend>
		<div class="col-md-6">
			<label>Nomor Transaksi</label>
			<input class="form-control" placeholder="Nomor Transaksi" name="nomor_transaksi" id="kd_tr_masuk" type="text" value="<?php echo $no_tr;?>" readonly="">
		</div>
		<div class="col-md-6">
			<label>Tanggal</label>
			<div class='input-group date' id='tgl' name='tgl' >
                        <input type='text' class="form-control" id="tgl" value="<?=date('Y-m-d')?>" name="tgl" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
		</div>
		<div class="col-md-11"><br/></div>
		<div class="col-md-4">
			<label>Pelanggan</label>
			<select name="master_pelanggan_id" class="form-control">
				<option value="">-Pilih Pelanggan-</option>
				<?php
				$pelanggan = mysql_query("SELECT * FROM master_pelanggan");
				while ($pelanggans = mysql_fetch_assoc($pelanggan)) {
					?>
					<option value="<?=$pelanggans['id']?>"><?=$pelanggans['nama']?></option>
					<?php
				}
				?>
			</select>
		</div>
		<div class="col-md-4">
			<label>Purchase Order</label>
			<input class="form-control" placeholder="Purchase Order" name="purchase_order"  type="text">
		</div>
		<div class="col-md-4">
			<label>Delivery Order</label>
			<input class="form-control" placeholder="Delivery Order" name="delivery_order"  type="text">
		</div>
		<div class="col-md-12"><hr/></div>
		<div class="table-resposive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Nama Barang</th>
						<th>Satuan</th>
						<th>Jumlah</th>
						<th></th>
					</tr>
					<tr>
						<td>#</td>
						<td>
							<select name="barang" class="form-control">
								<option value="">-Pilih Nama Barang-</option>
								<?php
								$barang = mysql_query("SELECT * FROM master_produk");
								while ($barangs = mysql_fetch_assoc($barang)) {
									?>
									<option value="<?=$barangs['id']?>"><?=$barangs['nama']?></option>
									<?php
								}
								?>
							</select>
						</td>
						<td>
							<select name="satuan" class="form-control">
								<option>-Pilih Nama Satuan-</option>
								<?=conv(0);?>
							</select>
						</td>
						<td width="10%"><input type="text" name="jumlah" class="form-control" placeholder="Jumlah"></td>
						<td width="10%">
							<button id="BTN-TAMBAH" type="button" class="btn btn-md btn-success">Tambah</button>
						</td>
					</tr>
				</thead>
				<tbody id="Details">
					
				</tbody>
			</table>
		</div>
		</fieldset>
		<div class="col-md-12"><br/></div>
		<fieldset style="border: 1px solid #c0c0c0; padding: 15px;">
			<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" >
		</fieldset>
	</div>
</form>


<script type="text/javascript">
	$(document).ready(function(){
		$('#BTN-TAMBAH').click(function(){
			var details = "";
			var long = parseInt($('#Details').find('tr').length);
			var index = long+1;
			var int = 0;
			var indexTR = '';
			$('#Details').find('tr').each(function(){
				int++;
				if(long==int) {
					var IDtr = $(this).attr('class').split('_');
					indexTR = parseInt(IDtr[1])+1;
				}
			})

			if(indexTR==''){
				indexTR = 1;
			}

			details = "<tr class='list_"+indexTR+"' >";
				details += "<td>"+indexTR+"</td>";
				details += "<td>"+$('select[name=barang] :selected').text()+"</td>";
				details += "<input type='hidden' name='data["+indexTR+"][master_produk_id]' value='"+$('select[name=barang] :selected').val()+"' >";
				details += "<td>"+$('select[name=satuan] :selected').text()+"</td>";
				details += "<input type='hidden' name='data["+indexTR+"][konversi_satuan_id]' value='"+$('select[name=barang] :selected').val()+"' >";
				details += "<td>"+$('input[name=jumlah]').val()+"</td>";
				details += "<input type='hidden' name='data["+indexTR+"][jumlah]' value='"+$('input[name=jumlah]').val()+"' >";
				details += "<td></td>";
			details += "</tr>";

			$('#Details').append(details);
		}); // end dom add append tr

		$('#form-transaksi').submit(function(){
			$.post('controllers/trans_produk_keluar.php?act=add',$('#form-transaksi').serialize(),function(data){
			alert(data);
			// window.location.href = "media.php?mod=brg_masuk";
		});

			return false;
		}); // end
	}); // end


</script>

<?php

} // end function do add

function conv($parent){
	$query =mysql_query("select id,getSatuan(satuan_terbesar) as satuan_terbesar, getSatuan(satuan_terkecil) as satuan_terkecil, jumlah from konversi_satuan where parent = ".$parent." ");
	// $result = mysql_fetch_assoc($query);
	$results = array();
	$dash = "";
	while($result = mysql_fetch_assoc($query)){
		if($result['satuan_terbesar'] != "0"){
			$dash = $result['satuan_terbesar']." - ";
		}
		$results = "<option>".$dash."".$result['satuan_terkecil']."</option>";
		echo $results;
		conv($result['id']);
		
		// conv($result['id']);
	}

}

// conv(0);
?>

		</td>
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