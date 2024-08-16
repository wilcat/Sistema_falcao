<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

function is_master() {
    return $_SESSION['tipo'] === 'master';
}
?>
