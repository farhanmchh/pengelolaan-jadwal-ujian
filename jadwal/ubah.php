<?php

include('../connection.php');

$id = $_REQUEST['id'];
$query = "SELECT * FROM jadwal WHERE id = $id";

$get_mapel = mysqli_query($connection, $query);
$mapel = mysqli_fetch_assoc($get_mapel);

if (isset($_POST['ubah'])) {
  $mapel = $_POST['mapel'];
  $tanggal = $_POST['tanggal'];
  $jam_mulai  = $_POST['jam_mulai'];
  $durasi = $_POST['durasi'];

  $jam = intval(substr($jam_mulai, 0, 2));
  $menit = intval(substr($jam_mulai, 3, 2)) + intval($durasi);

  if ($menit > 120) {
    $jam += 2;
    $menit -= 120;
  } else if ($menit > 60) {
    $jam += 1;
    $menit -= 60;
  }

  $jam_selesai = $jam . ':' . $menit;

  $query = "UPDATE jadwal SET
            mapel = '$mapel',
            tanggal = '$tanggal',
            jam_mulai = '$jam_mulai',
            jam_selesai = '$jam_selesai',
            durasi = '$durasi'
            WHERE id = $id";

  $ubah = mysqli_query($connection, $query);

  if ($ubah) {
    header('Location: index.php');
  }
}

if (isset($_POST['mulai'])) {
  $query = "UPDATE jadwal SET
            berlangsung = 1
            WHERE id = $id";

  $ubah = mysqli_query($connection, $query);

  if ($ubah) {
    header('Location: index.php');
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
      <a class="navbar-brand shadow-sm" href="index.php">Pengelolaan Jadwal Ujian</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="jadwal/index.php">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="berlangsung/index.php">Sedang Berlangsung</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hasil/index.php">Hasil Ujian</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <!-- CONTENT -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <div class="card">
          <div class="card-header fw-bolder">
            Ubah Jadwal Ujian
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-2">
                <label for="" class="form-label">Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control form-control-sm text-center" value="<?= $mapel['mapel'] ?>">
              </div>
              <div class="mb-2">
                <label for="" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control form-control-sm text-center" value="<?= $mapel['tanggal'] ?>">
              </div>
              <label for="" class="form-label">Jam Mulai</label>
              <input type="time" name="jam_mulai" class="form-control form-control-sm text-center" value="<?= $mapel['jam_mulai'] ?>">
          </div>
          <div class="mb-2">
            <label for="" class="form-label">Durasi (Menit)</label>
            <select name="durasi" class="form-select form-select-sm text-center">
              <option></option>
              <option value="10" <?= $mapel['durasi'] == 10 ? 'selected' : '' ?>>10</option>
              <option value="30" <?= $mapel['durasi'] == 30 ? 'selected' : '' ?>>30</option>
              <option value="45" <?= $mapel['durasi'] == 45 ? 'selected' : '' ?>>45</option>
              <option value="60" <?= $mapel['durasi'] == 60 ? 'selected' : '' ?>>60</option>
              <option value="80" <?= $mapel['durasi'] == 80 ? 'selected' : '' ?>>80</option>
              <option value="120" <?= $mapel['durasi'] == 120 ? 'selected' : '' ?>>120</option>
            </select>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary btn-sm" name="ubah" type="submit">Ubah</button>
            <!-- <button class="btn btn-info btn-sm" name="mulai" type="submit">Mulai</button> -->
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- END CONTENT -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>