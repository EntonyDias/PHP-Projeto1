<?PHP
include "../funcoes.php";

if (isset($_GET["editarAgenda"])) {
   $index = $_GET["editarAgenda"];
   $peoples = carregarAgenda($_SESSION["rotaReal"]);
   if (isset($peoples[$index])) {
      $usuarioAtual = $peoples[$index]["usuario"];
      $telefoneAtual = $peoples[$index]["telefone"];
   } else {
      echo "Usuário não encontrado!";
      exit;
   }
}

//processa alteração de usuario
if (
   $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"])
   && isset($_POST["telefone"])
) {
   //recebe
   $novoUsuario = $_POST["usuario"];
   $novoTelefone = $_POST["telefone"];
   var_dump($novoUsuario);
   //altera
   alterarPeople($index, $novoUsuario, $novoTelefone);
   header("Location: agenda.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Editar Agenda</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>

<header style="background-color: black; padding: 30px">

      <h2>Alterar de Usuário</h2>

   </header>
   
   <form method="POST" style="margin-top: 30px;">
      <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuarioAtual); ?>" required>

      <input type="text" name="telefone" value="<?php echo htmlspecialchars($telefoneAtual); ?>" required>

      <button type="submit">Salvar Alterações</button>
   </form>
</body>

</html>