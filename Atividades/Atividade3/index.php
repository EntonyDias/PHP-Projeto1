<?PHP
include "funcoes.php";

if (isset($_COOKIE['usuario_logado'])) {
   $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
   header("Location:login.php");
   exit;
} ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Atividade 3</title>
   <link rel="stylesheet" href="./style.css">
</head>

<body>
   <form action="logout.php" method="POST" style="position:fixed; left: 0;">
      <button type="submit" id="botaoLogout">Logout</button>
   </form>
   <a href="./Usuarios/lista.php" style="position:fixed; right: 0;">lista de usuarios cadastrados</a>
   
   <header style="background-color: black;">
      <div>
         <h2 style="padding: 15px;">Bem-Vindo(a)! <?PHP echo "$usuario" ?></h2>
         <p>Você está autenticado no sistema!</p>
      </div>
   </header>

   <?PHP
   if (
      $_SERVER["REQUEST_METHOD"] == "POST"
      && isset($_POST["agendaNome"]) && !empty($_POST["agendaNome"])
   ) {
      $nomeAgenda = $_POST["agendaNome"] . ".txt";
      novaAgenda($nomeAgenda);
   }

   if (
      $_SERVER["REQUEST_METHOD"] == "POST"
      && isset($_POST["agendaApagar"]) && !empty($_POST["agendaApagar"])
   ) {
      $nomeAgenda = $_POST["agendaApagar"] . ".txt";
      deletarAgenda($nomeAgenda);
   }

   if (
      $_SERVER["REQUEST_METHOD"] == "POST"
      && isset($_POST["agendaAbrir"]) && !empty($_POST["agendaAbrir"])
   ) {
      $nomeAgenda = $_POST["agendaAbrir"] . ".txt";
      session_start();
      $_SESSION['rotaAgenda'] = $nomeAgenda;
      header("Location:Agenda/agenda.php");
   }
   ?>

   <br>


   <form action="index.php" method="POST">
      <input type="text" name="agendaNome" id="agendaNome" placeholder="Nova Agenda" required>
      <button type="submit">Criar</button>
   </form>
   <?PHP
   echo "<ul id='listarAgenda'>";
   foreach (listarAgenda() as $nomeAgenda) {
      echo "<li id='lista'>
      <h3>$nomeAgenda</h3>" . "
      <div id='botoesIndex'>
      <form action='index.php' method='POST'>
      <input type='text' name='agendaAbrir' id='agendaAbrir'
         value=" . $nomeAgenda . " hidden required>
         <button type='submit'>Abrir</button>
      </form>
         
      <form action='index.php' method='POST'>
         <input type='text' name='agendaApagar' id='agendaApagar'
         value=" . $nomeAgenda . "   hidden required>
         <button type='submit'>Apagar</button>
      </form> </div><br>
      </li>";
   };
   echo "</ul>";
   ?>


</body>

</html>