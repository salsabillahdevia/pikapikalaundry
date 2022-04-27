<?php  
session_start();
include '../koneksi.php';
include '../fungsi.php';

$id_admin = $_SESSION["loginAdm"]['id_admin'];

if (!isset($_SESSION["loginAdm"])) 
  {
    header("location: login.php");
    exit;
  }
 
  if (!isset($_SESSION["loginAdm"])) 
  {
  echo "
      <script>
        alert ('Login terlebih dahulu!')
        document.location.href = 'login.php';
      </script>
    ";
    exit;
  }



$tanggal = date("d-m-Y");


$pemesanan = $koneksi->query("SELECT * FROM pemesanan_laundry WHERE tanggal = '$tanggal' ");
$admin = $koneksi->query("SELECT * From admin WHERE id_admin = '$id_admin'");

$pecahadmin = $admin->fetch_assoc();


?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin~PikaPika Laundry~</title>
	<style>
		.huruf
		{
			font-family: sans-serif;
			font-size: 19px;
			font-weight: bold;
			color: black;
		}
	</style>
</head>
<body>
	<button style="background-color: #c9baf9"><a href="logout.php">Logout</a></button>
	<h1 style="color: red">Hai <?php echo $_SESSION["loginAdm"]['nama']; ?>!</h1>
	<br>
	<button style="width: 200px;height: 50px;background-color: #fea74d"><a href="data.php?id=1" class="huruf">Antrian Laundry</a></button>

	<button style="width: 200px;height: 50px;background-color: #fea74d"><a href="data.php?id=2" class="huruf">Laundry Dibatalkan</a></button>

	<button style="width: 200px;height: 50px;background-color: #fea74d"><a href="data.php?id=3" class="huruf">Laundry Selesai</a></button>

	<h3>Data Pemesanan hari ini</h3>


	<table border="1" cellspacing="1" cellpadding="10" bgcolor="#76d2f7">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Waktu</th>
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

</body>
</html>