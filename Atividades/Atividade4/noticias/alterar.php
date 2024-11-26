<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}
include_once '../config/config.php';
include_once '../classes/Usuario.php';
include_once '../classes/Noticia.php';


$noticia = new Noticia($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $noticia->leituraID($id);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Noticia</title>
</head>
<body>
   <?php var_dump($row);?>
    <h1>Editar Noticia</h1>
    <form method="POST" action="teste.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
        
        <label for="dataRepublicacao">Data da republicação:</label>
        <input type="date" name="dataRepublicacao" value="<?php echo $row['data']; ?>" required>
       
        <label for="imagem">Foto:</label>
        <input type="file" name="imagem" accept=".png, .jpg, .jpeg">

        <textarea name="conteudo"><?php echo $row['noticia']; ?></textarea>

        <input type="submit" value="Alterar">
    </form>
</body>
</html>
