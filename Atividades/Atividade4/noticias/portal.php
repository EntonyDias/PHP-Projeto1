<?PHP
session_start();
include_once '../config/config.php';
include_once '../classes/Noticia.php';
include_once '../classes/Usuario.php';

if (!isset($_SESSION['usuario_id'])) {
   header('Location: ../index.php');
   exit();
}

$noticia = new Noticia($db);
$usuario = new Usuario($db);

$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];

$dados_noticia = $noticia->leitura();

echo "$nome_usuario, queremos agradecer por manter o portal sempre atualizado";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Portal</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>
   <header></header>
   <main>

      <a href="novaNoticia.php">Adicionar Noticia</a>
      <a href="../gerenciar.php">Voltar</a>
      <a href="../logout.php">Logout</a>

      <table border='1'>
         <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Data</th>
            <th>Foto</th>
            <th>Ações</th>
         </tr>


      <?PHP while ($row = $dados_noticia->fetch(PDO::FETCH_ASSOC)) : ?>
         <tr>
            <td><?PHP echo $row['id'] ?></td>
            <td><?PHP echo $row['titulo'] ?></td>
            <td><?PHP $nomeAutor = $usuario->lerPorId($row['autor']);
            echo $nomeAutor['nome'];?></td>
            <td><?PHP echo $row['data'] ?></td>
            <td><?PHP echo "<img src='../uploads/".$row['foto']."' alt='Foto da noticia:".$row['titulo']. "'>"  ?></td>
            <td>
               <a href="alterarNoticia.php?id=<?php echo $row['id']; ?>">Alterar</a>
               <a href="excluirNoticia.php?id=<?php echo $row['id']; ?>">Excluir</a>
            </td>
         </tr>
      <?PHP endwhile; ?>         

      </table>

   </main>
   <footer></footer>
</body>

<style>
   img{
      width: 88px;
   }
</style>

</html>