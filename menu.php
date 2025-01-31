<div class="container2">
  <div class="grid">
    <div class="topnav" id="myTopnav">
      <div class="dh6 left-menu">
        <a href="javascript:void(0);" class="icon" style="font-size:14px;" onClick="myFunction()">&#9776;</a>
        <?php
        if ($_GET["p"] == "beranda") {
          $pilih = " class='pilih'";
        } else {
          $pilih = "";
        }
        echo "<a href='?p=beranda' $pilih>Beranda</a>";

        $sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
        while ($rk = mysqli_fetch_array($sqlk)) {
          if ($_GET["idk"] == $rk["idkat"]) {
            $pil = " class='pilih'";
          } else {
            $pil = "";
          }
          echo "<a href='?p=home&idk=$rk[idkat]' $pil>$rk[namakat]</a>";
        }
        ?>
      </div>

      <div class="dh6 right-menu">
      <?php
        if (!empty($_SESSION["userag"]) && !empty($_SESSION["passag"])) {
        echo "<a><b>$rag[nama]</b></a>";
        echo "<a href='?p=konfirmasi&idag=$rag[idanggota]'>Konfirmasi</a>";
        echo "<a href='?p=riwayat&idag=$rag[idanggota]'>Riwayat</a>";
        echo "<a href='?p=keranjangbelanja&idag=$rag[idanggota]' class='keranjang-icon'>
            <img src='foto/keranjang.png' alt='Keranjang' style='width: 24px; height: 24px; vertical-align: middle;' border='0'>
            </a>";
        echo "<a href='?p=logout'>Logout</a>";
        } else {
          echo "<a href='?p=register'>Register</a>";
          echo "<a href='?p=login'>Login</a>";
        }
        ?>
      </div>
    </div>

    <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
    </script>
  </div>
</div>

<style>
  .topnav {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .left-menu {
    display: flex;
    align-items: center;
  }

  .right-menu {
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }

  .topnav a {
    padding: 8px 16px;
    text-decoration: none;
  }

  .pilih {
    font-weight: bold;
  }
</style>