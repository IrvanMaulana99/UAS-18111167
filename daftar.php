<?php
require_once("config.php");
if(isset($_POST['register'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	// enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    // menyiapkan query
    $sql = "INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)";
    $stmt = $db->prepare($sql);
    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":password" => $password,
        ":email" => $email
    );
    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}
?>
<!-- FILE HTML -->
<!DOCTYPE html>
<html lang="en">
<!-- Bagian Head -->
<head>
	<!-- Pengaturan Display dan unicode -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- Judul -->
	<title>Sarang IT - Daftar</title>
	<!-- Icon Halaman -->
    <link href="gambar/SarangIT Logo .png" rel="icon">
	<link href="gambar/SarangIT Logo .png" rel="apple-touch-icon">
	<!-- CSS Lokal -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/login_daftar.css">
</head>

<!-- Bagian Body -->
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<!-- Gambar Logo -->
						<img src="gambar/profil.jpg">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>

							<!-- Validasi Pakai Javascript -->
							<form  action="" method="POST" class="my-login-validation" id="myForm" onsubmit=" return validasi()" novalidate="">

							<!-- -------------------------------------------------------------- -->
							<!-- Validasi Default -->
							<!-- <form method="POST" class="my-login-validation" novalidate=""> -->
							<!-- -------------------------------------------------------------- -->

								<!-- Label dan Input Nama -->
								<div class="form-group">
									<label for="name">Nama</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
									<div class="invalid-feedback">
										Siapa Nama Anda ?
									</div>
								</div>
								<!-- Label dan Input Email -->
								<div class="form-group">
									<label for="email">Alamat Email</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Penulisan Email Salah
									</div>
								</div>
								<!-- Label dan Input Password -->
								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Masukkan Password
									</div>
								</div>
								<!-- Checkbox dan Syarat Ketentuan -->
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">Saya Setuju dengan <a href="privasi.php" target="_blank">Syarat & Ketentuan</a></label>
									</div>
								</div>
								<!-- Tombol Register -->
								<div class="form-group m-0">
									<button type="submit" name="register" class="btn btn-primary btn-block">
										Register
									</button>
                                </div>
                                <!-- Link ke halaman Login -->
								<div class="mt-4 text-center">
									Sudah Punya Akun ? <a href="login.php">Login</a>
								</div>
								<!-- Link kembali ke Home -->
                                <div class="mt-4 text-center">
									Kembali ke <a href="index.php">Home</a>
								</div>
							</form>
						</div>
					</div>

					<!-- Bagian Footer -->

					<div class="footer">
						&copy; Copyright  <strong><span>18111167_Irvan Maulana_TIF-RP-18 CNS A</span></strong>
					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- Javascript Campuran -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/login_daftar.js"></script>
</body>
</html>