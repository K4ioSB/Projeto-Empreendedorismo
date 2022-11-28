<?php
include('acesso.php');
if(isset($_FILES['arquivo'])){
    include('acesso.php');
    $arquivo = $_FILES['arquivo'];

    if($arquivo['error'])
    die("Falha ao enviar arquivo");

    if($arquivo['size'] > 2097152)
    die("arquivo muito grande!! max: 2MB");
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $nome = $_POST['nome'];
    $id = $_POST['id'];
    $datanasc = $_POST['datanasc'];
    $salario = $_POST['salario'];
    $cargo = $_POST['cargo'];
    $setor = $_POST['setor'];
    $pasta = "./img/funcionarios/";
    $nomedoarquivo = $arquivo['name'];
    $novoNomedoarquivo = uniqid();
    $extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));
    
    if($extensao != "jpg" && $extensao != 'png')
    die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomedoarquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if($deu_certo){
        $mysqli->query("INSERT INTO usuarios (EMAIL, SENHA, NOME, ID, DATANASC,SALÁRIO, CARGO, SETOR, path) VALUES('$email','$senha','$nome','$id','$datanasc','$salario','$cargo','$setor','$path')") or die($mysqli->error);
    } else
    echo "<p>Falha ao enviar arquivo</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' type='image/png' href="./img/Logo_02_Fundo_Transparente.png">
    <link rel="stylesheet" href="./css/csscadastro.css">
    <title>Cadastro de Funcionario</title>
</head>
<body>
<header class="cabecalho">
      <img class="logo" src="./img/Logo_02_Fundo_Transparente.png" alt="">
       
    <nav class="menu">
            <a class="menu-item" href="./index.html">Inicio</a>
            <a class="menu-item" href="./sobrenos.html">Sobre nós</a>
            <a class="menu-item" href="./contato.html">Contato</a>
            <a class="menu-item" href="./funcionarios.php" >Entrar</a>
    </nav> 
</header>
    <main class="conteudo">
        <div class="cadastro">
     <form enctype="multipart/form-data" class="formulario" method="post">
        <p> 
        <label class="nome">Id de Funcionario</label>
        <input class="field" placeholder="Sua ID" type="text" name="id" id="id">
        <label class="nome">Nome</label>
        <input class="field" placeholder="Seu nome" type="text" name="nome" id="nome">
        <label class="nome">E-mail</label>
        <input class="field" placeholder="Seu e-mail" type="email" name="email" id="email">
        <label class="nome">Senha</label>
        <input class="field" placeholder="Sua Senha" type="text" name="senha" id="senha">
        <label class="nome">Data de Nascimento</label>
        <input class="field" placeholder="Sua Data de Nascimento" type="text" name="datanasc" id="datanasc">
        <label class="nome">Salário</label>
        <input class="field" placeholder="Seu Salário" type="text" name="salario" id="salario">
        <label class="nome">Seu Cargo</label>
        <input class="field" placeholder="Seu Cargo" type="text" name="cargo" id="cargo">
        <label class="nome">Seu Setor</label>
        <input class="field" placeholder="Seu Setor" type="text" name="setor" id="setor">
        <label class="nome" for="">Foto do Funcionario</label>
        <input class="field" name="arquivo" type="file">  
        </p>
            <button class="field" name="upload" type="submit"><a href="funcionarios.php">Enviar</a></button>
     </form>
        </div>
    </main>
</body>
</html>