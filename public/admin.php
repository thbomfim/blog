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
        <form method="post" action="admincp.php?page=cadastro">
            <label>Usuario:</label><input type="text" name="usuario" id="usuario"><br>
            <label>Senha: <input type="password" name="senha" id="senha"></label><br>
            <input type="submit" value="Entrar">
        </form>
    </div>



    <footer>

    </footer>

    <script src="../bootstrap/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>