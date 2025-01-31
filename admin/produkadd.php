<a href="<?php echo "?p=produk"; ?>">
  <button type="button" class='btn btn-add'>PRODUK</button>
</a> &raquo;
<button type="button" class='btn btn-dis'>Tambah Produk</button>
<div class="card">
  <div class="kepalacard">Tambah Produk</div>
  <div class="isicard" style="display: flex; flex-direction: column; align-items: center;">
    <form name="form1" method="post" action="" enctype="multipart/form-data" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; max-width: 600px;">
      <?php
      $sqlk = mysqli_query($kon, "SELECT * FROM kategori ORDER BY namakat ASC");
      echo "<select name='idkat' style='grid-column: span 2;'>";
      echo "<option value=''>Kategori</option>";
      while ($rk = mysqli_fetch_array($sqlk)) {
        echo "<option value='$rk[idkat]'>$rk[namakat]</option>";
      }
      echo "</select>";
      ?>
      <input name="nama" type="text" id="nama" placeholder="Nama Produk">
      <input name="harga" type="text" id="harga" placeholder="Harga Produk (dalam Rp.)">
      <input name="stok" type="text" id="stok" placeholder="Stok Produk">
      <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk" style="grid-column: span 2;"></textarea>
      <textarea name="detail" id="detail" placeholder="Detail Produk" style="grid-column: span 2;"></textarea>
      <input name="diskon" type="text" id="diskon" placeholder="Diskon Produk (dalam %)">
      <input name="berat" type="text" id="berat" placeholder="Berat Produk (dalam Kg)">
      <textarea name="isikotak" id="isikotak" placeholder="Isi Dalam Kotak Produk" style="grid-column: span 2;"></textarea>
      <select name="ukuran" id="ukuran" style="grid-column: span 2;">
        <option value="">Pilih Ukuran</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
      </select>
      <input name="foto1" type="file" id="foto1" style="grid-column: span 2;" />
      <input name="foto2" type="file" id="foto2" style="grid-column: span 2;" />
      <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK" style="grid-column: span 2;">
    </form>

    <?php
    if (isset($_POST["simpan"])) {
      if (
        !empty($_POST["idkat"]) && !empty($_POST["nama"]) && !empty($_POST["harga"]) && !empty($_POST["stok"]) &&
        !empty($_POST["spesifikasi"]) && !empty($_POST["detail"]) && !empty($_POST["diskon"]) &&
        !empty($_POST["berat"]) && !empty($_POST["isikotak"]) && !empty($_POST["ukuran"])
      ) {
        $nmfoto1 = $_FILES["foto1"]["name"];
        $lokfoto1 = $_FILES["foto1"]["tmp_name"];
        if (!empty($lokfoto1)) {
          move_uploaded_file($lokfoto1, "../fotoproduk/$nmfoto1");
        }

        $nmfoto2 = $_FILES["foto2"]["name"];
        $lokfoto2 = $_FILES["foto2"]["tmp_name"];
        if (!empty($lokfoto2)) {
          move_uploaded_file($lokfoto2, "../fotoproduk/$nmfoto2");
        }

        $spek = nl2br(htmlspecialchars($_POST["spesifikasi"]));
        $detail = nl2br(htmlspecialchars($_POST["detail"]));
        $isi = nl2br(htmlspecialchars($_POST["isikotak"]));

        $sqlp = mysqli_query($kon, "INSERT INTO produk (idkat, idadmin, nama, harga, stok, spesifikasi, detail, diskon, berat, isikotak, ukuran, foto1, foto2, tglproduk) VALUES ('" .
          mysqli_real_escape_string($kon, $_POST["idkat"]) . "', '" .
          mysqli_real_escape_string($kon, $ra["idadmin"]) . "', '" .
          mysqli_real_escape_string($kon, $_POST["nama"]) . "', '" .
          mysqli_real_escape_string($kon, $_POST["harga"]) . "', '" .
          mysqli_real_escape_string($kon, $_POST["stok"]) . "', '" .
          $spek . "', '" .
          $detail . "', '" .
          mysqli_real_escape_string($kon, $_POST["diskon"]) . "', '" .
          mysqli_real_escape_string($kon, $_POST["berat"]) . "', '" .
          $isi . "', '" .
          mysqli_real_escape_string($kon, $_POST["ukuran"]) . "', '" .
          $nmfoto1 . "', '" .
          $nmfoto2 . "', NOW())");

        if ($sqlp) {
          echo "Produk Berhasil Disimpan";
        } else {
          echo "Gagal Menyimpan";
        }
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
      } else {
        echo "Data harus diisi dengan lengkap !!!";
      }
    }
    ?>
  </div>
</div>
