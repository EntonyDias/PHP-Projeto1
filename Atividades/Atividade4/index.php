<?PHP
session_start();
include_once './config/config.php';
include_once './classes/Noticia.php';
include_once './classes/Usuario.php';

$noticia = new Noticia($db);
$usuario = new Usuario($db);

$dados_noticia = $noticia->leitura();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Noticias</title>
</head>
<body>
   <header>

      <a href="./usuarios/login.php">Login</a>

   </header>
   <main>

   <main>

<?PHP while ($row = $dados_noticia->fetch(PDO::FETCH_ASSOC)): ?>

      <?PHP echo $row['titulo'] ?>
   
      <?PHP $nomeAutor = $usuario->lerPorId($row['autor']);   
      echo $nomeAutor['nome'];?>
   
      <?PHP echo $row['data'] ?>
   
      <?PHP echo "<img src='./uploads/".$row['foto']."' alt='Foto da noticia:".$row['titulo']. "'>"  ?>
   
      <?PHP echo $row['noticia'];?>

<?PHP endwhile; ?>    

   </main>
   <footer></footer>
</body>

<style>
   img{
      width: 80px;
   }
</style>

</html>