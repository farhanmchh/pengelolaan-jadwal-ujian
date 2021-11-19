<?php 

include('connection.php');
session_start();

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $get_user = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
  $user = mysqli_fetch_assoc($get_user);

  if ($password == $user['password']) {
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['login'] = true;

    header('Location: home.php');
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
              <p class="fs-4 text-center">Login</p>
  
              <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control form-control-sm text-center">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-sm text-center">
              </div>
  
              <div class="d-grid mb-3">
                <button class="btn btn-primary btn-sm" type="submit" name="login">Login</button>
              </div>
              <p class="text-muted">If you doesn't have account, <a href="register.php">register now</a></p>
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