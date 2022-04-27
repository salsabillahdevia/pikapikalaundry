<?php 
session_start();
require 'koneksi.php';
require 'jam.php';


	if (!isset($_SESSION["login"])) 
	{
		header("location: login.php");
		exit;
	}
 
	if (!isset($_SESSION["login"])) 
	{
	echo "
			<script>
				alert ('Login terlebih dahulu!')
				document.location.href = 'login.php';
			</script>
		";
		exit;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>~PikaPika Laundry~</title>
	<?php include 'link.php'; ?>
</head>

<body onload="waktu()" background="assets/img/bgr.png">
	<?php include 'navbar.php'; ?>


	
	<h1><span class="hgl">PikaPika Laundry</span></h1>
	<h3><span class="hgl">Easy | Reliable | Thrusted</span></h3>
	
	<br><br><br><br>

	<div class="row">
		<div class="container">
			<div class="text-center">
				<div class="hvr-grow-shadow">
					<a class="btn btn-info" href="pemesanan.php?id=1">Pakaian</a>
				</div>
				<div class="hvr-grow-shadow">
					<a class="btn btn-danger" href="pemesanan.php?id=2">Boneka</a>
				</div>
				<div class="hvr-grow-shadow">
					<a class="btn btn-warning" href="pemesanan.php?id=3">Karpet</a>
				</div>
				<div class="hvr-grow-shadow">
					<a class="btn btn-primary" href="pemesanan.php?id=4" >Tas</a>
				</div>
				<div class="hvr-grow-shadow">
					<a class="btn btn-success" href="pemesanan.php?id=5" >Sepatu</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
