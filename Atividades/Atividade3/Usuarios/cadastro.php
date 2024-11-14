<?PHP

include "../funcoes.php";

//processa cadastro de usuario
//filtro
if (
   $_SERVER["REQUEST_METHOD"] == "POST"
   && isset($_POST["usuario"])
   && isset($_POST["senha"])
   && !empty($_POST["usuario"])
   && !empty($_POST["senha"])
) {

   //recebe
   $novoUsuario = $_POST["usuario"];
   $novaSenha = $_POST["senha"];

   salvarUsuario($novoUsuario, $novaSenha);
   echo "Usuário cadastrado com sucesso!";
}

//processa exclusão do usuario
if (isset($_GET["excluir"])) {
   $index = $_GET["excluir"];
   excluirUsuario($index);
   header("Location:cadastro.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro de usuarios</title>
</head>

<body>
   <h2>Cadastre um novo usuário</h2>
   <form action="cadastro.php" method="post">

      <!--usu-->
      <input type="text" name="usuario" id="usuario" placeholder="usuario" required>
      <br>

      <!--senha-->
      <input type="password" name="senha" id="senha" placeholder="senha" required>
      <br>

      <!--botões-->
      <button type="submit">Cadastrar</button>
      <button type="reset">Redefinir</button>
   </form>

   <h3>Usuários cadastrados</h3>
   <?PHP listarUsuarios(); ?>
   <a href="../login.php">Voltar</a>

</body>

</html>