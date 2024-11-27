<?PHP
   session_start();
   if (!isset($_SESSION['usuario_id'])) {
       header('Location: ./index.php');
       exit();
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gerenciador</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <header></header>
   <main>
   <h1>Gerenciador</h1>
   <a href="./index.php">Voltar</a>
   <a href="./usuarios/listaUsuarios.php">Gerenciar Usuarios</a>
   <a href="./noticias/portal.php">Gerenciar Noticias</a>

   </main>
</body>
</html>