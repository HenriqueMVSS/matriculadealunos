<?php 

require "config.php";

$id= filter_input(INPUT_GET, 'id');

if($id){

  $sql = $conn->prepare("DELETE FROM alunos WHERE id_alunos=:id");
  $sql->bindValue(':id', $id);
  $sql->execute();
   
}

header('Location: alunos_mat.php');
exit;

?>