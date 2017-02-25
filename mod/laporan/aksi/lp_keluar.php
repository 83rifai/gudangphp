<?php
include"../../../config/koneksi.php";

$tgl1			=$_POST['tgl1'];
$tgl2			=$_POST['tgl2'];
/*
echo "<script type=\"text/javascript\">
			 window.location = \"../cetak/lp_masuk.php?tgl1=$tgl1&tgl2=$tgl2 \";
			</script>";
*/			
echo" <script type=\"text/javascript\">
			window.open('../cetak/lp_keluar.php?tgl1=$tgl1&tgl2=$tgl2' ,'_blank');
		</script>";

echo"<script type=\"text/javascript\">
			window.location=\"../../../media.php?mod=lp_brkeluar\";
		</script>
		";

?>