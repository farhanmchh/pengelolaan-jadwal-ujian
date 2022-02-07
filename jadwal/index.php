<?php

include('../connection.php');
session_start();

$query = "SELECT * FROM jadwal WHERE selesai = 0";
$mapel = mysqli_query($connection, $query);

$i = 1;

foreach ($mapel as $m) {
  $tanggal = $m['tanggal'];
  $jam_mulai = $m['jam_mulai'];

  $tahun  = intval(substr($tanggal, 0, 4));
  $bulan = intval(substr($tanggal, 5, 2));
  $hari   = intval(substr($tanggal, 8, 2));

  $jam = intval(substr($jam_mulai, 0, 2));
  $menit = intval(substr($jam_mulai, 3, 2));

  if ($tahun <= intval(date('Y'))) {
    if ($bulan <= intval(date('m'))) {
      if ($hari <= intval(date('d'))) {
        if ($jam <= intval(date('H')) || $menit <= intval(date('i'))) {
          if (!$m['selesai']) {
            $id = $m['id'];

            $query = "UPDATE jadwal SET
                      berlangsung = 1
                      WHERE id = $id";

            $ubah = mysqli_query($connection, $query);
          }
        }
      }
    }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Pengelolaan Jadwal Ujian</title>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container">
      <a class="navbar-brand shadow-sm" href="../home.php">Pengelolaan Jadwal Ujian</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../jadwal/index.php">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../berlangsung/index.php">Sedang Berlangsung</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../hasil/index.php">Hasil Ujian</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <!-- CONTENT -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm">
        <div class="d-grid mb-3">
          <p class="fs-5 text-center">Jadwal Ujian</p>
          <?php if ($_SESSION['role'] == 'admin') : ?>
            <a href="tambah.php" class="btn btn-primary btn-sm">Buat Jadwal Ujian Baru</a>
          <?php endif ?>
        </div>
        <table class="table table-sm table-hover text-center">
          <thead>
            <tr>
              <th>No</th>
              <th>Mata Pelajaran</th>
              <th>Tanggal</th>
              <th>Jam Mulai</th>
              <th>Jam Selesai</th>
              <th>Durasi</th>
              <th>Berlangsung</th>
              <th>Status</th>
              <?php if ($_SESSION['role'] == 'admin') : ?>
                <th>Action</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mapel as $m) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $m['mapel'] ?></td>
                <td><?= $m['tanggal'] ?></td>
                <td><?= $m['jam_mulai'] ?></td>
                <td><?= $m['jam_selesai'] ?></td>
                <td><?= $m['durasi'] ?> Menit</td>
                <td><?= $m['berlangsung'] ? 'Ya' : 'Tidak' ?></td>
                <td><?= $m['selesai'] ? 'Selesai' : 'Belum Selesai' ?></td>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                  <td>
                    <?php if (!$m['selesai']) : ?>
                      <a href="ubah.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                    <?php endif ?>
                    <a href="hapus.php?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                  </td>
                <?php endif ?>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>