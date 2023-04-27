<?php
include('acesso.php');

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  } else {
    $email = '';
  }
  if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
  } else {
    $nome = '';
  }
  if (isset($_POST['telefone'])) {
    $telefone = $_POST['telefone'];
  } else {
    $telefone = '';
  }
  if (isset($_POST['assunto'])) {
    $assunto = $_POST['assunto'];
  } else {
    $assunto = '';
  }
  if (isset($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
  } else {
    $mensagem = '';
  }
          

$mysqli->query("INSERT INTO contatos (EMAIL, NOME, PHONE, ASSUNTO, MENSAGEM) VALUES('$email','$nome','$telefone','$assunto','$mensagem')") or die($mysqli->error);


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.30">
    <title>Contato</title>
    <link rel='icon' type='image/png' href="./img/Logo_02_Fundo_Transparente.png">
    <link rel="stylesheet" href="./css/csscontato.css">
</head>
<body>
    <header class="cabecalho">
        <img class="logo" src="./img/Logo_02_Fundo_Transparente.png" alt="">
      <nav class="menu">
            <a class="menu-item" href="./index.html">Inicio</a>
            <a class="menu-item" href="./sobrenos.html">Sobre nós</a>
            <a class="menu-item" href="./Contato.php">Contato</a>
            <a class="menu-item" href="./funcionarios.php" >Entrar</a>
            <a class="menu-item" href="./cadastro.php" >Cadastrar</a>
      </nav> 
  </header>
  <main class="conteudo-principal">
    <div class="conteudo-secundario">
        <h2 class="titulo2">Para adquirir nossos produtos e serviços:</h2>
     <p class="conteudo">Em São Paulo - SP, ligue para (11)3486-6883 ou entre em contato pelo Whatsapp (11)97595-1022<br>
     Para o resto do Brasil, é possível entrar em contato pelo 0800 486 688<br>
     Propostas de parceria podem ser encaminhadas para ecocompany.ltda.br@gmail.com</p>
     <div class="imagem"><img  src="./img/contato.jpeg" alt=""></div>
    </div>
<div class="contato"> 
       <div class="header">
             <h1 class="titulo">Fale conosco</h1>
             <p class="sub-titulo">Entre em contato</p>
        </div>
  <form enctype="multipart/form-data" class="form" method="post">
    <input type="hidden" name="accessKey" value="48af7162-a878-418b-9b78-2dff73892c37">
    <input type="hidden" name="redirectTo" value="">
        <label class="nome">Nome</label>
        <input class="field" placeholder="Seu nome" type="text" name="nome" id="nome">
        <label class="nome">E-mail</label>
        <input class="field" placeholder="Seu e-mail" type="email" name="email" id="email">
        <label class="nome">Telefone</label>
        <input class="field" placeholder="Seu telefone" type="tel" name="telefone" id="telefone">
        <label class="nome">Assunto</label>
        <select class="field" name="assunto" id="assunto">
            <option selected disabled value="">---</option>
            <option  value="Desenvolvimento de app">Desenvolvimento de app</option>
            <option  value="Consultoria">Consultoria</option>
            <option  value="Educação">Educação</option>
            <option  value="Instalação">Instalação</option>
            <option  value="Suporte">Suporte</option>
            <option  value="Trabalhe conosco">Trabalhe conosco</option>
        </select>
        <textarea class="field" placeholder="Digite sua mensagem." name="mensagem" id="mensagem" ></textarea>
        <input class="field" type="submit" value="Enviar">
  </form>
</div>

</main>
<footer class="rodape">
    <div class="contato-rodape">
    <h4 class="titulo-contatos">Contatos</h4>
    <Ul class="contatos-menu">
        <li>Fixo: (11)3486-6883/ 0800 486 688</li>
        <li>Celular: (11) 97595-1022</li>
        <li>Email: ecocompany.ltda.br@gmail.com</li>
    </Ul>
    </div>
    <p class="texto-rodape">
    Na Eco Company, não ignoramos os erros do passado, já aprendemos com eles. 
    E vamos utilizar as tecnologias do "futuro" para garantir o amanhã.</p>
    <div class="endereço-rodape" >
    <h4>Endereço</h4>
    <p>Rua Dr Rodrigo Silva, 58, Liberdade, São Paulo-SP. CEP: 01501-010</p>
    </div>
    </footer>
    <script src="https://kit.fontawesome.com/6aef9c25cc.js" crossorigin="anonymous"></script>
</body>
</html>
