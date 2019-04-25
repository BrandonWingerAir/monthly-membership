<?php
  session_start();

  if (!isset($_SESSION['loggedIn'])) {
    header('Location: login.php');
    exit();
  }

  $id = $_SESSION['userId'];
  
  $conn = new mysqli("HOST_NAME", "DB_USER", "PASSWORD", "DB_NAME");

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
