<?php 
$id_pelanggan = $_SESSION["login"]['id_pelanggan'];
$pelanggan = $koneksi->query("SELECT * From pelanggan WHERE id_pelanggan = '$id_pelanggan'");
$pecahpelanggan = $pelanggan->fetch_assoc();

?>


<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">

				<!-- toggle navbar. wajib pake jquery -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href="index.php" class="navbar-brand page-scroll"><i class="glyphicon glyphicon-home"></i></a>
			</div>


			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="daftarpemesanan.php" class="page-scroll"><span class="glyphicon glyphicon-list-alt"></span> Riwayat Laundry</a></li>

					<li class="dropdown"><a><span class="glyphicon glyphicon-retweet"></span> Transaksi</a>
						<ul role="menu" class="sub-menu">
							<li><a href=""><span class="glyphicon glyphicon-time"></span> Dalam proses</a></li>
							<li><a href=""><span class="glyphicon glyphicon-ok"></span> Selesai</a></li>							
						</ul>
					</li>

					<li class="dropdown"><a><span class="glyphicon glyphicon-user"></span> Selamat <?php echo $waktu; ?> <?php echo $pecahpelanggan['nama'] ?>!</a>
						<ul role="menu" class="sub-menu">
							<li><a href=""><span class="glyphicon glyphicon-cog"></span> Profil</a></li>
						</ul>
					</li>

				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
					<li><a class="jam" id="jamdigital"></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- end navbar -->