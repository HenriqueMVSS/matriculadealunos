<title>Criar tabelas</title>
<?
$con_string = "host=localhost port=5432 dbname=cadAlunos user=henrique ";
$bdcon4 = pg_connect ($con_string) or die ("Não conectado ao banco de dados<br>".pg_last_error());
$query = "create table alunos (
	id_alunos serial constraint pk_id_alunos PRIMARY KEY ,
	name_aluno varchar(80) not null , 
	email_aluno varchar(100), 
	cursos_id integer not null ,
	timestamp timestamp default current_timestamp,
	foreign key (cursos_id) references cursos(id_cursos)
	
)";
$query = "create table cursos (
id_cursos serial CONSTRAINT pk_id_cursos primary key ,
cursos varchar(50),
	
)";