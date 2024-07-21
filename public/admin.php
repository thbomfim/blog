<?php
include("../app/conexao/conectar.php");
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog!</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../app/css/style.css">

</head>

<?php 
$page = $_GET["page"];
?>

<body>
    <header>
        <h1>Blog</h1>
    </header>

    <div class="container">
        <form method="post" action="admin.php?page=login">
            <label>Usuario:</label><input type="text" name="usuario" id="usuario"><br>
            <label>Senha: <input type="password" name="senha" id="senha"></label><br>
            <input type="submit" value="Entrar">
        </form>
    </div>

    <?php 

    if ($page == "login") {
        
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"]; 
        
        
        $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":usuario", $usuario);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        $user = $stmt->fetchColumn();

            if ($user == true) {
                
                session_start();
                $_SESSION["user"] = $user["usuario"];
                header("location: painel.php");
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