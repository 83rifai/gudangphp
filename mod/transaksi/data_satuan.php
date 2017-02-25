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

<script>	
	$(function () {
    $('#tgl').datetimepicker({
        format: 'DD-MM-YYYY',
    });

});

function Pilihbrg(s){
  var a = s.split("#");
 //alert(s);
 
  $("#satuan",window.opener.document).val(a[0]);
  $("#kd_satuan",window.opener.document).val(a[1]);
  
  window.close();
}

</script>	
<?php include"../../config/koneksi.php"; ?>
<?php $kode = $_GET[kd]; ?>
 <div class="tabelku">
    <div class="content-header">
		<h2>Data Barang</h2>
	</div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
                       <th>Kode Satuan</th>
					   <th>Satuan</th>
                       <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
               
               <?php
			    $query=mysql_query("SELECT a.*, b.nama AS satuan,
									b.id FROM satuan a INNER JOIN besar b ON a.st_besar=b.id WHERE a.id_satuan='$kode'
									UNION 
									SELECT a.*,b.nama AS satuan,
									b.id FROM satuan a INNER JOIN sedang b ON a.st_sedang=b.id WHERE a.id_satuan='$kode'
									UNION 
									SELECT a.*, b.nama  AS satuan,
									b.id FROM satuan a INNER JOIN kecil b ON a.st_kecil=b.id where a.id_satuan='$kode'")or die("gagal".mysql_error());
			  while($r=mysql_fetch_array($query)){
			   $no++;
			   $id = $r[id]."#".$r[satuan];
			   ?>
                    <tr>
                       <td width="5%"><?php echo"$no";?></td>
					   <td width="20%"><?php echo"$r[id]";?></td>
					   <td width="70%"><?php echo"$r[satuan]";?></td>
					   <td width="5%"> 
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
