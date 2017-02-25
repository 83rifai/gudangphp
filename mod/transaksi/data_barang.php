<html>
<head>
<meta charset="utf-8">
<title>INVENTORY</title>
<link rel="stylesheet" href="../../css/media.css" type="text/css">
<link rel="stylesheet" href="../../awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../../css/datatables/dataTables.bootstrap.css" type="text/css">
 <link type="text/css" rel="stylesheet" href="../../js/plugin/calender/themes/ui-lightness/ui.all.css" />
<link rel="stylesheet" href="../../js/plugin/calender/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../../js/plugin/calender/bootstrap-datetimepicker.min.css" type="text/css">
<script src="../../js/jQuery.js"></script>
<script src="../../js/plugin/calender/moment.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<script src="../../js/main.js" type="text/javascript"></script>
<script src="../../js/plugin/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../../js/plugin/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script src="../../js/plugin/calender/bootstrap.min.js"></script>
<script src="../../js/plugin/calender/bootstrap-datetimepicker.min.js"></script>


</head>
<body class="skin-blue fixed">


<section class="content">
<div class="row">
<div class="col-md-12">

<link href="../../css/media.css" rel="stylesheet" type="text/css">
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">

<!--
<script type="text/javascript">	
$(document).ready(function(){
 $("#brg_masuk1").submit(function(){
		
		var aa		    = document.getElementById("nisn").value;
		var nm_kelas	= document.getElementById("nm_kelas").value;
		var nama		= document.getElementById("nama").value;
		var tgl_lahir	= document.getElementById("tgl_lahir").value;
		
		
		if(aa == ''){
			alert("NIP Tidak Boleh Kosong");
			return false;
		}else if(nm_kelas == ''){
            alert("Kelas Tidak Boleh Kosong");
			return false; 
		}else if(nama == ''){
            alert("Nama Tidak Boleh Kosong");
			return false; 
		}else if(tgl_lahir == ''){
			alert("Tanggal lahir Tidak Boleh Kosong");
			return false; 
		}
        
    });

});

$(function () {
    $('#tgl_lahir1').datetimepicker({
        format: 'YYYY-MM-DD',
    });

});

</script>
    -->
<script>	
	$(function () {
    $('#tgl').datetimepicker({
        format: 'DD-MM-YYYY',
    });

});
/*
function goPilihJpnEksekusi(s,status){
    	if (s != null) {
				if(status==""){
					var a = s.split("#");
                    $("#oleh_eksekusi",window.opener.document).val(a[3]+"/"+a[2]);
                    $("#idjpneksekusi",window.opener.document).val(a[0]);
				}
				else if(status=="edit"){ //add nana
					var a = s.split("#");
                    $("#oleh",window.opener.document).val(a[3]+"/"+a[2]);
                    $("#idjpneksekusi_edit",window.opener.document).val(a[0]);
				}
			}
			window.close();
}
*/
function Pilihbrg(s){
  var a = s.split("#");
 // alert(s);
  $("#id_satuan",window.opener.document).val(a[2]);
  $("#nm_barang",window.opener.document).val(a[1]);
  $("#kd_barang",window.opener.document).val(a[0]);
  window.close();
}

</script>	
<?php include"../../config/koneksi.php"; ?>
 <div class="tabelku">
    <div class="content-header">
		<h2>Data Barang</h2>
	</div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
					   <th>Nama Barang</th>
					   <th>Merk Barang</th>
					   <th>Warna Barang</th>
					   <th>Satuan</th>
                       <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
               
               <?php
			  $query=mysql_query("SELECT a.id,a.nm_jenis,a.nm_warna,a.nm_merk,b.*,
								CONCAT('Besar : ' , d.nama , CONCAT(' ( ' , d.jumlah , ' ) ')) AS besar,
								CONCAT('Sedang : ' , e.nama , CONCAT(' ( ' , e.jumlah , ' ) ')) AS sedang,
								CONCAT('Kecil : ' , f.nama , CONCAT(' ( ' , f.jumlah , ' ) ')) AS kecil
								FROM barang a 
								INNER JOIN satuan b ON a.id_satuan=b.id_satuan 
								INNER JOIN besar d ON b.st_besar=d.id 
								INNER JOIN sedang e ON b.st_sedang=e.id 
								INNER JOIN kecil f ON b.st_kecil=f.id")or die("gagal".mysql_error());
			  while($r=mysql_fetch_array($query)){
			   $no++;
			   $id = $r[id]."#".$r[nm_jenis]."#".$r[id_satuan];
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
                       <td width="25%"><?php echo"$r[nm_jenis]";?></td>
					   <td width="20%"><?php echo"$r[nm_merk]";?></td>
					   <td width="20%"><?php echo"$r[nm_warna]";?></td>
                       <td width="20%"><?php echo"$r[besar]";?><br> <?php echo"$r[sedang]";?> <br><?php echo"$r[kecil]";?></td>
					   <td width="10%"> 
						<input type="button" class="btn btn-info" value="pilih" onClick="Pilihbrg('<?php echo $id ?>')">
					   </td>
                    </tr>
                    </tr>
               <?php
			   }
	
	?>
             </tbody>
        </table>
    </div>
    
    
	
<script type="text/javascript">

            $(function() {
                $("#example1").dataTable();
				$("#baca").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
				
            });
         
</script>

</div>
</div>
</section>

</body>
</html>
