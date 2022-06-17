<?php

// membutuhkan pemanggilan akses koneksi (mysql)
// (DISI)

// menjalankan sessions
// (DISI)

// check apakah session email sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if (empty($_SESSION['uname'])) {
	header('Location: login.html');
}
?>
<?php

// mengambil data
$id = mysqli_real_escape_string($db, $_POST['id']);
$judul = mysqli_real_escape_string($db, $_POST['judul']);
$deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);

// jika data diubah dengan gambar
if (isset($_POST['ubah_foto'])) {
	$sumber = $_FILES['gambar']['name'];
	$nama_gambar = $_FILES['gambar']['tmp_name'];

	$fotobaru = date('dmYHis') . $sumber;

	$path = "img/" . $fotobaru;

	// pengecekan untuk pemindahan data setelah upload gambar
	if (move_uploaded_file($nama_gambar, $path)) {
		$query = "SELECT * FROM dataku WHERE id='" . $id . "'";
		$sql = mysqli_query($db, $query);
		$data = mysqli_fetch_array($sql);

		if (is_file("img/" . $data['gambar']))
			unlink("img/" . $data['gambar']);

		// query untuk ubah data (dengan gambar)
		$query = "UPDATE dataku SET gambar ='$fotobaru', judul='$judul', deskripsi='$deskripsi' WHERE id='$id'";

		// mengeksekusi query
		$sql = mysqli_query($db, $query);

		// jika berhasil ubah data
		if ($sql) {
?>
			<script type="text/javascript">
				alert('Data Berhasil Diupdate!');
				document.location.href = 'index.php';
			</script>
		<?php

			// gagal menyimpan data
		} else {
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
		}

		// gagal mengubah data
	} else {
		?>
		<script type="text/javascript">
			alert('Data Gagal Diupdate!');
			document.location.href = 'index.php';
		</script>
	<?php
	}

	// jika data dirubah tanpa gambar
} else {

	// query untuk mengubah data tanpa gambar
	$query = "UPDATE dataku SET judul='$judul', deskripsi='$deskripsi' WHERE id='$id'";

	// memproses query
	$sql = mysqli_query($db, $query);

	// jika data berhasil diubah
	if ($sql) {
	?>
		<script type="text/javascript">
			alert('Data Berhasil Diupdate!');
			document.location.href = 'index.php';
		</script>
	<?php

		// jika data gagal diubah
	} else {
	?>
		<script type="text/javascript">
			alert('Data Gagal Diupdate!');
			document.location.href = 'index.php';
		</script>
<?php
	}
}

?>