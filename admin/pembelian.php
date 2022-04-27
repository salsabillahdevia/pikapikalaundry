<?php 
session_start();
include '../koneksi.php';

$pembelian = $koneksi->query("SELECT * FROM pembelian");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pembelian ~Bebas Pulsa~</title>
</head>
<body bgcolor="pink">
	<button style="background-color: #ff5e58"><a href="index.php">Halaman utama</a></button>
	<br><br>
	<h1 style="color: navy">Pembelian Produk oleh User</h1>
	<hr size="2">
	<table border="1" cellpadding="10" cellspacing="0" bgcolor="#ac97eb">
		<br>
		<tr>
			<th>No</th>
			<th>Pulsa/Paket</th>
			<th>Pembeli</th>
			<th>Harga</th>
			<th>Tanggal</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach ($pembelian as $beli) : //looping?>
			<?php $id_user = $beli['id_user']; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM user WHERE id_user = '$id_user' "); ?>
			<?php $pecah = $ambil->fetch_assoc(); ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $beli['produk']; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo number_format($beli['harga']); ?></td>
			<td><?php echo $beli['tanggal']; ?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
</body>
</html>