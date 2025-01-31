<?php 
  session_start();
  include "koneksi.php"; 
  $sqlag = mysqli_query($kon, "select * from anggota where email='$_SESSION[userag]' and password='$_SESSION[passag]'");
  $rag = mysqli_fetch_array($sqlag);
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" type="text/css" href="style.css" />
<title>Ray Store</title>

<div class="container1">
  <div class="grid">
    <div class="dh12">
      Selamat Datang Di Ray Shoes Store
	</div>
  </div>
</div>
<?php
	include "menu.php";
?>
<div class="container3">
  <div class="grid">
    <div class="dh12">
  	  <form name="form1" method="post" action="<?php echo "?p=produkterbaru";?>">
        <input type="text" name="cari" placeholder="Ketik Nama Produk Yang Akan Dicari">
        <input type="submit" name="Submit" value="Cari">
      </form>
	</div>
  </div>
</div>

<?php
  if($_GET["p"]=="produkdetail"){
  	include "produkdetail.php";
  }else if($_GET["p"]=="produkterbaru"){	
    include "produkterbaru.php";
  }else if($_GET["p"]=="register"){	
    include "register.php";
  }else if($_GET["p"]=="login"){	
    include "login.php";
  }else if($_GET["p"]=="logout"){	
    include "logout.php";
  }else if($_GET["p"]=="keranjang"){	
    include "keranjang.php";
  }else if($_GET["p"]=="keranjangedit"){	
    include "keranjangedit.php";
  }else if($_GET["p"]=="keranjangdel"){	
    include "keranjangdel.php";
  }else if($_GET["p"]=="keranjangbelanja"){	
    include "keranjangbelanja.php";
  }else if($_GET["p"]=="selesaibelanja"){	
    include "selesaibelanja.php";
  }else if($_GET["p"]=="selesaibelanjaaksi"){	
    include "selesaibelanjaaksi.php";
  }else if($_GET["p"]=="riwayat"){	
    include "riwayat.php";
  }else if($_GET["p"]=="konfirmasi"){	
    include "konfirmasi.php";
  }else if($_GET["p"]=="home"){
    include "produkterbaru.php";
  }else{		
	include "home.php";
	include "produkterbaru.php";	
  }
  include "kaki.php";
?>

