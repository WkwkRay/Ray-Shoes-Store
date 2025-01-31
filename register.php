<div class="card">
<div class="kepalacard">Registrasi Anggota</div>
<div class="isicard" style="text-align:center;">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      <input type="text" name="email" id="email" placeholder="Email Anggota" />
      <input type="text" name="password" id="password" placeholder="Password Login" />
      <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" /><p>
    <input name="jk" type="radio" value="L" />Laki-Laki
    <input name="jk" type="radio" value="P" />Perampuan
   <br><input type="date" name="tgllahir" id="tgllahir" placeholder="Tanggal Lahir" />
      <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder="Alamat Lengkap"></textarea>
      <input type="text" name="nohp" id="nohp" placeholder="No. Handphone" />
      <input type="file" name="foto" />
      <input type="submit" name="register" id="register" value="DAFTAR SEBAGAI ANGGOTA" />
</form>
<?php
if($_POST["register"]){
  $nmfoto  = $_FILES["foto"]["name"];
  $lokfoto = $_FILES["foto"]["tmp_name"];
  if(!empty($lokfoto)){
    move_uploaded_file($lokfoto, "foto/$nmfoto");
	$foto = ", '$nmfoto'";
  }else{
    $foto = "";
  }
  
  $sqlag = mysqli_query($kon, "insert into anggota (email, password, nama, jk, tgllahir, alamat, nohp, foto, tgldaftar) values ('$_POST[email]', '$_POST[password]', '$_POST[nama]', '$_POST[jk]', '$_POST[tgllahir]', '$_POST[alamat]', '$_POST[nohp]' $foto, NOW())");
  
  if($sqlag){
  	echo "Registrasi Berhasil";
  }else{
    echo "Registrasi Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
</div>
</div>
