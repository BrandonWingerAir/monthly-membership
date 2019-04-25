<?php 
  include_once 'upload_img.php';

  if (!isset($_SESSION['loggedIn'])) {
    header('Location: login.php');
    exit();
  }

  $plan = $_SESSION['plan'];
  $id = $_SESSION['userId'];

  $conn = new mysqli("DB_HOST", "DB_USERNAME", "DB_PASSWORD", "DB_NAME");

  $sql = "SELECT img FROM users WHERE id = '$id'";

  $img = $conn->query("SELECT img FROM users WHERE id = '$id'")->fetch_object()->img;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1 id="title">Member Dashboard</h1>
    <a href="logout.php" class="btn btn-success logout" id="logout-large">Log Out</a>
  </header>
  <div class="container">
    <div class="row my-5">
      <div class="col-md-3" align="center">
        <form action="dashboard.php" method="post" enctype="multipart/form-data">
          <div class="profile__img">
            <img src="images/<?= $img; ?>" alt="" onclick="uploadImg()" id="profile__img" onmouseover="showChangeImg()" onmouseleave="hideChangeImg()">
            <div id="container__img-change">
              <div class="profile__btn_img-change" onclick="uploadImg()" onmouseover="showChangeImg()" onmouseleave="hideChangeImg()">
                <i class="fas fa-camera"></i>
              </div>
            </div>
          </div>
          <input type="file" name="profileImg" onchange="previewImg(this)" id="profile__img-upload" class="form-control">
          <br>
          <p id="avatar-info"><b>Tap avatar to change</b></p>
          <div onclick="uploadImg()" class="btn btn-primary mb-3" id="profile__btn_img-upload">Upload <i class="fas fa-upload text-white"></i></div>
          <button type="submit" name="saveProfile" class="btn btn-success" id="profile__btn_img-save">Save Avatar</button>
        </form>
        <a href="logout.php" class="btn btn-success" id="logout-mobile">Log Out</a>
        <br><br>
        <ul class="list-group">
          <li class="list-item">
            <a href="#!">
              Basic Features
            </a>
          </li>
          <?php if ($plan >= 2) { ?>
            <li class="list-item">
              <a href="#!">
                Pro Features
              </a>
            </li>
          <?php } 
            if ($plan == 3) { 
          ?>
            <li class="list-item">
              <a href="#!">
                Elite Features
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-md-9" align="center">
        <h3 class="mt-4">Content Coming Soon</h3>
      </div>
    </div>
  </div>
  <h5 class="text-center">Monthly Membership &copy; 2019</h5>

  <script src="script.js"></script>
</body>
</html>