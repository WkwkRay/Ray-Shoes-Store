<?php
$sqlp = mysqli_query($kon, "select * from produk where idproduk='$_GET[id]'");
$rp = mysqli_fetch_array($sqlp);
?>
<a href="<?php echo "?p=produk"; ?>"><button type="button" class='btn btn-add'>PRODUK</button></a> &raquo; 
<button type="button" class='btn btn-dis'>Ubah Produk</button>
<div class="card">
<div class="kepalacard">Ubah Produk</div>
<div class="isicard" style="text-align:center;">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="idproduk" type="hidden" id="idproduk" value="<?php echo "$rp[idproduk]"; ?>">
	<?php
	$sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
	$rk = mysqli_fetch_array($sqlk);
	?>	
    <input name="namakat" type="text" disabled id="namakat" value="<?php echo "$rk[namakat]"; ?>" placeholder="Nama Kategori">
    <input name="nama" type="text" id="nama" value="<?php echo "$rp[nama]"; ?>" placeholder="Nama Produk">
    <input name="harga" type="text" id="harga" value="<?php echo "$rp[harga]"; ?>" placeholder="Harga Produk (dalam Rp.)">
    <input name="stok" type="text" id="stok" value="<?php echo "$rp[stok]"; ?>" placeholder="Stok Produk">
    <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk"><?php echo "$rp[spesifikasi]"; ?></textarea>
    <textarea name="detail" id="detail" placeholder="Detail Produk"><?php echo "$rp[detail]"; ?></textarea>
    <input name="diskon" type="text" id="diskon" value="<?php echo "$rp[diskon]"; ?>" placeholder="Diskon Produk (dalam %)">
    <input name="berat" type="text" id="berat" value="<?php echo "$rp[berat]"; ?>" placeholder="Berat Produk (dalam Kg)">
    <textarea name="isikotak" id="isikotak" placeholder="Isi Dalam Kotak Produk"><?php echo "$rp[isikotak]"; ?></textarea>
    <p><img src="<?php echo "../fotoproduk/$rp[foto1]"; ?>" height="200px" />
	<input name="foto1" type="file" id="foto1" />
	<p><img src="<?php echo "../fotoproduk/$rp[foto2]"; ?>" height="200px" />
    <input name="foto2" type="file" id="foto2" />
    <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
  </form>

<?php
if($_POST["simpan"]){
  if(!empty($_POST["nama"]) and !empty($_POST["harga"]) and !empty($_POST["stok"]) and !empty($_POST["spesifikasi"]) and !empty($_POST["detail"]) and !empty($_POST["berat"]) and !empty($_POST["isikotak"])){
    $nmfoto1  = $_FILES["foto1"]["name"];
    $lokfoto1 = $_FILES["foto1"]["tmp_name"];
    if(!empty($lokfoto1)){	
		move_uploaded_file($lokfoto1, "../fotoproduk/$nmfoto1");
		$foto1 = ", foto1='$nmfoto1'";
    }else{
    	$foto1 = "";
  	}
   
    $nmfoto2  = $_FILES["foto2"]["name"];
    $lokfoto2 = $_FILES["foto2"]["tmp_name"];
    if(!empty($lokfoto2)){	
		move_uploaded_file($lokfoto2, "../fotoproduk/$nmfoto2");
		$foto2 = ", foto2='$nmfoto2'";
    }else{
    	$foto2 = "";
    }
	
	$sqlp = mysqli_query($kon, "update produk set nama='$_POST[nama]', harga='$_POST[harga]', stok='$_POST[stok]', spesifikasi='$_POST[spesifikasi]', detail='$_POST[detail]', diskon='$_POST[diskon]', berat='$_POST[berat]', isikotak='$_POST[isikotak]' $foto1 $foto2 where idproduk='$_POST[idproduk]'");
	  
	if($sqlp){
	  echo "Perubahan Produk Berhasil Disimpan";
	}else{
  	  echo "Gagal Menyimpan";
	}
	  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
  }else{
    echo "Data harus diisi dengan lengkap !!!";
  }
}
?>
</div>
</div>