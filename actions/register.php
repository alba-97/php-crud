<?php
include('../db.php');
if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
  $check_result = mysqli_query($conn, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    $_SESSION['message'] = 'El usuario o email ya existe';
    $_SESSION['message_type'] = 'danger';
    header('Location: /register');
    exit();
  } else {
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
      $_SESSION['message'] = 'Registro exitoso. Por favor inicie sesión';
      $_SESSION['message_type'] = 'success';
      header('Location: /login');
      exit();
    } else {
      $_SESSION['message'] = 'Error al registrar usuario';
      $_SESSION['message_type'] = 'danger';
      header('Location: /register');
      exit();
    }
  }
}
