<?php require_once("auth.php"); ?>
<!DOCTYPE html>
<!-- tipe dokumen -->
<html lang="en">
    <!-- bahasa html -->
  <head>
      <!-- unicode yang digunakan dan juga viewport -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- judul halaman -->
    <title>Halaman Landing</title>
    <!-- import css lokal -->
    <link rel="stylesheet" type="text/css" href="css/profil.css" />
  </head>
  <!-- bagian body -->
  <body>
      <!-- kontainer kartu -->
    <div class="card-container">
        <!-- kontainer atas -->
      <div class="upper-container">
          <!-- kontainer gambar -->
        <div class="image-container">
            <!-- gambar untuk profil pada kontainer -->
          <img src="gambar/profile.png" alt="" />
        </div>
      </div>
      <!-- kontainer bawah -->
      <div class="lower-container">
        <div>
            <!-- teks -->
          <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
          <p><?php echo $_SESSION["user"]["email"] ?></p>
        </div>
        <div>
          </center></p>
        </div>
        <div>
            <!-- 2 button ke profil dan home -->
          <p><a href="logout.php" class="btn">Logout</a></p>
          <p><a href="list.php" class="btn">Lihat Postingan</a></p>
        </div>
      </div>
    </div>
  </body>
</html>