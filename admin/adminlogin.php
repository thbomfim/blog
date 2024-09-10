<?php
include("../config/config.php");
$pg = $_GET["pg"];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title><?=$title?></title>
</head>
<body>
    <nav class="sticky-top bg-body-tertiary">

        <div class="menu container-fluid">
            <h1>
                <a class"navbar-brand" id="logo" href="#">THZINHO</a>
            </h1>
    </nav>

    <div class="container">
        <form method="post" action="?pg=login">
            <label>Usuario:</label><input type="text" name="usuario" id="usuario"><br>
            <label>Senha: <input type="password" name="senha" id="senha"></label><br>
            <input type="submit" value="Entrar">
        </form>
    </div>

    <?php 

    if ($pg == "login") {
        
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"]; 
        
        
        $sql = "SELECT * FROM th_user WHERE name = :name AND pass = :pass";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":name", $usuario);
        $stmt->bindValue(":pass", $senha);
        $stmt->execute();

            if ($stmt->rowCount() >= 1) {
                
                $user = $stmt->fetch();
                session_start();
                $_SESSION["user"] = $user["name"];
                $_SESSION["id"] = $user["id"];

                var_dump($_SESSION["user"]);
                echo "<a href=\"painel.php\">CLIQUE</a>";
                //header("location: painel.php");
                exit;
            }else{
               echo "Login invalido"; 
            }
    }
    ?>


    <footer>

    </footer>

    <script src="../bootstrap/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>