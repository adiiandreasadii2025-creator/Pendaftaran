
<?php
include 'koneksi.php';

// Mengambil data anggota dari database
$sql = "SELECT id, nama_lengkap, universitas, fakultas, jurusan
        FROM pendaftar
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Gagal mengambil data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Anggota IPPMA</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f2f5fa;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 1100px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,.1);
}

header {
    text-align: center;
    margin-bottom: 25px;
}

header h1 {
    color: #173b70;
}

header p {
    color: #555;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background: #173b70;
    color: white;
}

tr:nth-child(even) {
    background: #f2f5fa;
}

.jumlah {
    margin: 15px 0;
    font-weight: bold;
    color: #173b70;
}

.kembali {
    display: inline-block;
    background: #173b70;
    color: white;
    padding: 12px 18px;
    text-decoration: none;
    border-radius: 6px;
    margin-bottom: 20px;
}

@media(max-width:650px) {
    .container {
        padding: 12px;
        overflow-x: auto;
    }

    table {
        min-width: 650px;
    }
}
</style>
</head>

<body>

<div class="container">

<header>
    <h1>DAFTAR ANGGOTA IPPMA</h1>
    <h3>TAHUN 2026/2027</h3>
    <p>
    Ikatan Pemuda Pelajar dan Mahasiswa/i
    Apogo Kota Studi Se-Jayapura
    </p>
</header>

<a href="index.html" class="kembali">
    Kembali ke Beranda
</a>

<div class="jumlah">
    Jumlah Anggota Terdaftar:
    <?php echo mysqli_num_rows($result); ?>
</div>

<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama Lengkap</th>
    <th>Universitas</th>
    <th>Fakultas</th>
    <th>Jurusan</th>
</tr>
</thead>

<tbody>

<?php
$no = 1;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

<tr>
    <td><?php echo $no++; ?></td>

    <td>
    <?php echo htmlspecialchars($row['nama_lengkap']); ?>
    </td>

    <td>
    <?php echo htmlspecialchars($row['universitas']); ?>
    </td>

    <td>
    <?php echo htmlspecialchars($row['fakultas']); ?>
    </td>

    <td>
    <?php echo htmlspecialchars($row['jurusan']); ?>
    </td>
</tr>

<?php
    }
} else {
?>

<tr>
    <td colspan="5" style="text-align:center">
        Belum ada anggota yang mendaftar.
    </td>
</tr>

<?php } ?>

</tbody>
</table>

</div>

</body>
</html>

