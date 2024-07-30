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

        <div class="menu container-fluid">
            <h1>
                <a class"navbar-brand" id="logo" href="#">THZINHO</a>
            </h1>
    </nav>
    <div class="container">
        <?php 
        if ($pg == "post") 
        {
            
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
        }
        ?>

    </div>
    <footer class="fixed-bottom bg-body-tertiary">
        <div class="rodape navbar-brand container-fluid py-3">
            todos os direitos reservados..
        </div>
    </footer>

</body>

</html>