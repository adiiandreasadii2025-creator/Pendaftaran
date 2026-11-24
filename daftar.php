
<?php
include 'koneksi.php';

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama_lengkap']);
    $jk = $_POST['jenis_kelamin'];
    $alamat = trim($_POST['alamat']);
    $universitas = trim($_POST['universitas']);
    $fakultas = trim($_POST['fakultas']);
    $jurusan = trim($_POST['jurusan']);
    $hp = trim($_POST['no_hp']);
    $email = trim($_POST['email']);
    $ayah = trim($_POST['nama_ayah']);
    $ibu = trim($_POST['nama_ibu']);

    $sql = "INSERT INTO pendaftar
    (nama_lengkap, jenis_kelamin, alamat, universitas,
    fakultas, jurusan, no_hp, email, nama_ayah, nama_ibu)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssss",
            $nama, $jk, $alamat, $universitas,
            $fakultas, $jurusan, $hp, $email, $ayah, $ibu
        );

        if (mysqli_stmt_execute($stmt)) {
            $pesan = "Pendaftaran berhasil disimpan!";
        } else {
            $pesan = "Gagal menyimpan pendaftaran.";
        }
        mysqli_stmt_close($stmt);
    } else {
        $pesan = "Terjadi kesalahan pada sistem.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PMB IPPMA 2026/2027</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #eef2ff;
    margin: 0;
    padding: 20px;
}
.container {
    max-width: 700px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 15px;
}
h2 {
    text-align: center;
    color: #243b80;
}
input, select, textarea {
    width: 100%;
    padding: 12px;
    margin: 8px 0 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 7px;
}
button {
    background: #243b80;
    color: white;
    padding: 14px;
    border: none;
    width: 100%;
    border-radius: 7px;
    cursor: pointer;
}
.pesan {
    background: #d9fbe5;
    padding: 12px;
    margin-bottom: 15px;
}
</style>
</head>
<body>

<div class="container">
<h2>PMB IPPMA</h2>
<p style="text-align:center">
Ikatan Pemuda Pelajar dan Mahasiswa/i Apogo
Kota Studi Se-Jayapura
</p>

<?php if ($pesan != ""): ?>
<div class="pesan">
<?= htmlspecialchars($pesan) ?>
</div>
<?php endif; ?>

<form method="POST">

<label>Nama Lengkap</label>
<input type="text" name="nama_lengkap" required>

<label>Jenis Kelamin</label>
<select name="jenis_kelamin" required>
<option value="">Pilih</option>
<option value="Laki-laki">Laki-laki</option>
<option value="Perempuan">Perempuan</option>
</select>

<label>Alamat Lengkap</label>
<textarea name="alamat" required></textarea>

<label>Universitas</label>
<input type="text" name="universitas" required>

<label>Fakultas</label>
<input type="text" name="fakultas" required>

<label>Jurusan</label>
<input type="text" name="jurusan" required>

<label>Nomor HP</label>
<input type="tel" name="no_hp" required>

<label>Email</label>
<input type="email" name="email">

<label>Nama Ayah</label>
<input type="text" name="nama_ayah">

<label>Nama Ibu</label>
<input type="text" name="nama_ibu">

<button type="submit">KIRIM PENDAFTARAN</button>

</form>
</div>
</body>
</html>

