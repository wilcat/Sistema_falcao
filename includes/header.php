<?php
include('../includes/auth.php');
?>

<header>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <?php if (is_master()): ?>
                <li><a href="usuarios.php">Usuários</a></li>
            <?php endif; ?>
            <li><a href="relatorios.php">Relatórios</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
</header>

<style>
    header {
        background-color: #007bff;
        padding: 10px;
        color: #fff;
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    nav ul li {
        margin-right: 20px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
    }

    nav ul li a:hover {
        text-decoration: underline;
    }
</style>
