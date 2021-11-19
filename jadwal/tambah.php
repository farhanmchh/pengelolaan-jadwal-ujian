<?php 

include('../connection.php');

if (isset($_POST['submit'])) {
  $mapel = $_POST['mapel'];
  $waktu = $_POST['waktu'];

  $query = "INSERT INTO jadwal VALUES ('', '$mapel', '$waktu', '', '')";

  $tambah = mysqli_query($connection, $query);

  if ($tambah) {
    header('Location: ../jadwal/index.php');
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
            Buat Jadwal Ujian Baru
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-2">
                <label for="" class="form-label">Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control form-control-sm text-center">
              </div>
              <div class="mb-2">
                <label for="" class="form-label">Hari, Tanggal</label>
                <input type="text" name="waktu" class="form-control form-control-sm text-center">
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-sm" name="submit" type="submit">Buat</button>
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