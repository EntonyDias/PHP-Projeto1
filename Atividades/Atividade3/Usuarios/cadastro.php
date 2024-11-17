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
   header("Location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro de usuarios</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>
   <header style="background-color: black; padding: 30px">
      <a href="../login.php" style="position:fixed; top: 0; left: 0; float:inline-start">Voltar</a>
      <h2>Cadastre um novo usuário</h2>
   </header>

   <form action="cadastro.php" method="post" style="margin-top: 30px;">

      <!--usu-->
      <input type="text" name="usuario" id="usuario" placeholder="Nome de usuario" required>
      <br>

      <!--senha-->
      <input type="password" name="senha" id="senha" placeholder="Senha para login" required>
      <br>
      <br>
      <!--botões-->
      <button type="submit">Cadastrar</button>
      <button type="reset">Redefinir</button>
   </form>



</body>

</html>