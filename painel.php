<?php
session_start();
include("protecao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='icon' type='image/png' href="./img/Logo_02_Fundo_Transparente.png">
  <link rel="stylesheet" href="./css/csspainel.css">
  <title>Painel</title>
</head>

<body>
  <header class="cabecalho">
    <img class="logo" src="./img/Logo_02_Fundo_Transparente.png" alt="">

    <nav class="menu">
      <a class="menu-item" href="./index.html">Inicio</a>
      <a class="menu-item" href="./sobrenos.html">Sobre nós</a>
      <a class="menu-item" href="./contato.php">Contato</a>
      <a class="menu-item" href="./funcionarios.php">Entrar</a>
      <a class="menu-item" href="./cadastro.php" >Cadastrar</a>
    </nav>
  </header>
  <main class="conteudo">
      <div>
        <h3 class="titulo">Bem vindo(a) <?php echo $_SESSION['NOME']; ?>.</h3>
        <div>
          <img height="auto" width="350" style="margin-left: 12%; border: 2px solid black;" src="<?php echo $_SESSION['path']; ?>" alt="">
        </div>
        <div >
          <ul >
          <li>Setor: <?php echo $_SESSION['SETOR'];?></li>
          <li>Cargo: <?php echo $_SESSION['CARGO'];?></li>
          <li>Salário: <?php echo $_SESSION['SALÁRIO'];?></li>
          <li>Data Nascimento: <?php echo $_SESSION['DATANASC'];?></li> 
          <li>Id de funcionário: <?php echo $_SESSION['ID'];?></li>
          </ul>
      </div>
        <?php
        include('acesso.php');
        
        $sql = "SELECT * FROM usuarios WHERE ID = " . $_SESSION['ID'];
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<td><a href='editar.php?id=" . $row["ID"] . "'>Editar</a> - ";
          echo "<a href='excluir.php?id=" . $row["ID"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a></td>";
          echo "</tr>";
        }

        mysqli_close($conn);
        ?>
      </div>
      <button class="conteudo-principal-botao"><a class="botao" href="logout.php">Sair</a></button>
  </main>

</body>

</html
