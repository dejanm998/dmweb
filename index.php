<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jednostavna Web forma</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Dobrodošli. <?= $user['email']; ?>
      <br>Uspešno ste prijavljeni
      <a href="logout.php">
        Odjava
      </a>
    <?php else: ?>
      <h1>Molimo ulogujte se ili registrujte novi nalog</h1>

      <a href="login.php">Uloguj se</a> or
      <a href="signup.php">Registruj nalog</a>
    <?php endif; ?>
  </body>
</html>
