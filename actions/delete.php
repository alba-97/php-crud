<?php
include('../db.php');
include('../includes/auth.php');

requireLogin();

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $user_id = getUserId();

    $check_query = "SELECT * FROM tasks WHERE id = $id AND user_id = $user_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) === 0) {
        $_SESSION['message'] = 'No tiene permiso para eliminar esta tarea';
        $_SESSION['message_type'] = 'danger';
        header('Location: ../tareas');
        exit();
    }
    $query = "DELETE FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = 'Tarea eliminada exitosamente';
        $_SESSION['message_type'] = 'success';
        header("Location: ../tareas");
    } else {
        $_SESSION['message'] = 'Error al eliminar la tarea';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../tareas");
    }
}
