<?php 
session_start();
require 'koneksi.php';
require 'jam.php';

if (!isset($_SESSION["login"]))
{
	echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";	
    exit();
}

$id_jenis = $_GET['id'];


$jenis_barang = $koneksi->query("SELECT * From jenis_barang WHERE id_jenis = '$id_jenis'");

$pecah_barang = $jenis_barang->fetch_assoc();





?>

<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan~PikaPika Laundry~</title>
	<?php include 'link.php'; ?>
</head>
<body background="assets/img/bgr.png">
	<?php include 'navbar.php'; ?>

	<h1>Masukan Data</h1>

	<hr size="1">
	<br>

<form method="post">
	<div class="row">
		<div class="container">
			<div class="col-sm-4">
				<label style="font-size: 18px;">Jenis Barang :</label>
				<input style="font-size: 18px" class="form-control" type="text" name="jenis_barang" readonly value="<?php echo $pecah_barang['jenis_barang']; ?>">
			</div>
			
			<div class="col-sm-4">
				<label style="font-size: 18px;">Harga per KG (Rp.) :</label>
				<input style="font-size: 18px" class="form-control" type="text" name="harga" readonly value="<?php echo $pecah_barang['harga']; ?>">
			</div>
	
			<div class="col-sm-4">
				<label style="font-size: 18px;">Proses Pengerjaan :</label>
				<input style="font-size: 18px"class="form-control" type="text" name="lama_proses" readonly value="<?php echo $pecah_barang['lama_proses']; ?>">			
			</div>

			<div class="col-sm-3 col-sm-offset-2">
				<label style="font-size: 18px;">Berat Barang (KG) :</label>
				<input style="opacity: .7;font-size: 18px" class="form-control" type="number" name="berat" value="1" min="1" max="50" required="">
			</div>
	
			<div class="col-sm-6">
				<label style="font-size: 18px;">Pembayaran :</label>
				<select style="opacity: .7;font-size: 18px" name="pembayaran" required="" class="form-control">
					<option>*----Pilih Metode Pembayaran----*</option>
					<option value="OVO">OVO</option>
					<option value="T-Cash">T-Cash</option>
					<option value="GoPay">GoPay</option>
					<option value="Dana">Dana</option>
					<option value="bayar langsung">bayar langsung</option>
				</select>
		<br><br><br>
			</div>
		<center><button class="btn btn-success" type="submit" name="proses">Proses!</button><button class="btn btn-warning" name="tambah">Tambah Item</button></center>
	
		</div>
	</div>
	
</form>
<?php 
if (isset($_POST["proses"]))
{
	$id_pelanggan = $_SESSION["login"]['id_pelanggan'];
	$jenis_barang = $_POST["jenis_barang"];
	$id_jenis = $_GET['id'];
	$berat = $_POST["berat"];
	$harga =$pecah_barang['harga'];
	$total = $harga * $berat;
	$tanggal = date("d-m-Y");
	$pembayaran = $_POST["pembayaran"];
	$status = "Dalam Proses";
	

	//masukin ke database
	$koneksi->query("INSERT INTO pemesanan 
		(id_pelanggan,id_jenis,berat,total,pembayaran,tanggal,waktu)
						VALUES
		('$id_pelanggan','$id_jenis','$berat','$total','$pembayaran','$tanggal','$jamsekarang') ");	

//masukin data ke pemesanan_laundry
//id_pemesanan di ambil dari tabel pemesanan, harus di insert id dulu biar sama
$id_pemesanan = $koneksi->insert_id;


$pemesanan = $koneksi->query("INSERT INTO pemesanan_laundry 
		(id_pemesanan,id_pelanggan,id_jenis,total,pembayaran,tanggal,waktu,status)
						VALUES
		('$id_pemesanan','$id_pelanggan','$id_jenis','$total','$pembayaran','$tanggal','$jamsekarang','$status') ");	

//nanti id laundry di tambahin otomatis. id laundry buat data di halaman admin buat di get


		echo "<script>alert('Pemesanan berhasil! Harap serahkan barang pada petugas PikaPika Laundry!');</script>";
		echo "<script>location='daftarpemesanan.php?pemesanan=$id_pemesanan';</script>";

}

if (isset($_POST["tambah"])) 
{
	$id_pelanggan = $_SESSION["login"]['id_pelanggan'];
	$jenis_barang = $_POST["jenis_barang"];
	$id_jenis = $_GET['id'];
	$berat = $_POST["berat"];
	$harga =$pecah_barang['harga'];
	$total = $harga * $berat;
	$tanggal = date("d-m-Y");
	$pembayaran = $_POST["pembayaran"];
	$status = "Dalam Proses";
	

	//masukin ke database
	$koneksi->query("INSERT INTO pemesanan 
		(id_pelanggan,id_jenis,berat,total,pembayaran,tanggal,waktu)
						VALUES
		('$id_pelanggan','$id_jenis','$berat','$total','$pembayaran','$tanggal','$jamsekarang') ");	

//masukin data ke pemesanan_laundry
//id_pemesanan di ambil dari tabel pemesanan, harus di insert id dulu biar sama
$id_pemesanan = $koneksi->insert_id;


$pemesanan = $koneksi->query("INSERT INTO pemesanan_laundry 
		(id_pemesanan,id_pelanggan,id_jenis,total,pembayaran,tanggal,waktu,status)
						VALUES
		('$id_pemesanan','$id_pelanggan','$id_jenis','$total','$pembayaran','$tanggal','$jamsekarang','$status') ");	

//nanti id laundry di tambahin otomatis. id laundry buat data di halaman admin buat di get


		echo "<script>alert('Pemesanan berhasil! Harap pilih item selanjutnya!');</script>";
		echo "<script>location='index.php?id=$id_pemesanan';</script>";
}

?>
</body>
</html>

