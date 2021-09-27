<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require 'config.php';

$lista = [];
$sql = $conn->query("SELECT * FROM cursos");


if ($sql->rowCount() > 0) {
  
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <title>Matrícula de alunos</title>
</head>
<body>
  <h1 class="title">Matrícula de Alunos</h1>
    <a id="button"   href="alunos_mat.php">Lista de Alunos Matrículados</a>
    <form class="form" action="mat_alunos.php" method="POST">
      <label>
        Nome: <br>
        <input type="text" name="name" placeholder="Insira seu nome" required>
      </label> </br>
      <label>
        E-mail: <br>
        <input type="email" name="email" placeholder="Insira seu e-mail"  required>
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
      <input type="submit" value="Matrícular">
    </form>
    <div>
        <h2>Código dos cursos</h2>
          <ul>
            <li>Código 1 = PHP</li>
            <li>Código 2 = JavaScript </li>
            <li>Código 3 = TypeScript</li>
            <li>Código 4 = Laravel</li>
            <li>Código 5 = NodeJs</li>
            <li>Código 6 = Angular</li>
            <li>Código 7 = Java</li>
          </ul>
    </div>
</body>
</html>
