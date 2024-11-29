<?PHP
session_start();

include_once './config/config.php';
include_once './classes/Noticia.php';
include_once './classes/Usuario.php';

$noticia = new Noticia($db);
$usuario = new Usuario($db);

$dados_noticia = $noticia->leituraData();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Noticias</title>
   <link rel="stylesheet" href="./style.css">
</head>

<body>
   <header>

      <div id="login">

         <?php if (!isset($_SESSION['usuario_id'])) {
            echo "<a id='aa' href='./usuarios/login.php'>Fazer login</a>";
         } else {
            echo "<a id='aa' href='./gerenciar.php'>Gerenciar</a>";
         } ?>

      </div>



      <div id="lgname">
         <img id="img" src="./usables/logo.png" alt="Logo">
         <p id="esconder">    </p>
         <h1>P<img id="imgt" src="./usables/logo.png" alt="Logo">rtal</h1>
      </div>

      <div id="logout">
         <?php if (!isset($_SESSION['usuario_id'])) {
            echo "<a id='aa' href='./usuarios/login.php'>Não esta logado!</a>";
         } else {
            echo "<a href='./logout.php'>Logout</a>";
         } ?>
      </div>

   </header>

   <main>

      <?PHP while ($row = $dados_noticia->fetch(PDO::FETCH_ASSOC)): ?>
         <section id="Noticia">

            <div>
               <h1 style="margin: 3px;">
                  <?PHP echo $row['titulo'] ?></h1>
            </div>

            <div id="infos" style='margin: 3px;'>
               <div>
                  <?PHP echo "<img src='./uploads/" . $row['foto'] . "' alt='Foto da noticia:" . $row['titulo'] . "'>"  ?>
               </div>

               <div>
                  <div>
                     <h3>Autor: 
                        <?PHP $nomeAutor = $usuario->lerPorId($row['autor']);
                        echo $nomeAutor['nome']; ?></h3>
                  </div>
                  <div>
                     <h3> Publicado: 
                        <?PHP echo $row['data'] ?></h3>
                  </div>
               </div>


            </div>

            <div>
               <p style="margin: 3px;">
                  <?PHP echo $row['noticia']; ?></p>
            </div>

         </section><br>
      <?PHP endwhile; ?>

   </main>
   <footer></footer>
</body>

<style>

   #ab {
      padding: 10px;
   }

   #lgname {
      display: flex;
   }

   #imgt {
      width: 25px;
      display: hidden;
   }

   #img {
      width: 50px;
   }

   img {
      width: 80px;
      margin: 0;
      padding: 0;
   }

   #infos {
      display: flex;
      border-bottom: solid;
      border-top: solid;
      padding-left: 5px;
   }

   #Noticia {
      border-style: solid;
      max-width: 80%;
      text-align: start;
      max-height: auto;
      margin: auto;
   }

   a{
      border: 3px solid;
      display: inline-block;
      min-width: 180px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }

   @media (max-width: 600px) {

#img,
#esconder {
   display: none;
}

header{
   justify-content: space-between;
}

a{
border: 0 solid;
display: flex;
min-width: 0;
min-height: 0;
justify-content: center;
text-align: center;
}
}

</style>

</html>