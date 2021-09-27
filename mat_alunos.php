<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require "config.php";

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$codcursos = filter_input(INPUT_POST,'codigo', FILTER_VALIDATE_INT);
$cursos =  filter_input(INPUT_POST, 'cursos');

  
     $verificar = $conn->query("SELECT * FROM alunos WHERE email_aluno = '$email' limit 1;");
     $retorno = $verificar->rowCount();
     $verificar->execute();
 if( $retorno <= 0 ){  

  if($codcursos < 7){
    $sql = $conn->prepare("INSERT INTO alunos (name_aluno, email_aluno,cursos_id) VALUES (:name, :email,:codigo)");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':codigo', $codcursos);
    $sql->execute();
    
    header("Location: alunos_mat.php");
    exit;
    
  }else {
    header("Location: index.php");
    exit;
  }
}else {
  
   header("Location: index.html");
   exit;
   
 }
?>
    