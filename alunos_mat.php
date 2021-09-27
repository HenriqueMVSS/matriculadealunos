<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require 'config.php';

$lista = [];
$sql = $conn->query("SELECT * FROM alunos inner join cursos on alunos.cursos_id = cursos.id_cursos;");


if ($sql->rowCount() > 0) {
  
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  
}



?>
<head>
 <link rel="stylesheet" href="./styles/style.css">
</head>
 <body>
 <header id="cb">
 <h1 class="title"> Alunos Matriculados</h1>
  <a id="button"   href="index.php">Matricular Aluno</a>
 </header>

 
<table border="1px" width="100%" id="table">
  <tr>
    
    <th>Nome</th>

    <th>E-mail</th>

    <th>Curso</th>
    <th>Deletar</th>
    <th>Editar</th>
  </tr>

  <?php foreach ($lista as $key => $value){ ?>
  <tr>
      <td><?=$value['name_aluno'];?></td>
      <td><?=$value['email_aluno'];?></td>
      <td><?=$value['cursos'];?></td>
      <td>
            <a id="excluir" href="excluir_aluno.php?id=<?=$value['id_alunos'];?>" onclick="return confirm(' Tem certeza que deseja excluir?')"> <img id='imgg' src="./assets/lixeira.png" alt=""> </a>
      </td>
      <td>
         <a  href="edit_alunos.php?id=<?=$value['id_alunos'];?>"><img id='imgg' src="./assets/editt.png" alt="">  </a>
      </td>
    </tr>
  <?php } ?>

</table>

</body>