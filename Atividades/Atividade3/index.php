<?PHP
if (isset($_COOKIE['usuario_logado'])) {
   $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
   header("Location:login.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercicio5</title>
</head>

<body>
   <h1>Bem-Vindo(a)! <?PHP echo "$usuario" ?></h1>
   <p>Você está autenticado no sistema</p>
   <form action="logout.php" method="POST">
      <button type="submit">Sair</button>
   </form>
</body>

</html>