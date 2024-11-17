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
if (
   $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"])
   && isset($_POST["senha"])
) {
   //recebe
   $novoUsuario = $_POST["usuario"];
   $novaSenha = $_POST["senha"];
   var_dump($novoUsuario);
   //altera
   alterarUsuario($index, $novoUsuario, $novaSenha);
   header("Location: lista.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>alterar usuario</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>

   <header style="background-color: black; padding: 30px">
      <h2>Alterar Usuario</h2>
   </header>


   <form method="POST" style="margin-top: 30px;">
      <input type="text" name="usuario" placeholder="Novo nome"
      value="<?php echo htmlspecialchars($usuarioAtual); ?>" required>

      <input type="password" name="senha" placeholder="Nova senha"
      value="<?php echo htmlspecialchars($senhaAtual); ?>" required>

      <button type="submit">Salvar Alterações</button>
   </form>
</body>

</html>