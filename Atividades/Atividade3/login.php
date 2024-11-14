<?PHP
include "funcoes.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $usuario = $_POST["usuario"];
   $senha = $_POST["senha"];
   $usuarioValido = false;

   //carrega os usuários do arquivo
   $usuarios = carregarUsuarios("./Usuarios/usuarios.txt");
  
   //verifica se o usuario e a senha estão no vetor de $usuarios

   foreach ($usuarios as $user) { 
      if ($user["usuario"] === $usuario && $user["senha"] === $senha) {
         $usuarioValido = true;
         break;
      }
    
   }

   if ($usuarioValido) {
      //define o cookie para o login por 5 minutos (300 segundos)
      setcookie("usuario_logado", $usuario, time() + 300, "/");
      header("Location:index.php");
      exit;
   } else {
      echo "Usuário ou senha incorreta";
   }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>
<body>
   <h2>Login de Usuário</h2>
   <form action="login.php" method="POST">
      <input type="text" name="usuario" id="usuario" placeholder="Digite seu Usuario" required>
      <input type="password" name="senha" id="senha" placeholder="Digite sua Senha" required>
      <button type="submit">Entrar</button>
      <button type="reset">Redefinir</button>
   </form>
   <a href="./Usuarios/cadastro.php">Não tem cadastro?</a>
</body>
</html>