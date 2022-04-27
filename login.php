<?php 
session_start();
require 'koneksi.php';


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login~PikaPika Laundry~</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body background="assets/img/new-york_010627538_142.jpg">
  <div class="login-position">
     <div class="row">
    <div class="container">
        <div class="col-sm-4 col-sm-offset-1">

                        <!--login form-->
            <h2><span class="hgl">User Login</span></h2><br>
            <form method="post">
              <div class="form-login">
                <input style="font-size: 20px;font-weight: bold" class="form-control" type="email" name="email" placeholder="email" required="" /><br>
                <input style="font-size: 20px;font-weight: bold" class="form-control" type="password" name="password" placeholder="Password" required="" /><br>
                <br>
              </div>
              <div class="btn-login">
                <button class="btn btn-info" type="submit" name="login">Login</button>
              </div>
            </form>
                    ><!--/login form-->
        </div>


        <div class="col-sm-1">
          <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">

                        <!--sign up form-->
            <h2><span class="hgl">New User Register!</span></h2><br>
            <form method="post">
              <div class="form-login">
                <input style="font-size: 20px;font-weight: bold" class="form-control" type="text" name="name" placeholder="your name" required="" /><br>
                <input style="font-size: 20px;font-weight: bold" class="form-control" type="text" name="phone" placeholder="phone number" required=""><br>
                <input style="font-size: 20px;font-weight: bold" class="form-control" type="email" name="email" placeholder="email" required="" /><br>
                <input style="font-size: 20px;font-weight: bold" class="form-control" type="password" name="password" placeholder="Password" required="" /><br>
                <br>
              </div>
              <div class="btn-login">
                <button type="submit" name="register" class="btn btn-info">Register</button>
              </div>
            </form>
                    <!--/sign up form-->

        </div>
      </div>
    </div>
      
     
  </form> 
  </div>
 

<?php 
	//jika tombol login di tekan
if(isset($_POST["login"]))
{
  $email = $_POST["email"];
  $password = $_POST["password"];
  //query cek akun di tabel pelanggan
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' AND password='$password' " );

  //menghitung akun yg terambil
  $akunyangcocok = $ambil->num_rows;
  //jika 1 akun yg cocok maka diloginkan
  if ($akunyangcocok==1)
  {
    //anda sukses login
    $akun = $ambil->fetch_assoc();
    $_SESSION["login"] = $akun; //deklarasi session
   
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

}

//jika tombol register yang di tekan
if(isset($_POST["register"]))
{
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  //di cek ada akun yang sama ga di database
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' " );

  //menghitung akun yg terambil
  $akunyangcocok = $ambil->num_rows;
  
  if ($akunyangcocok==0)
  {
    //daftar berhasil

   $koneksi->query("INSERT INTO pelanggan 
                  (email,password,nama,telepon)
                          VALUES
                  ('$email','$password','$name','$phone') ");

                echo "<script>alert('Resgister Success! Please Login!');</script>";
                echo "<script>location='login.php';</script>";
    
    exit();
  }
  else
  {
    //gagal login
    echo "<script>alert('email yang dimasukan sudah terdaftar! gunakan email lain');</script>";
    echo "<script>location='login.php';</script>";
    
    exit();
  }
}
?>
</body>
</html>