<!--Crud-->

<?PHP
//carregar ususarios do arquivo
function carregarUsuarios()
{
   //cria um vetor vazio
   $usuarios = [];

   //se tal arquivo existir
   if (file_exists("usuarios.txt")) {
      //$dados ta recebendo os dados dessa arquivo
      $dados = file(
         "usuarios.txt",
         // ?
         FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
      );
      
      foreach ($dados as $linha) {
         //lista o usuario e o sua senha
         list($usuario, $senha) = explode(":", $linha);
         //guarda os dados no vetor
         $usuarios[] = ["usuario" => $usuario, "senha" => $senha];
      }
   }
   return $usuarios;
}

//salvar um novo usuario no arquivo
function salvarUsuario($usuario, $senha)
{
   //contatena o usuario e a senha com o ":" no meio
   $linha = $usuario . ":" . $senha . PHP_EOL;
   //coloca o conteudo dentro de usuarios.txt
   file_put_contents("usuarios.txt", $linha, FILE_APPEND);
}

//listar usuarios cadastrados
function listarUsuarios() {
   //guarda os usuarios dentro de $usuarios
   $usuarios = carregarUsuarios();
   echo "<UL>";
   foreach ($usuarios as $index => $user) {
      echo "<li>".
      htmlspecialchars($user["usuario"] . " " . $user["senha"]). " "
      . "<a href='Exercicio5.php ? excluir=" . $index . "'>Excluir</a> | "
      . "<a href='alterar.php ? editar=" . $index . "'>Alterar</a>";
   ;}
   echo "</UL>";
}

//excluir usuarios
function excluirUsuario($index)
{
   $usuarios = carregarUsuarios();
   if (isset($usuarios[$index])) {
      unset($usuarios[$index]);
      file_put_contents("usuarios.txt", "");
      foreach ($usuarios as $user) {
         salvarUsuario($user["usuario"], $user["senha"]);
      }
   }
}

//alterar usuarios
function alterraUsuario($index, $novoUsuario, $novaSenha)
{
   $usuarios = carregarUsuarios();
   if (isset($usuarios[$index])) {
      $usuarios[$index] = ["usuarios" => $novoUsuario, "senha", $novaSenha];
      file_put_contents("usuarios.txt", "");
      foreach ($usuarios as $user) {
         salvarUsuario($user["usuario"], $user["senha"]);
      }
   }
}

?>