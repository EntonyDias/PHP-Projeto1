<?PHP
include "../funcoes.php";
//processa exclusão do usuario
if (isset($_GET["excluir"])) {
   $index = $_GET["excluir"];
   excluirUsuario($index);
   header("Location:lista.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lista de Usuarios</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>
   <header style="background-color: black; padding:15px">
      <a href="../index.php" style="position:fixed; left: 0;">Voltar</a>
      <h2>Usuários cadastrados</h2>
   </header>

   <?PHP listarUsuarios(); ?>

</body>

</html>