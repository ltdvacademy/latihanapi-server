<?php 

// membutuhkan pemanggilan akses koneksi (mysql)
// (DISI)

// mengambil ID
$id = mysqli_real_escape_string($db,$_GET['id']);

// melakukan query delete berdasarkan id
// (DISI)

// melakukan pengecekan saat menghapus data
$hapus=mysqli_query($db, $query);
	// jika iya
	if($hapus==true){
	?>
	<script type="text/javascript">alert('Data Berhasil Dihapus!'); document.location.href='index.php';</script>
	<?php

	// jika gagal
	} else {
	?>
	<script type="text/javascript">alert('Gagal!'); document.location.href='index.php';</script>
	<?php
}
?>
