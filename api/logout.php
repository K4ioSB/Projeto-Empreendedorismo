<?php 

if(!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: /projetos/Meus_projetos/funcionarios.php");

?>