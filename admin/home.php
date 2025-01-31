<div class="grid">
  <!-- Untuk Kategori -->
  <?php
  $sqlk = mysqli_query($kon, "select * from kategori");
  $rowk = mysqli_num_rows($sqlk);
  $sqlkl = mysqli_query($kon, "select * from kategori order by tglkat desc limit 2");
  ?>
  <div class="dh3">
    <div id="boxval">
	  <p>Kategori</p>
	  <h3><?php echo "$rowk";?></h3>
	</div>
	<div class="card">
		<div class="kepalacard">Kategori Terbaru</div>
		<div class="isicard">
		<?php
		if($rowk == 0){
		  echo "Belum ada kategori ditambahkan";
		}else{
			echo "<hr>";
			while($rkl = mysqli_fetch_array($sqlkl)){
			  echo "<big>$rkl[namakat]</big>
			  <br>$rkl[ketkat]
			  <hr>";
			}
		}
		?>
		</div>
		<div class="kakicard">
		<a href="<?php echo "?p=kategori"; ?>"><button type="button" class="btn btn-add">Lihat Semua Kategori &raquo;</button></a>
		</div>
	</div>
	<br>
  </div>
    
  <!-- Untuk Produk -->
  <?php
  $sqlp = mysqli_query($kon, "select * from produk");
  $rowp = mysqli_num_rows($sqlp);
  $sqlpl = mysqli_query($kon, "select * from produk order by tglproduk desc limit 1");
  ?>
  <div class="dh3">
    <div id="boxval">
	  <p>Produk</p>
	  <h3><?php echo "$rowp";?></h3>
	</div>
	<div class="card">
		<div class="kepalacard">Produk Terbaru</div>
		<div class="isicard" style="text-align:center;">
		<?php
		if($rowp == 0){
		  echo "<div align='center'>Belum ada produk yang ditambahkan</div>
		  <hr>";
		}else{
			while($rpl = mysqli_fetch_array($sqlpl)){
			  $hrg = number_format($rpl['harga']);
         	  $nm = substr($rpl["nama"],0,30);
			  if($rpl['stok']>0){
				$stok = "<font color='#00CC00'>Stok Tersedia</font>";
			  }else{
				$stok = "<font color='#FF0000'>Stok Habis</font>";
	   		  }
			  if($rpl['diskon']>0){
				$disk = ($rpl['diskon'] * $rpl['harga']) / 100;
				$hrgbaru = $rpl['harga'] - $disk;
				$hrgbr = number_format($hrgbaru);
				$diskon = "<font color='#FF0000'> -$rpl[diskon]% </font>";
				$hrglama = "<font style='text-decoration:line-through'><small>IDR $hrg</small></font>";
			  }else{
				$hrgbr = "";
				$diskon = "";
				$hrglama = "<b>$hrg</b>";
			  }
			  echo "<br>";
  			  echo "<img src='../fotoproduk/$rpl[foto1]' height='60px'>
		  	  <img src='../fotoproduk/$rpl[foto2]' height='60px'>
			  <hr>
			  <b>$nm...</b>
			  <hr>
			  <b>IDR $hrgbr</b> $diskon $hrglama
			  <hr>
			  <b>$stok</b>
			  <hr>";
			}
		}
		?>
		</div>
		<div class="kakicard">
		<a href="<?php echo "?p=produk"; ?>"><button type="button" class="btn btn-add">Lihat Semua Produk &raquo;</button></a>
		</div>
	</div>
	<br>
  </div>
  
  <!-- Untuk Member -->
  <?php
  $sqla = mysqli_query($kon, "select * from anggota");
  $rowa = mysqli_num_rows($sqla);
  $sqlal = mysqli_query($kon, "select * from anggota order by tgldaftar desc limit 1");
  ?>
  <div class="dh3">
    <div id="boxval">
	  <p>Anggota</p>
	  <h3><?php echo "$rowa";?></h3>
	</div>
	<div class="card">
		<div class="kepalacard">Anggota Terbaru</div>
		<div class="isicard" style="text-align:center;">
		<?php
		if($rowa == 0){
		  echo "<hr>";
		  echo "Belum ada anggota yang terdaftar";
		  echo "<hr>";
		}else{
			while($ral = mysqli_fetch_array($sqlal)){
			  echo "<br>";
  			  echo "<img src='../foto/$ral[foto]' height='64px' style='border-radius:50%;'>
			  <hr>
			  <b>$ral[nama]</b>
			  <hr>
			  $ral[email]
			  <hr>
			  $ral[nohp]
			  <hr>";
			}
		}
		?>
		</div>
		<div class="kakicard">
		<a href="<?php echo "?p=anggota"; ?>"><button type="button" class="btn btn-add">Lihat Semua Anggota &raquo;</button></a>
		</div>
	</div>
	<br>
  </div>
  
  <!-- Untuk Transaksi -->
  <?php
  $sqlo = mysqli_query($kon, "select * from orders");
  $rowo = mysqli_num_rows($sqlo);
  $sqlol = mysqli_query($kon, "select * from orders where statusorder='Baru' order by tglorder desc limit 2");
  ?>
  <div class="dh3">
    <div id="boxval">
	  <p>Transaksi</p>
	  <h3><?php echo "$rowo";?></h3>
	</div>
	<div class="card">
		<div class="kepalacard">Transaksi Terbaru</div>
		<div class="isicard" align="center";>
		<hr>
		Status Order<br>
		<a href="<?php echo "?p=order&st=Baru"; ?>"><button type="button" class="btn btn-add">Baru</button></a>
		<a href="<?php echo "?p=order&st=Lunas"; ?>"><button type="button" class="btn btn-add">Lunas</button></a>
		<a href="<?php echo "?p=order&st=Dikirim"; ?>"><button type="button" class="btn btn-add">Dikirim</button></a>
		<a href="<?php echo "?p=order&st=Diterima"; ?>"><button type="button" class="btn btn-add">Diterima</button></a>
		<?php
		if($rowo == 0){
		  echo "Belum ada transaksi yang masuk";
		}else{
			echo "<hr>";
			while($rol = mysqli_fetch_array($sqlol)){
			  echo "<big>#$rol[noorder]</big> - $rol[statusorder]
			  <br><small><i>pada $rol[tglorder] WIB</i></small>
			  <hr>";
			}
		}
		?>
		</div>
		<div class="kakicard">
		<a href="<?php echo "?p=order&st=Semua"; ?>"><button type="button" class="btn btn-add">Lihat Semua Transaksi &raquo;</button></a>
		</div>
	</div>
	<br>
  </div>
</div>