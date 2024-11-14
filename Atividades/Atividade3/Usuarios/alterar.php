<?PHP
include "../funcoes.php";
if (isset($_GET["editar"])) {
   $index = $_GET["editar"];
   $usuarios = carregarUsuarios("./usuarios.txt");
   if (isset($usuarios[$index])) {
      $usuarioAtual = $usuarios[$index]["usuario"];
      $senhaAtual = $usuarios[$index]["senha"];
   } else {
      echo "Usuário não encontrado!";
      exit;
   }
}

//processa alteração de usuario
if (  $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) 
      && isset($_POST["senha"]) 
     ) {
   //recebe
   $novoUsuario = $_POST["usuario"];
   $novaSenha = $_POST["senha"];
   var_dump($novoUsuario);
   //altera
   alterarUsuario($index, $novoUsuario, $novaSenha);
   header("Location: cadastro.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>alterar usuario</title>
</head>

<body>
   <h2>Alterar Usuario</h2>
   <form method="POST">
      <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuarioAtual);?>" required>

      <input type="password" name="senha" value="<?php echo htmlspecialchars($senhaAtual);?>" required>

      <button type="submit">Salvar Alterações</button>
   </form>
</body>

</html>