<?php
// membutuhkan pemanggilan akses koneksi (mysql)
// (DISI)
// fungsi untuk memulai session
// (DISI)
 
// variabel kosong untuk menyimpan pesan error
$form_error = '';
 
// cek apakah tombol sumit sudah di klik atau belum
if(isset($_POST['submit'])){
 
    // menyimpan data yang dikirim dari metode POST ke masing-masing variabel
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $password = mysqli_real_escape_string($db, $_POST['psw']);
 
    // validasi login benar atau salah
    if($username == 'NAMA' && $password == 'NIM'){
 
        // jika login benar maka email akan disimpan ke session kemudian akan di redirect ke halaman profil
        $_SESSION['uname'] = $username;
        header('Location: index.php');
    }else{
 
        // jika login salah maka variabel form_error diisi value seperti dibawah
        // nilai variabel ini akan ditampilkan di halaman login jika salah
        $message = "Username atau Password salah!";
        echo "<script type='text/javascript'>alert('$message'); document.location.href='login.html';</script>";
    }
}
 
?>