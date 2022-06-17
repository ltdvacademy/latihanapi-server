<?php

// membutuhkan pemanggilan akses koneksi (mysql)
include("koneksi.php");

// jika id tidak ada / null akan kembali ke index.php
if(!isset($_GET['id'])){
    header('Location: index.php');
}

//ambil id dari query
$id = mysqli_real_escape_string($db,$_GET['id']);

//buat query
$sql = "SELECT * FROM dataku WHERE id=$id";
$query = mysqli_query($db, $sql);
$editdata = mysqli_fetch_assoc($query);

// cek jika edit tidak ditemukan
if(mysqli_num_rows($query) < 1){
    die("Data tidak ditemukan");
}

?>

<!doctype html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Update/Rubah Data</title>
  </head>
  <body>
            <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" style="background-color: #212529;">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="color: white;">LATIHAN API - WEB COEDOTZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="d-flex">
      <a class="nav-link" href="index.php" style="color: white;">Kembali</a>
    </form>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container">
        <h2 class="alert alert-primary text-center mt-5">Form Update/Rubah Data</h2>
        <form action="updatedata.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $editdata['id'] ?>" required>
              </div>

              <br>

            <div class="row">
              <label for="basic-url" class="form-label">Gambar</label>
              <div class="form-group">
                <img src="img/<?php echo $editdata['gambar'] ?>" width="150px" height="120px" /></br>
								<br><input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
								<br><input name="gambar" id="gambar" type="file" class="form-control" disabled="disabled">
							</div>

              <div class="form-group">
                <br><label">Judul</label>
                  <input type="text" name="judul" class="form-control" value="<?php echo $editdata['judul'] ?>" required>
              </div>

              <div class="form-group">
              <br><label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="4" required><?php echo $editdata['deskripsi'] ?></textarea>
              </div>

              <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>

            </div>
        </div>
        </form>
        <script>
            $('#ubah_foto').click(function(e) {
                if($(this).prop('checked') == false)$('#gambar').attr("disabled","disabled");
                else $('#gambar').removeAttr("disabled");
            });
        </script>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>  