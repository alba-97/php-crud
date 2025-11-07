<?php
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function requireLogin()
{
    if (!isLoggedIn()) {
        $_SESSION['message'] = 'Debe iniciar sesión para acceder';
        $_SESSION['message_type'] = 'warning';
        header('Location: /login');
        exit();
    }
}

function getUserId()
{
    return $_SESSION['user_id'] ?? null;
}
