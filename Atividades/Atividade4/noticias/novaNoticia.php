<?PHP
session_start();
if (!isset($_SESSION['usuario_id'])) {
   header('Location: ../index.php');
   exit();
}

include_once '../config/config.php';
include_once '../classes/Usuario.php';

try {
   $usuario = new Usuario($db);
   $usuario = $usuario->listarTodos();
} catch (Exception $e) {
   die("Erro: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Noticias</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>

   <header>

      <?php if (!isset($_SESSION['usuario_id'])) {
         echo "<a id='af' href='../login.php'>Voltar</a>";
      } else {
         echo "<a id='af' href='./portal.php'>Voltar</a>";
      } ?>

      <h1>Nova noticia</h1>
   </header>


   <main>
      <form action="salvar.php" method="post" enctype="multipart/form-data">
         <div id="ac">
            <input type="text" name="titulo" placeholder="Titulo" required>
            <input type="text" name="autor" value="<?php echo $row['autor']; ?>" hidden required>
            <br><br>
            <input type="date" name="dataPublicacao" required>
            <br><br>
            <input type="file" name="imagem" accept=".png, .jpg, .jpeg">
            <br><br>
            <textarea placeholder="Escreva sua noticia" name="conteudo" rows="8" cols="0" required></textarea>
            <br><br>
            <button id="ad" type="submit">Salvar Noticia</button>
         </div>
      </form>
   </main>

</body>

<style>
   header {
      justify-content: center;
   }


   main {
      max-width: 80%;
      text-align: start;
      max-height: auto;
      margin: auto;
      justify-content: center;
   }

   .box {
      justify-content: center;
   }

   #ac {
      justify-content: center;
      text-align: center;
   }

   #ad {
      border: 3px solid;
      display: inline-block;
      min-width: 130px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }

   input {
      text-align: center;
   }

   a {
      border: 3px solid;
      display: inline-block;
      min-width: 180px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }

   #af {
      top: 5px;
      left: 5px;
      border: 3px solid;
      display: inline-block;
      min-width: 60px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
      position: absolute;
      font-size: large;
   }

   textarea {
      width: 800px;
      max-width: 80%;
      height: 300px;
   }

</style>

</html>