<?php
$usuario = 'root';
$senha = 'aRYURe4DlmYONE4Cv86w';
$database = 'railway';
$host = 'containers-us-west-48.railway.app';
$mysqli = new mysqli($host,$usuario,$senha,$database);
$conn = mysqli_connect($host, $usuario, $senha, $database);
if($mysqli ->error){
    die("Falha ao conectar ao banco de dados: " .$mysqli->error);
}
?>
