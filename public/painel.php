<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ola!!</title>
</head>
<body>
    <?php
    session_start();
    $_SESSION["user"] = $user["usuario"];

    echo "ola voce esta logado". $_SESSION["user"];
    ?>
</body>
</html>l