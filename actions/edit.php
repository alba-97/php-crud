<?php
include('../db.php');
include('../includes/auth.php');

requireLogin();
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $user_id = getUserId();

    $check_query = "SELECT * FROM tasks WHERE id = $id AND user_id = $user_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) === 0) {
        $_SESSION['message'] = 'No tiene permiso para editar esta tarea';
        $_SESSION['message_type'] = 'danger';
        header('Location: ../tareas');
        exit();
    }
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = 'Tarea editada exitosamente';
        $_SESSION['message_type'] = 'success';
        header("Location: ../editar/{$_POST['id']}");
    } else {
        $_SESSION['message'] = 'Error al editar la tarea';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../editar/{$_POST['id']}");
    }
}
