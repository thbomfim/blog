<?php 
include_once("../app/config/config.php");

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