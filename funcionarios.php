<?php 
include('acesso.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=0.30">
    <title >Eco Company</title>
    <link rel='icon' type='image/png' href="./img/Logo_02_Fundo_Transparente.png">
    <link rel="stylesheet" href="./css/css4.css">
</head>
<body>
<header class="cabecalho">
      <img class="logo" src="./img/Logo_02_Fundo_Transparente.png" alt="">
       
    <nav class="menu">
            <a class="menu-item" href="./index.html">Inicio</a>
            <a class="menu-item" href="./Sobrenós.html">Sobre nós</a>
            <a class="menu-item" href="./Contato.html">Contato</a>
            <a class="menu-item" href="./funcionarios.php" >Funcionarios</a>
    </nav> 
</header>
    <form class="formulario" method="post" action="">
    <div class="email">
    <label for="">E-mail:</label>
    <input type="email" name="email" required>
    </div>
    <div class="senha">
    <label for="">Senha:</label>
    <input type="password" name="senha" required >
    </div>
    <input class="botao" type="submit" value="Acessar">
    </form>
</body>
</html>