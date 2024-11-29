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
   <header>

      <div>
         <a id="af" href="./index.php">Noticias</a>
      </div>

      <div id="logout">
         <?php if (!isset($_SESSION['usuario_id'])) {
            echo "Você não deveria estar aqui!!!";
         } else {
            echo "<a id='af' href='./logout.php'>Logout</a>";
         } ?>
      </div>



   </header>
   <main>
      <h1>Gerenciador</h1>

      <a href="./usuarios/listaUsuarios.php">Gerenciar Usuarios</a>
      <a href="./noticias/portal.php">Gerenciar Noticias</a>

   </main>
</body>

<style>
   header{
      justify-content: space-between;
   }
   a {
      border: 3px solid;
      display: inline-block;
      min-width: 180px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }
   @media (max-width: 600px) {
   header{
   justify-content: space-between;
   }
   #af {
      border: 3px solid;
      display: inline-block;
      min-width: 130px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }
}
</style>

</html>