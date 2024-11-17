<!--Crud-->

<?PHP

session_start();

//carregar ususarios do arquivo
function carregarUsuarios(string $rota)
{
   //cria um vetor vazio
   $usuarios = [];

   //se tal arquivo existir
   if (file_exists("$rota")) {
      //$dados ta recebendo os dados dessa arquivo
      $dados = file(
         "$rota",
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
   $file = "./usuarios.txt";
   //coloca o conteudo dentro de usuarios.txt
   file_put_contents($file, $linha, FILE_APPEND);
}

//listar usuarios cadastrados
function listarUsuarios()
{
   //guarda os usuarios dentro de $usuarios
   $usuarios = carregarUsuarios("./usuarios.txt");

   echo "<UL id='ListaUsuarios'>";
   foreach ($usuarios as $index => $user) {
      echo "<li id='listaUsuarios'>" .
         htmlspecialchars("Usuário: " . $user["usuario"]) . "<br>" .
         htmlspecialchars("Senha: " . $user["senha"]) . "<br>"
         . "<a href='./lista.php ? excluir=" . $index . "'>Excluir</a> | "
         . "<a href='./alterar.php ? editar=" . $index . "'>Alterar</a>
         </li>";
   }
   echo "</UL>";
}

//excluir usuarios
function excluirUsuario($index)
{
   $usuarios = carregarUsuarios("./usuarios.txt");
   if (isset($usuarios[$index])) {
      unset($usuarios[$index]);
      file_put_contents("./usuarios.txt", "");
      foreach ($usuarios as $user) {
         salvarUsuario($user["usuario"], $user["senha"]);
      }
   }
}

//alterar usuarios
function alterarUsuario($index, $novoUsuario, $novaSenha)
{
   $usuarios = carregarUsuarios("./usuarios.txt");
   if (isset($usuarios[$index])) {
      $usuarios[$index] = ["usuario" => $novoUsuario, "senha" => $novaSenha];
      file_put_contents("./usuarios.txt", "");
      foreach ($usuarios as $user) {
         salvarUsuario($user["usuario"], $user["senha"]);
      }
   }
}
///////////////////////////////////////////////////////////////////////////////////////
/// AGENDA ///////// AGENDA ///////// AGENDA ///////// AGENDA ///////// AGENDA ///////
//////////////////////////////////////////////////////////////////////////////////////

// CRIAR AGENDA ////////
function novaAgenda($nomeAgenda)
{
   $caminho = getcwd() . "/Agenda/Agendas/" . "$nomeAgenda";
   $verificarAgendas = listarAgenda();

   if (!file_exists($caminho)) {
      $novaAgenda = fopen($caminho, "x");

      if (isset($novaAgenda)) {
         echo "<p>Agenda '$nomeAgenda' criada com sucesso!</p>";
      } else {
         echo "Erro ao criar a Agenda.";
      }
   } else {
      echo "<p>Já existe uma agenda com o mesmo nome</p>";
   }
}

// DELETAR AGENDA /////////
function deletarAgenda($nomeAgenda)
{
   $caminho = getcwd() . "/Agenda/Agendas/" . "$nomeAgenda";
   unlink($caminho);
}

// LISTAR AGENDA ////////
function listarAgenda()
{
   if (dir(getcwd() . "/Agenda/Agendas")) {
      $caminhoAgendas = dir(getcwd() . "/Agenda/Agendas");
      $listaAgenda = scandir(getcwd() . "/Agenda/Agendas");
      $result = [];

      foreach ($listaAgenda as $quantidade) {
         $removedorDeTxt = ".txt";
         $result[] .= str_replace($removedorDeTxt, "", $quantidade);
      }
      $result = array_diff($result, array(".", ".."));
      return $result;
   }
}

function salvarPeople($usuario, $telefone)
{
   //contatena o usuario e o telefone com o ":" no meio
   $linha = $usuario . ":" . $telefone . PHP_EOL;
   $file = $_SESSION['rotaReal'];
   //coloca o conteudo dentro da agenda atual
   file_put_contents($file, $linha, FILE_APPEND);
}

function carregarAgenda($rotaReal)
{
   $peoples = [];

   if (file_exists($rotaReal)) {

      $listaAgenda = file($rotaReal,  FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

      foreach ($listaAgenda as $linha) {
         list($usuario, $telefone) = explode(":", $linha);
         $peoples[] = ["usuario" => $usuario, "telefone" => $telefone];
      }
   }
   return $peoples;
}

function listarPeoples()
{
   $peoples = carregarAgenda($_SESSION["rotaReal"]);

   echo "<UL>";
   foreach ($peoples as $index => $user) {
      echo "<li id='listaAgenda'>" .
         htmlspecialchars("Usuário: " . $user["usuario"]) . "<br>" .
         htmlspecialchars("Telefone: " . $user["telefone"]) . "<br>"
         . "<a href='./agenda.php ? excluirAgenda=" . $index . "'><img src='../trash_icon.png' alt='Excluir'></a>"
         . "<a href='./alterarAgenda.php ? editarAgenda=" . $index . "'><img src='../pencil_icon.png' alt='Alterar'></a>
         </li>";
   }
   echo "</UL>";
}

function listarPeoplesLinha()
{  
   echo "<main>";

   $peoples = carregarAgenda($_SESSION["rotaReal"]);
   echo "<UL id='LinhaPeoples' class='Linhas'><h3 id='hande'>Nome:</h3>";
   foreach ($peoples as $index => $user) {
      echo "<li id='listaPeoples' class='lista'>" . "Usuário:<br>" . 
         htmlspecialchars($user["usuario"]) . "</li>";
   } echo "</UL>";
   

   echo "<UL id='linhaTelefonica' class='Linhas'><h3 id='hande'>Telefone:</h3>";
   foreach ($peoples as $index => $user) {
      echo "<li id='listaPeoples' class='lista'>" . "Telefone:<br>" . 
         htmlspecialchars($user["telefone"]) . "</li>";
   } echo "</UL>";


   echo "<UL id='linhaAcao' class='Linhas'><h3 id='hande'>Ações:</h3>";
   foreach ($peoples as $index => $user) {
      echo "<li id='listaAcao' class='lista'>"
         . "<a href='./agenda.php ? excluirAgenda=" . $index . "'><img src='../trash_icon.png' alt='Excluir'></a>"
         . "<a href='./alterarAgenda.php ? editarAgenda=" . $index . "'><img src='../pencil_icon.png' alt='Alterar'></a>
         </li>";
   } echo "</UL>";

   echo "</main>";
}

function alterarPeople($index, $novoUsuario, $novoTelefone)
{
   $peoples = carregarAgenda($_SESSION["rotaReal"]);
   if (isset($peoples[$index])) {
      $peoples[$index] = ["usuario" => $novoUsuario, "telefone" => $novoTelefone];
      file_put_contents($_SESSION["rotaReal"], "");
      foreach ($peoples as $user) {
         salvarPeople($user["usuario"], $user["telefone"]);
      }
   }
}

function excluirPeople($index)
{
   $peoples = carregarAgenda($_SESSION["rotaReal"]);
   if (isset($peoples[$index])) {
      unset($peoples[$index]);
      file_put_contents($_SESSION["rotaReal"], "");
      foreach ($peoples as $user) {
         salvarPeople($user["usuario"], $user["telefone"]);
      }
   }
}

?>