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


//ambil logic buat dat
$id_status = $_GET['id'];
if ($id_status == 1) 
{
	$status = 'Sedang Proses';
	$data = 'Antrian Laundry';
} 
elseif ($id_status == 2) 
{
	$status = 'Pencucian Dibatalkan';
	$data = 'Pembatalan Pencucian';
} 
elseif ($id_status == 3) 
{
	$status = 'Pencucian Selesai';
	$data = 'Pencucian Selesai';
} 


$pemesanan = $koneksi->query("SELECT * FROM pemesanan_laundry WHERE status = '$status' ");
$admin = $koneksi->query("SELECT * From admin WHERE id_admin = '$id_admin'");

$pecahadmin = $admin->fetch_assoc();


?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin~PikaPika Laundry~</title>
	</head>
<body>
	
	<h1>Data <?php echo $data; ?></h1>
	<hr size="1">


	<table border="1" cellspacing="1" cellpadding="10" bgcolor="#76d2f7">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Jenis Barang</th>
					<th>Harga</th>
					<th>Lama Proses</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$nomor=1;
				
				foreach ($pemesanan as $pesan) : ?>
				<?php $id_jenis = $pesan['id_jenis'];
				$ambiljenis = $koneksi->query("SELECT * FROM jenis_barang WHERE id_jenis = '$id_jenis' ");
				$pecahjenis = $ambiljenis->fetch_assoc();
				$id_laundry = $pesan['id_laundry']; 
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pesan["tanggal"] ?></td>
					<td><?php echo $pecahjenis["jenis_barang"] ?></td>
					<td><?php echo number_format($pesan["total"]) ?></td>
					<td><?php echo $pecahjenis['lama_proses']; ?></td>
					<td><?php echo $pesan['status'];; ?></td>
					<td>
						<button name="proses"><a href="proses.php?id=<?php echo "$id_laundry"; ?>">Proses</a></button>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach; ?>
			</tbody>			
		</table>

</body>
</html>