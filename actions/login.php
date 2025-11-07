<?php
include('../db.php');
include('../includes/auth.php');

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      header('Location: /tareas');
      exit();
    }
  }

  $_SESSION['message'] = 'Usuario o contraseña incorrectos';
  $_SESSION['message_type'] = 'danger';
  header('Location: /login');
}
