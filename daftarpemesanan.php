<?php
session_start();
//koneksi database
include 'koneksi.php';
//jika belum login tidak bisa akses menu daftar belanja
if (!isset($_SESSION["login"]))
{
	echo "<script>alert('Silahkan Login Dahulu!!');</script>";
	echo "<script>location='login.php';</script>";
	exit();

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pemesanan~PikaPika Laundry~</title>
</head>
<body>
	<button style="background-color: #4a8af4"><a href="index.php" style="color: white">Halaman Utama</a></button>
	<h1 style="color: blue">Daftar Pemesanan <?php echo $_SESSION["login"]['nama']?> </h1>
	<br><br>
		<table border="1" cellspacing="1" cellpadding="10" bgcolor="#76d2f7">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Jam</th>
					<th>Jenis Barang</th>
					<th>Total</th>
					<th>Lama Proses</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$nomor=1;
				//mendapatkan id_pelanggan
				$id_pelanggan = $_SESSION["login"]['id_pelanggan'];
				$ambil = $koneksi->query("SELECT * FROM pemesanan_laundry WHERE id_pelanggan='$id_pelanggan' ");
				while ($pecah = $ambil->fetch_assoc()) {
				$id_jenis = $pecah['id_jenis'];
				$ambiljenis = $koneksi->query("SELECT * FROM jenis_barang WHERE id_jenis = '$id_jenis' ");
				$pecahjenis = $ambiljenis->fetch_assoc();


				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["tanggal"]; ?></td>
					<td><?php echo $pecah["waktu"]; ?></td>
					<td><?php echo $pecahjenis["jenis_barang"] ?></td>
					<td><?php echo number_format($pecah["total"]) ?></td>
					<td><?php echo $pecahjenis['lama_proses']; ?></td>
					<td><?php echo $pecah['status']; ?></td>
				</tr>
				<?php $nomor++;?>
				<?php } ?>
			</tbody>			
		</table>
	</div>
</section>
</body>
</html>

