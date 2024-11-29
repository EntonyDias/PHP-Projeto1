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
   <header>
      
      <?php echo "<p>$nome_usuario, agradecemos por atualizar o portal</p>";?>
      <div id="links">
      <a href="novaNoticia.php">Adicionar Noticia</a>
      <a href="../gerenciar.php">Voltar</a>
      <a href="../logout.php">Logout</a></header>
      </div>
   <main>

      

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
               <a id="ag" href="alterarNoticia.php?id=<?php echo $row['id']; ?>">Alterar</a>
               <a id="ag" href="excluirNoticia.php?id=<?php echo $row['id']; ?>">Excluir</a>
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

   * {
        margin: 0;
        padding: 0;
        color: purple;
    }

    main {
        text-align: center;
        justify-content: center;
        display: flex;
    }

    header {
        display: flex;
        background-color: black;
        justify-content: center;
        padding-bottom: 10px;
        margin-bottom: 8px;
        align-items: center;
        flex-direction: column;
    }

    a{
      border: 3px solid;
      display: inline-block;
      min-width: 180px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }

   #ag{
    border: 3px solid;
      display: inline-block;
      min-width: 80px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }

    #links{
        background-color: black;
        justify-content: center;
        text-align: center;
        padding: 8px;
    }

    table{
        border-color: purple;
    }


</style>

</html>