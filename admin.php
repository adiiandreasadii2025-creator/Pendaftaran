
<?php
include 'koneksi.php';

$sql = "SELECT * FROM pendaftar ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Gagal mengambil data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin PMB IPPMA</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f2f4f8;
    padding: 20px;
}
.container {
    background: white;
    padding: 20px;
    border-radius: 12px;
    overflow-x: auto;
}
h2 { color: #173b70; }
table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
}
th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}
th {
    background: #173b70;
    color: white;
}
tr:nth-child(even) { background: #f2f4f8; }
</style>
</head>
<body>

<div class="container">
<h2>ADMIN PMB IPPMA 2026/2027</h2>
<p>Daftar Mahasiswa Baru IPPMA Kota Studi Se-Jayapura</p>

<table>
<tr>
<th>ID</th>
<th>Nama Lengkap</th>
<th>Jenis Kelamin</th>
<th>Universitas</th>
<th>Fakultas</th>
<th>Jurusan</th>
<th>No HP</th>
<th>Email</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?= htmlspecialchars($row['id']) ?></td>
<td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
<td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
<td><?= htmlspecialchars($row['universitas']) ?></td>
<td><?= htmlspecialchars($row['fakultas']) ?></td>
<td><?= htmlspecialchars($row['jurusan']) ?></td>
<td><?= htmlspecialchars($row['no_hp']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
</tr>
<?php } ?>

</table>
</div>
</body>
</html>

