<?php 
include("../app/config/config.php");
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
    <header>
        <nav class="fixed-top bg-body-tertiary">

            <div class="menu container-fluid">
                <h1>
                    <a class"navbar-brand" id="logo" href="#">THZINHO</a>
                </h1>
        </nav>
    </header>
    <div class="container">
        <?php 
        $sql = "SELECT * FROM th_post ORDER BY id DESC LIMIT 5";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) 
        {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
            {
                $textCurto = substr($row["text"], 0, 150);
                $datamysql = strtotime($row["datetime"]);
                echo "<div class=\"linha1\">".$row["title"]."<br> ".date('d/m/y', $datamysql)."<br>".$textCurto."</div><br>";
            }
        }else {
            echo "nenhum registro!";
        }

        
        ?>
    </div>



    <footer>
        <nav class="footer fixed-bottom bg-body-tertiary">
            <div class="rodape navbar-brand container-fluid py-3">
                todos os direitos reservados..
            </div>
    </footer>
</body>

</html>