<?php
  use PHPMailer\PHPMailer\PHPMailer;

  $products = array(
    "prodIds" => ["1", "2", "3"],
    "1" => "plan_En9rz429ZJCqGi",
    "2" => "plan_En9zHFhZ7jJsMP",
    "3" => "plan_EnA1g4UnyUWj8z",
  );

  if (!isset($_GET['prodId']) || !in_array($_GET['prodId'], $products['prodIds']) || !isset($_POST['stripeToken']) || !isset($_POST['stripeEmail'])) {
    header('Location: index.php');
    exit();
  }

  require_once('Stripe/init.php');

  $stripe = [
    "secret_key"      => "sk_test_AwoOdHjmvXYJqiW7GUuhjnjL",
    "publishable_key" => "pk_test_a1D8NQroGjSKbWzT16v4WZnq",
  ];

  \Stripe\Stripe::setApiKey($stripe['secret_key']);

  $prodId = $_GET['prodId']; 
  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];

  $customer = \Stripe\Customer::create([
      'email' => $email,
      'source'  => $token,
  ]);

  \Stripe\Subscription::create([
    "customer" => $customer->id,
    "items" => [
      [
        "plan" => $products[$prodId]
      ],
    ]
  ]);

  $conn = new mysqli("DB_HOST", "DB_USERNAME", "DB_PASSWORD", "DB_NAME");
  $email = $conn->real_escape_string($email);

  $sql = $conn->query("SELECT id FROM users WHERE email = '$email'");

  if ($sql->num_rows > 0) {
    $conn->query("UPDATE users SET plan = '$prodId' WHERE email = '$email'");
    $password = "Old Password...";
  } else {
    $password = "zxcvbnmlkjhgfdsapoiuytrewq5647382910";
    $password = str_shuffle($password);
    $password = substr($password, 0, 10);
    $encryptedPass = password_hash($password, PASSWORD_BCRYPT);

    $conn->query("INSERT INTO users (email, plan, password, reg_date) VALUES ('$email', '$prodId', '$encryptedPass', NOW())");
  }

  require_once "PHPMailer/PHPMailer.php";
  require_once "PHPMailer/SMTP.php";
  require_once "PHPMailer/Exception.php";

  $mail = new PHPMailer();
  $mail->Host = "smtp.gmail.com";
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Username = "email@domain.com";
  $mail->Password = "Z4tZgmpg";
  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";
  $mail->addAddress($email);
  $mail->setFrom("email@domain.com", "name");
  $mail->isHTML(true);
  $mail->Subject = "Your Login Details...";
  $mail->Body = "
      Hey,
      <br><br>
      Thank you for signing up. Your login details are included below:
      <br><br>

      <b>Username</b>: $email
      <br>
      <b>Password</b>: $password
      <br><br>

      <a href='http://localhost/Study/PHP/Youtube/CodingPassiveIncome/stripe-recurring/login.php'>Click Here To Login</a>
      <br><br>

      Thanks,
      <br>
      Administrator
  ";

  if ($mail->send())
        $error = 0;
  else 
        $error = 1;

  // echo $mail->ErrorInfo;
  // echo $error;

  header('Location: thank_you.php?err=' . $error . '&email=' . $email . '&pass=' . $password . '&prodId=' . $prodId);
?>