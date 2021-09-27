<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require "config.php";

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);


    $sql = $conn->prepare("UPDATE alunos SET name_aluno = :name, email_aluno = :email, cursos_id = :codigo WHERE id_alunos = :id_alunos ");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':codigo', $cod);
    $sql->bindValue(':id_alunos', $id);
    $sql->execute();

  
?>
<html>
<head>
  <link rel="stylesheet" href="./styles/style.css">
</head>
  <a id="button"   href="alunos_mat.php">Voltar para lista de alunos</a>
</html>
