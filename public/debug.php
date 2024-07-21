<?php 
include("../app/conexao/conectar.php");

$usuario = "admin";
$senha = "123";

 $sql = $pdo->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha ");
 $sql->bindValue(":usuario", $usuario);
 $sql->bindValue(":senha", $senha);
 $sql->execute();

 var_dump($sql);

 if ($sql->fetchColumn()<= 0) {
    echo "algo esta incorreto";
    exit;
 }else{
  echo "tudo certinho";
 }
?>