<?php
include('../db.php');
include('../includes/auth.php');

requireLogin();
if (isset($_POST['save'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $user_id = getUserId();

    $query = "INSERT INTO tasks (title, description, user_id) VALUES ('$title', '$description', $user_id)";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = 'Tarea agregada exitosamente';
        $_SESSION['message_type'] = 'success';
        header("Location: ../agregar.php");
    } else {
        $_SESSION['message'] = 'Error al agregar la tarea';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../agregar.php");
    }
}
