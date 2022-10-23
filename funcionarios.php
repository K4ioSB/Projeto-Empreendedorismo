<?php
if (isset($_POST['email'])) {
    include('acesso.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
   
/* Essas duas linhas são para criptografia da senha e inserção no banco de dados, após isso retirar do codigo para o funcionamento.
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO usuarios (email, senha) VALUES('$email', '$senha')"); 
*/

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);
       
    $usuario = $sql_query->fetch_assoc();
    if(password_verify($senha, $usuario['senha'])){
        } else {
            echo "Você Não é um Funcionário"; die;
        }

    if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

        header("Location: trabalho.php");
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
            <a class="menu-item" href="./Contato.html">Contato</a>
            <a class="menu-item" href="./funcionarios.php">Entrar</a>
        </nav>
    </header>
    <main class="conteudo">
        <div class="login">
            <div class="header">
                <h1 class="titulo">Funcionarios</h1>
            </div>
            <form class="formulario" method="post">
                <label class="nome" for="">E-mail:</label>
                <input class="field" type="text" name="email" required>
                <label class="nome" for="">Senha:</label>
                <input class="field" type="password" name="senha" required>
                <button class="field" type="submit">Acessar</button>
            </form> 
                <h2 class="titulo2">Para trabalhar conosco:</h2>
                <p class="conteudo">Você pode nos mandar um email com seu curriculo anexado (Email da empresa localizado no rodape de todas as nossas paginas) ou por nosso formulário de contato (Basta clicar em 'Contato' no cabeçalho acima).</p>
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
</body>
</html>