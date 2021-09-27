<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');
$lista = [];
$sql = $conn->query("SELECT * FROM cursos");


if ($sql->rowCount() > 0) {
  
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  
}
if($id){
  $sql = $conn->prepare("SELECT * FROM alunos WHERE id_alunos = :id");
  $sql->bindValue(':id', $id);
  $sql->execute();
  if($sql->rowCount() != 0) {
      $info = $sql->fetch(PDO::FETCH_ASSOC);


}else{
  header("Location: alunos_mat.php");
  exit;
  }
  
  } else {
    header("Location: alunos_mat.php");
    exit;
}

echo $id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <title>Matricula de alunos</title>
</head>
<body>
  <h1 class="title">Editar Alunos</h1>
    <a id="button"   href="alunos_mat.php">Lista de Alunos Cadastrados</a>
    <form class="form" action="edit.php" method="POST">
     <input type="hidden" name="id" value="<?=$info['id_alunos'];?>"> 
      <label>
        Nome: <br>
        <input type="text" name="name" value="<?=$info['name_aluno'];?>">
      </label> </br>
      <label>
        E-mail: <br>
        <input type="email" name="email" value="<?=$info['email_aluno'];?>">
      </label> <br>
      <label>
        Código do curso:
          <input style="width:125px;" type="number" name="codigo" placeholder="Escolha de 1 a 7"> <br>
        Curso:
        <select >
          <?php foreach ($lista as $key => $value){ ?>
            <option > <?=$value['cursos'];?></option>
          <?php } ?>
        </select>
        *Obs: Escolher o curso de acordo com o código escolhido.
      </label> <br>
        
      </label> <br>
      <input type="submit" value="Salvar">
    </form>
</body>
</html>