<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include("../app/config/config.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../app/css/style.css">

</head>

<body>
    <header>
        <h1>Blog</h1>
    </header>

    <div class="container">
        <?php 
        if ($pg == "login") 
        {
            # code...
        }elseif ($pg == "cadastrook") 
        {
            $usuario = $_POST["usuario"] ?? '';
            $senha = $_POST["senha"] ?? '';

            $sql = "INSERT INTO th_user (name, pass) VALUES (:user, :pass)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":user","$usuario");
            $stmt->bindValue(":pass", "$senha");
            $stmt->execute();
            if ($stmt->rowCount() >= 1) {
                echo "usuario cadastrado";
            }else{
                echo "algum erro ocorreu :(";
            }

        }
        elseif($pg == "cadastro") 
        {
            echo "<h2>cadastrar novo menbro da equipe</h2><br>";
            echo "<form method=\"post\" action=\"admincp.php?pg=cadastrook\">";
            echo "<label>usuario:</label><input type=\"text\" name=\"usuario\" id=\"usuario\"><br>";
            echo "<label>senha:</label><input type=\"text\" name=\"senha\" id=\"senha\"><br>";
            echo "<input type=\"submit\" value=\"Cadastrar\">";
        }elseif ($pg == "addpost") 
        {
            $titlePost = $_POST["titlePost"];
            $text = $_POST["text"];
            
            if (empty($titlePost)) {
                echo 'Digite o titulo do post';
                exit;
            }

            if (empty($text)) {
                echo 'Digite o conteudo do post';
                exit;
            }

            $sql = "INSERT INTO th_post (title,text,datetime,name,nameid) VALUES(:title,:text,NOW(),:name,:nameid)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":title",$titlePost);
            $stmt->bindValue(":text",$text);
            $stmt->bindValue(":name",nameUser());
            $stmt->bindValue(":nameid",idUser());
            $stmt->execute();

            if ($stmt->rowCount() >= 1) {
                echo "Post adicionado com sucesso!";
                exit;
            }else {
                echo "Ocorreu algum erro, tente novamente";
            }
        }elseif ($pg = "addposts") 
        {
            echo '<form method="post" action="?pg=addpost">';
            echo '<label>Titulo:</label><input type="text" name="titlePost"><br>';
            echo '<label>Post:</label><textarea name="text">digite seu post</textarea><br>';
            echo '<input type="submit" value="Postar">';
        }elseif ($pg == "readpost") {
            
        }
        
        ?>
    </div>



    <footer>

    </footer>

    <script src="../bootstrap/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>