<?php

$error = "";
$success = "";

// Proses form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"]);
    $pesan = trim($_POST["pesan"]);

    // Validasi input
    if (empty($nama) || empty($pesan)) {
        $error = "Nama dan pesan tidak boleh kosong!";
    } else {
        // Sanitasi input
        $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
        $pesan = htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8');

        // Format file dan waktu
        $timestamp = date("Y-m-d H:i:s");
        $data = "Waktu: $timestamp\nNama: $nama\nPesan: $pesan\n------------------------\n";

        // Simpan
        file_put_contents("buku_tamu.txt", $data, FILE_APPEND);

        $success = "Pesan berhasil disimpan!";
    }
}
// baca
$isi_buku_tamu = "";
if (file_exists("buku_tamu.txt")) {
    $isi_buku_tamu = file_get_contents("buku_tamu.txt");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Tamu Dark Glow</title>
<link rel="stylesheet" href="glow.css">
</head>
<body>
  <div class="container">
    <h1> Buku Tamu</h1>

    <form method="POST" action="">
      <label for="nama">Nama:</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan nama anda">

      <label for="pesan">Pesan:</label>
      <textarea id="pesan" name="pesan" placeholder="Tulis pesan anda..."></textarea>

      <button type="submit">Kirim Pesan</button>
    </form>

    <?php if ($error): ?>
      <div class="message error"><?= $error ?></div>
    <?php elseif ($success): ?>
      <div class="message success"><?= $success ?></div>
    <?php endif; ?>

    <div class="buku-tamu">
      <h3>=== PESAN TAMU ===</h3>
      <?= nl2br($isi_buku_tamu) ?>
    </div>
  </div>
</body>
</html>
