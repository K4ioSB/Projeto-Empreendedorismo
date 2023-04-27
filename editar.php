<?php
session_start();
include('acesso.php');

include("protecao.php");

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "ID inválido.";
  exit;
}

$id = $_GET['id'];


$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $nome = $row['NOME'];
  $email = $row['EMAIL'];
  $senha = $row['SENHA'];
  $cargo = $row['CARGO'];
  $datanasc = $row['DATANASC'];
  $salário = $row['SALÁRIO'];
  $setor = $row['SETOR'];
} else {
  echo "Usuário não encontrado.";
  exit;
}


if (isset($_POST['editar'])) {
  $nome = $_POST['NOME'];
  $email = $_POST['EMAIL'];
  $cargo = $_POST['CARGO'];
  $datanasc = $_POST['DATANASC'];
  $salário = $_POST['SALÁRIO'];
  $setor = $_POST['SETOR'];

  $sql = "UPDATE usuarios SET NOME = '$nome', EMAIL = '$email', CARGO = '$cargo', DATANASC = '$datanasc', SALÁRIO = '$salário', SETOR = '$setor' WHERE id = $id";
  if (mysqli_query($conn, $sql)) {
    echo "Usuário atualizado com sucesso.";
  } else {
    echo "Erro ao atualizar usuário: " . mysqli_error($conn);
  }

  header("Location: funcionarios.php");

  mysqli_close($conn);
}

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
  <h1>Editar usuário</h1>

  <form action="" method="POST">
    Nome: <input type="text" name="NOME" value="<?php echo $nome; ?>" required><br>
    Email: <input type="email" name="EMAIL" value="<?php echo $email; ?>" required><br>
    Setor: <input type="text" name="SETOR" value="<?php echo $setor; ?>" required><br>
    Cargo: <input type="text" name="CARGO" value="<?php echo $cargo; ?>" required><br>
    Salário: <input type=type="text" name="SALÁRIO" value="<?php echo $salário; ?>" required><br>
    Data Nascimento: <input type="text" name="DATANASC" value="<?php echo $datanasc; ?>" required><br>
    <input type="submit" name="editar" value="Atualizar">
  </form>
</main>
</body>
</html>
