<div id="signin">
<fieldset>
<img src="foto/avatar.jpg" width="120px" />
<h3>ANGGOTA</h3>
<p>SILAHKAN LOGIN</p>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
    <input type="text" name="email" id="email" placeholder="Email" />
    <input type="password" name="password" id="password" placeholder="Password" />
    <input type="submit" name="login" id="login" value="LOGIN ANGGOTA" />
	<p>
	Belum terdaftar? <a href="<?php echo "?p=register";?>">Register</a> disini
</form>
<?php
if($_POST["login"]){
  $sqlag = mysqli_query($kon, "select * from anggota where email='$_POST[email]' and password='$_POST[password]'");
  $rag = mysqli_fetch_array($sqlag);
  $row = mysqli_num_rows($sqlag);
  if($row > 0){
    session_start();
	$_SESSION["userag"] = $rag["email"];
	$_SESSION["passag"] = $rag["password"];
	echo "Login Berhasil";
  }else{
    echo "Login Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
</fieldset>
</div>

