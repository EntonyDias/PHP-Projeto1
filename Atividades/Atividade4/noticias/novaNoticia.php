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
   <div class="container">

      <h1>Adicionar novas noticias</h1>

      <a href="./portal.php">Voltar</a>

      <form action="salvar.php" method="post" enctype="multipart/form-data">
         <input type="text" name="titulo" placeholder="Titulo" required>
        
        <input type="text" name="autor" value="<?php echo $row['autor']; ?>" hidden required>

         <!-- <select name="autor" required>
            <option value="">Selecionar o autor</option>
            <?// PHP foreach ($usuario as $usuarios):?>
         
            <option value="<// ?PHP echo $usuarios['id']; ?>">
               <?// PHP echo htmlspecialchars($usuarios['nome']); ?>
            </option>

            <?// PHP endforeach; ?>
         </select> -->

         <input type="date" name="dataPublicacao" required>
         <textarea name="conteudo" rows="30" cols="80" required></textarea>
         <input type="file" name="imagem" accept=".png, .jpg, .jpeg">
         <button type="submit">Salvar Noticia</button>

      </form>

   </div>
</body>

</html>