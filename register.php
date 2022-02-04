<?php

include('connection.php');

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = 'peserta';

  $query = "INSERT INTO users VALUES ('', '$name', '$email', '$password', '$role')";

  $register = mysqli_query($connection, $query);

  if ($register) {
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

  <!-- CONTENT -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 text-center">
        <div class="card mt-5">
          <div class="card-body">
            <form action="" method="POST">
              <p class="fs-4 text-center">Register</p>

              <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-sm text-center">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control form-control-sm text-center">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-sm text-center">
              </div>

              <div class="d-grid mb-3">
                <button class="btn btn-primary btn-sm" type="submit" name="register">Register</button>
              </div>
              <p class="text-muted">Already account, <a href="index.php">login now</a></p>
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