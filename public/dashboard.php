<?php
include('../config/config.php');
include('../includes/auth.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Controle de Estoque</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
    <p>Selecione uma opção no menu para continuar.</p>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
