<?php 
  session_start();

  $msg = "";

  if (isset($_SESSION['loggedIn'])) {
    header('Location: dashboard.php');
    exit();
  }

  if (isset($_POST['email']) && isset($_POST['password'])) {
    $conn = new mysqli("DB_HOST", "DB_USERNAME", "DB_PASSWORD", "DB_NAME");
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = $conn->query("SELECT id, password, plan, img FROM users WHERE email = '$email'");

    if ($sql->num_rows > 0) {
      $data = $sql->fetch_assoc();

      if (password_verify($password, $data['password'])) {
        $_SESSION['plan'] = $data['plan'];
        // $_SESSION['img'] = $data['img'];
        $_SESSION['userId'] = $data['id'];
        $_SESSION['loggedIn'] = '1';

        header('Location: dashboard.php');
        exit();
      }
    }

    $msg = "<span style='color: red'>Incorrect username or password.</span>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center" align="center">
      <div class="col-md-6 col-md-offset-3">
        <img src="images/bridge_icon.png" alt="">
        <br><br>
        <form action="" method="post">
          <input class="form-control" type="email" name="email" placeholder="Email address">
          <br>
          <input class="form-control" type="password" name="password" placeholder="Password">
          <br>
          <input type="submit" value="Log In" class="btn btn-primary">
        </form>
        <br><br>
        <?= $msg; ?>
      </div>
    </div>
  </div>
</body>
</html>