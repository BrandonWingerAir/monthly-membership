<?php
  session_start();

  if (!isset($_SESSION['loggedIn'])) {
    header('Location: login.php');
    exit();
  }

  $id = $_SESSION['userId'];
  
  $conn = new mysqli("db5000045172.hosting-data.io", "dbu104282", "o3P3Pmqi!", "dbs40083");

  if (isset($_POST['saveProfile'])) {
    $imgName = time() . '_' . $_FILES['profileImg']['name'];

    $target = 'images/' . $imgName;

    if (move_uploaded_file($_FILES['profileImg']['tmp_name'], $target)) {
      $sql = "UPDATE users SET img = '$imgName' WHERE id = '$id'";
      mysqli_query($conn, $sql);
    }

    header('Location: dashboard.php');
    exit();
  }