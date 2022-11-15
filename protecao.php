<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['ID'])){
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"funcionarios.php\">Entrar</a></p>");
}

?>