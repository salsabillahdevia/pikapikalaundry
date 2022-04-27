<?php 
session_start();
require '../koneksi.php';


$id_laundry = $_GET['id'];


$ambil = $koneksi->query("SELECT * From pemesanan_laundry WHERE id_laundry = '$id_laundry'");
$pecah = $ambil->fetch_assoc();

$id_jenis = $pecah['id_jenis'];

$ambiljenis = $koneksi->query("SELECT * FROM jenis_barang WHERE id_jenis = '$id_jenis' ");
$pecahjenis = $ambiljenis->fetch_assoc();

$id_pemesanan = $pecah['id_pemesanan'];
$ambilpesan = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan' ");
$pecahpesan = $ambilpesan->fetch_assoc();




?>

<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan~PikaPika Laundry~</title>
</head>
<body >
	<div style="background-color: #76d2f7">
	<h1>Masukan Data</h1>
	</div>
	<hr size="1">
	<br>

<form method="post">

	<table border="1" cellspacing="" cellpadding="10">
		<thead style="font-weight: bold;background-color: salmon">
			<td>Jenis barang</td>
			<td>Harga</td>
			<td>Berat(kg)</td>
			<td>Total</td>
			<td>Tanggal pemesanan</td>
			<td>Proses pengerjaan</td>
			<td>Status</td>
			<td>Aksi</td>
		</thead>
		<tr>
			<td><?php echo $pecahjenis['jenis_barang']; ?></td>
			<td>Rp. <?php echo number_format($pecahjenis['harga']); ?></td>
			<td><?php echo $pecahpesan['berat']; ?></td>
			<td>Rp. <?php echo number_format($pecahpesan['total']); ?></td>
			<td><?php echo $pecah['tanggal']; ?></td>
			<td><?php echo $pecahjenis['lama_proses']; ?></td>
			<td>
				<select name="status" required="" style="background-color: #76d2f7">
				<option>*----Pilih Status----*</option>
				<option value="Pencucian Dibatalkan">Pencucian Dibatalkan</option>
				<option value="Pencucian Selesai">Pencucian Selesai</option>
			</select>
			</td>
			<td>
				<button type="submit" name="update" style="background-color: #76d2f7">Update</button>
			</td>
		</tr>
	</table>

</form>
<?php 
if (isset($_POST["update"]))
{

	$status = $_POST['status'];
	$id_laundry = $_GET['id'];
	$koneksi->query("UPDATE pemesanan_laundry SET status = '$status' WHERE id_laundry='$id_laundry' ");


		echo "<script>alert('Pembaruan status berhasil!');</script>";
		echo "<script>location='index.php';</script>";

}


?>
</body>
</html>


<!-- rombak sistem jadi kayak bebas bayar, pake sistem saldo -->