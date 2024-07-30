<?php 
include("../app/config/config.php");
include("../app/functions/functions.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../app/css/style.css">
    <title><?=$title?></title>
</head>
<body>
    <nav class="sticky-top bg-body-tertiary">

    <div class="menu container-fluid"><h1>
        <a class"navbar-brand" id="logo" href="#">THZINHO</a>
    </h1>
    </nav>
    <div class="container">
    <?php
    if (!isset($_SESSION["id"])) {
        echo "Você não estar logado!";
        echo "<a href=\"adminlogin.php\">Clique aqui e faça seu login</a>";
        exit;
    }
    echo "ola ".$_SESSION["id"]." Saiba que todas as suas ações seram registadas em logs!<br>";
    ?>
    <div class="linha1">
        <h2>Posts</h2><br>
        <a href="admincp.php?pg=addpost">Adicionar Post</a><hr>
        <a href="admincp.php?pg=editpost">Editar Post</a><hr><br>
        <h2>administrar</h2><br>
        <a href="admincp.php?pg=cadastro">Cadastrar membro de equipe</a><hr>
        <a href="admincp.php?pg=edituser">Modificar membro da equipe</a>
    </div>
    </div>

    <footer class="fixed-bottom bg-body-tertiary">
        <div class="rodape navbar-brand container-fluid py-3">
            todos os direitos reservados..
        </div>
    </footer>
</body>
</html>