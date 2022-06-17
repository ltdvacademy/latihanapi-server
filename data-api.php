<?php
$dbhost = 'localhost';
$dbuser = 'root'; // disesuaikan usernamenya
$dbpass = ''; // disesuaikan passsnya
$dbname = ''; // masukin nama databasenya sesuai

// inisialisasi mysql
// (DISI)

// kondisi pengecekan apakah mysql berhasil tersambung atau tidak
// (DISI)

// membuat sebuah query untuk menampilkan seluruh isi data table
// (DISI)

// memproses query yang sebelumnya harus tersambung oleh database
// (DISI)

// mmebuat sebuah array kosongan
// (DISI)

// melakukan perulangan untuk mencetak/mengambil seluruh data/row yang ada di kolom
while($row = $result->fetch_assoc()) {
    $id_data = $row['id'];
    $gambar_data = $row['gambar'];
    $gambar_data_url = 'http://localhost/latihanapi-server/img/'.$gambar_data.'';
    $judul_data = $row['judul'];
    $deskripsi_data = $row['deskripsi'];

    // membuat sebuah array untuk dijadikan json objek
    $posts[] = array(
        'id' => $id_data,
        'gambar' => $gambar_data_url,
        'judul' => $judul_data,
        'deskripsi' => $deskripsi_data); 
}

// ngebungkus array post kedalam array response
$response = $posts;

// melakukan openstream untuk create file dengan nama data-api.json melalui peintah "w" / write
$fp = fopen('data-api.json', 'w');

// melakukan penulisan data ke file data-api.json dengan melakukan perubahan dari data ke json objek
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));

// menutup openstream
fclose($fp);

// direct halaman ke data-api.json
header( 'Location: data-api.json');
?>