<?php 
session_start();
require '../koneksi.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Admin~PikaPika Laundry~</title>
</head>
<body bgcolor="#268bd2">
	<h1 style="margin-left: 600px;margin-top: 100px">Login Admin</h1>
	<form method="post">
    
      <br>
      <label style="margin-left: 550px;font-weight: bold;">Email :</label>
            <input type="text" name="email" placeholder="Masukkan email" autocomplete="off" size="20px" autofocus="" style="background-color: #76d2f7">
            <br><br>
			<label style="margin-left: 550px;font-weight: bold;">Password :</label>
			       <input type="password" placeholder="Masukkan password" name="password" size="22px" style="background-color: #76d2f7">
			<br><br>
            <button name="login" style="margin-left: 660px;background-color: #99e259">Login</button>
    
	</form> 

<?php 
	//jika tombol login di tekan
if(isset($_POST["login"]))
{
  $email = $_POST["email"];
  $password = $_POST["password"];
  //query cek akun di tabel admin
  $ambil = $koneksi->query("SELECT * FROM admin WHERE email='$email' AND password='$password' " );

  //menghitung akun yg terambil
  $akunyangcocok = $ambil->num_rows;
  //jika 1 akun yg cocok maka diloginkan
  if ($akunyangcocok==1)
  {
    //anda sukses login
    $akun = $ambil->fetch_assoc();
    $_SESSION["loginAdm"] = $akun; //deklarasi session


   
    echo "<script>alert('Anda berhasil login');</script>";
    echo "<script>location='index.php';</script>"; 
    
    exit();
  }
  else
  {
    //gagal login
    echo "<script>alert('Anda gagal login, coba lagi!!!');</script>";
    echo "<script>location='login.php';</script>";
    exit();
  }
//solved

  //logout, navbar, riwayat sama data2 admin
}
?>
</body>
</html>