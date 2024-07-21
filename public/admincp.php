<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include("../app/config/config.php");
include("../app/conexao/conectar.php");
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

<body>
    <header>
        <h1>Blog</h1>
    </header>

    <div class="container">
        <?php 
        if ($page == "login") 
        {
            # code...
        }elseif ($page == "cadastrook") 
        {
            $usuario = $_POST["usuario"] ?? '';
            $senha = $_POST["senha"] ?? '';

            $sql = "INSERT INTO usuario (usuario, senha) VALUES (:user, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":user","$usuario");
            $stmt->bindValue(":senha", "$senha");
            $stmt->execute();
            if ($stmt->rowCount() >= 1) {
                echo "usuario cadastrado";
            }else{
                echo "algum erro ocorreu :(";
            }

        }
        elseif($page == "cadastro") 
        {
            echo "<h2>cadastrar novo menbro da equipe</h2><br>";
            echo "<form method=\"post\" action=\"admincp.php?page=cadastrook\">";
            echo "<label>usuario:</label><input type=\"text\" name=\"usuario\" id=\"usuario\"><br>";
            echo "<label>senha:</label><input type=\"text\" name=\"senha\" id=\"senha\"><br>";
            echo "<input type=\"submit\" value=\"Cadastrar\">";
        }
        
        ?>
    </div>



    <footer>

    </footer>

    <script src="../bootstrap/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>