<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thank You</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Thank you for signing up!</h2>
        <p>
          <?php 
            if ($_GET['err'] == 1) {
          ?>
            Your login details are included below:
            <br><br>

            <b>Username</b>: <?= $_GET['email']; ?>
            <br>
            <b>Password</b>: <?= $_GET['pass']; ?>
            <br><br>

            <a href='http://localhost/Study/PHP/Youtube/CodingPassiveIncome/stripe-recurring/login.php'>Click Here To Login</a>
            <br><br>  
          <?php
            } else {
              echo 'Please check your email for login details. You may have to check your spam folder.';
            }
          ?>
        </p>
      </div>
    </div>
  </div>
</body>
</html>