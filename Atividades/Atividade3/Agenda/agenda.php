<?PHP
include "../funcoes.php";

if (isset($_SESSION['rotaAgenda'])) {
   $rotaReal = getcwd() . "/agendas/" . $_SESSION['rotaAgenda'];
   $_SESSION['rotaReal'] = $rotaReal;
}

if (isset($_GET["excluirAgenda"])) {
   $index = $_GET["excluirAgenda"];
   excluirPeople($index);
   header("Location:agenda.php");
   exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Agenda</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>
   <header style="background-color: black; padding: 30px;
   min-height:31px; max-height:31px">
      <a href="../index.php" style="position:fixed; left: 0; top: 0">Voltar</a>
      <h2>Agenda</h2>

      <?PHP
         if (
            $_SERVER["REQUEST_METHOD"] == "POST"
            && isset($_POST["usuario"])
            && isset($_POST["telefone"])
            && !empty($_POST["usuario"])
            && !empty($_POST["telefone"])
         ) {
            $novoUsuario = $_POST["usuario"];
            $novoTelefone = $_POST["telefone"];
         
            salvarPeople($novoUsuario, $novoTelefone);
            echo "<p>Usuário cadastrado com sucesso!</p>";
         }
      ?>

   </header>

         

   <form action="agenda.php" method="post" style="margin-top: 30px;">

   <div id="gryd">
      <!--usu-->
      <input type="text" name="usuario" id="usuario" placeholder="usuario" required>

      <!--senha-->
      <input type="number" name="telefone" id="telefone" placeholder="telefone" required>   
   </div>
   <!--botões-->
      <button type="submit">Cadastrar</button>
   </form>

   <?PHP listarPeoplesLinha(); ?>

   

</body>

</html>