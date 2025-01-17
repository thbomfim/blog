<?php 
include("../config.php");

var_dump(__DIR__);
////////////////////////verifica se o usuario e um admin
function isAdmin() {
    global $pdo;

    $sql = "SELECT perm FROM th_user WHERE id = :iduser";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":iduser", ID_USER);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin["perm"] == 1) 
    {
        return true;
    }else 
    {
        return false;
    }
}
//////////////////////mostra o id do usuario
function idUser()
{
    global $pdo;

    $sql = "SELECT id FROM th_user WHERE id = :iduser";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":iduser", ID_USER);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row["id"];
}
/////////////////////mostra o nome do usuario
function nameUser() 
{
    global $pdo;

    $sql = "SELECT name FROM th_user WHERE id = :iduser";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":iduser", $_SESSION["id"]);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["name"];
}

?>