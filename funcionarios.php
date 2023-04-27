<?php

if(isset($_FILES['arquivo'])){
    include('acesso.php');
    $arquivo = $_FILES['arquivo'];

    if($arquivo['error'])
    die("Falha ao enviar arquivo");

    if($arquivo['size'] > 2097152)
    die("arquivo muito grande!! max: 2MB");
    
    $pasta = "./img/funcionarios/";
    $nomedoarquivo = $arquivo['name'];
    $novoNomedoarquivo = uniqid();
    $extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));
    
    if($extensao != "jpg" && $extensao != 'png')
    die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomedoarquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if($deu_certo){
        $mysqli->query("INSERT INTO usuarios (path) VALUES('$path')") or die($mysqli->error);
        echo "<p>Arquivo enviado com sucesso!</p>";
    } else
    echo "<p>Falha ao enviar arquivo</p>";
}
if (isset($_POST['email'])) { 
include('acesso.php');


$email = $_POST['email'];
$senha = md5($_POST['senha']);
$entrar = $_POST['entrar'];
$connect = new mysqli ('localhost','root','','login');

$sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);
$usuario = $sql_query->fetch_assoc();

if(isset($entrar)){
$verifica = $connect -> query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'")
or die("Erro ao selecionar coluna");

$rows = $verifica -> num_rows;
    if($rows <= 0){
    die('Login e / ou senha incorretos');
} else{
    if(!isset($_SESSION)){
        session_start();
    }
    $_SESSION['ID'] = $usuario['ID'];
    $_SESSION['NOME'] = $usuario['NOME'];
    $_SESSION['CARGO'] = $usuario['CARGO'];
    $_SESSION['DATANASC'] = $usuario['DATANASC'];
    $_SESSION['SALÁRIO'] = $usuario['SALÁRIO'];
    $_SESSION['SETOR'] = $usuario['SETOR'];
    $_SESSION['path'] = $usuario['path'];
    header("Location: painel.php");}
} 
} 

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.30">
    <title>Eco Company</title>
    <link rel='icon' type='image/png' href="./img/Logo_02_Fundo_Transparente.png">
    <link rel="stylesheet" href="./css/cssfuncionarios.css">
</head>

<body>
    <header class="cabecalho">
        <img class="logo" src="./img/Logo_02_Fundo_Transparente.png" alt="">

        <nav class="menu">
            <a class="menu-item" href="./index.html">Inicio</a>
            <a class="menu-item" href="./Sobrenós.html">Sobre nós</a>
            <a class="menu-item" href="./Contato.php">Contato</a>
            <a class="menu-item" href="./funcionarios.php">Entrar</a>
            <a class="menu-item" href="./cadastro.php" >Cadastrar</a>
        </nav>
    </header>
    <main class="conteudo">
        <div class="login">
            <div class="header">
                <h1 class="titulo">Funcionarios</h1>
            </div>
            <form  class="formulario" method="post">
                <label class="nome" for="">E-mail:</label>
                <input class="field" type="text" name="email" required id="email">
                <label class="nome" for="">Senha:</label>
                <input class="field" type="password" name="senha" required id="senha">
                <input class="field" type="submit" value="Acessar" name="entrar" id="entrar">
            
            </form> 
                <h2 class="titulo2">Para trabalhar conosco:</h2>
                <p>Você pode nos mandar um email com seu curriculo anexado (Email da empresa localizado no rodape de todas as nossas paginas) ou por nosso formulário de contato (Basta clicar em 'Contato' no cabeçalho acima).
                </p>
        </div> 
    </main>
   
</body>
</html>