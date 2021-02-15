<?php
require_once("config.php");
if(isset($_POST['login'])){
	// email dan password
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	// query database
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt = $db->prepare($sql);
    // bind parameter ke query
    $params = array(
        ":email" => $email
    );
    $stmt->execute($params);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman profil
            header("Location: profil.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Bagian Head -->
<head>

    <!-- Bagian Display -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Judul -->
	<title>Sarang IT - Login</title>

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
							<h4 class="card-title">Login</h4>

							<!-- --------------------------------------------------------------------------------- -->
							<!-- Validasi Default -->
							<!-- <form action="index.html" method="get" id="myForm"> -->
							<!-- --------------------------------------------------------------------------------- -->

							<!-- Validasi dengan Javascript -->
							<form action="" method="POST" id="myForm" onsubmit=" return validasi()" novalidate="">
								<!-- Label Email dan Input -->
								<div class="form-group">
									<label for="email">Alamat Email</label>
									<input id="email" type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
									<div class="invalid-feedback">
										Kolom Email tidak boleh kosong dan perhatikan format penulisan email !
									</div>
								</div>

								<!-- Label Password dan Input -->
								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="Masukkan Password" required data-eye >
								    <div class="invalid-feedback">
										Silahkan Masukkan Password !
									</div>
								</div>

								<!-- Tombol Login -->
								<div class="form-group m-0">
									<button name="login" type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>

								<!-- Link ke halaman daftar -->
								<div class="mt-4 text-center">
									Tidak Punya Akun ? <a href="daftar.php">Buat Akun</a>
								</div>

								<!-- link ke halaman Home -->
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/login_daftar.js"></script>
</body>
</html>
