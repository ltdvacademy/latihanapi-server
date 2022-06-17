<?php

// membutuhkan pemanggilan akses koneksi (mysql)
// (DISI)

// menjalankan session
// (DISI)
 
// check apakah session email sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if( empty($_SESSION['uname']) ){
    header('Location: login.html');
}
?>

<?php

// tambah data
if(isset($_POST['tambah'])){
    $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
    $urlgambar = $_FILES['file']['name'];
    $x = explode('.', $urlgambar);
	$ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];

    // mengambil data
    $judul = mysqli_real_escape_string($db, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);

    //pengecekan gambar
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1222044070){			
            move_uploaded_file($file_tmp, 'img/'.$urlgambar);

            //buat query
            $sql = "INSERT INTO dataku (gambar, judul, deskripsi) VALUE ('$urlgambar', '$judul', '$deskripsi')";

            // eksekusi query
            $query = mysqli_query($db, $sql);

            // jika berhasil ditambahkan
            if($query){
                ?>
                <script type="text/javascript">alert('Data Berhasil Ditambahkan!'); document.location.href='index.php';</script>
                <?php

                // jika gagal ditambahkan
            }else{
                ?>
                <script type="text/javascript">alert('Data Gagal Ditambahkan!'); document.location.href='index.php';</script>
                <?php
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
}

?>