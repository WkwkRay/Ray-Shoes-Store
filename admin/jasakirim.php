<button type="button" class='btn btn-dis'>JASA PENGIRIMAN</button> &raquo; 
<a href="<?php echo "?p=jasakirimadd"; ?>"><button type="button" class='btn btn-add'>Tambah Jasa Pengiriman</button></a>
<br>
<?php  
$batas =  4;
$halaman = $_GET['pg'];
if(empty($halaman)){
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}
$sqlj = mysqli_query($kon, "select * from jasakirim order by nama asc limit $posisi, $batas");
  while($rj = mysqli_fetch_array($sqlj)){  
  	$tarif = number_format($rj["tarif"]);  
  	echo "<div class='dh3'>";
	echo "<div class='card'>";
	echo "<div class='isicard' style='text-align:center;'><br>";
  	echo "<img src='../logojasa/$rj[logo]' border='0' width='200px' height='120px'>
			<hr>
			<big>$rj[nama]</big>
			<hr>
			<b>IDR $tarif / Kg</b>
			<hr>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "<a href='?p=jasakirimedit&idj=$rj[idjasa]'><button type='button' class='btn btn-add'>Ubah Jasa Kirim</button></a>
			<a href='?p=jasakirimdel&idj=$rj[idjasa]'><button type='button' class='btn btn-add'>Hapus Jasa Kirim</button></a>";
	echo "</div>";
	echo "</div><br>";
	echo "</div>";
  }

echo "<div class='dh12' align='right'>";

echo "Halaman ";
		
$sqlhal = mysqli_query($kon, "select * from jasakirim");
$jmldata = mysqli_num_rows($sqlhal);
$jmlhal = ceil($jmldata/$batas);

for($i=1;$i<=$jmlhal;$i++){
  if ($i == $halaman){
	echo "<span class='kotak'><b>$i</b></span> ";
  }
}

if($halaman > 1){
	$previous=$halaman-1;
	echo "<span class='kotak'><a href=?p=jasakirim&pg=$previous>&laquo; Prev</a></span> ";
}
else
{ 
	echo "<span class='kotak'>&laquo; Prev</span> ";
}

if($halaman < $jmlhal){
	$next=$halaman+1;
	echo "<span class='kotak'><a href=?p=jasakirim&pg=$next>Next &raquo;</a></span>";
}
else{ 
	echo "<span class='kotak'>Next &raquo;</span>";
}

echo " Total Jasa Pengiriman <span class='kotak'><b>$jmldata</b></span>";
echo "<p></div>";
echo "<p>&nbsp;</p>";
?>

