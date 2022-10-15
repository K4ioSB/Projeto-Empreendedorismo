<?php 
include('acesso.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    
    if(strlen($_POST['email']) == 0) {
    } elseif (strlen($_POST["senha"]) == 0){
    }
 else {
        $email = $mysqli->real_escape_string($_POST["email"]);
        $senha = $mysqli->real_escape_string($_POST["senha"]);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1 ){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: trabalho.php");
        }
    }
}
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
            <a class="menu-item" href="./funcionarios.php">Funcionarios</a>
    </nav> 
</header>
    <form class="formulario" method="post" action="">
    <div class="email">
    <label for="">E-mail:</label>
    <input type="text" name="email" required>
    </div>
    <div class="senha">
    <label for="">Senha:</label>
    <input type="password" name="senha" required>
    </div>
    <button class="botao" type="submit" >Acessar
    </form>
</body>
</html>
