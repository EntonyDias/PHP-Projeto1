<?PHP

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}

include_once '../config/config.php';
include_once '../classes/Noticia.php';

$noticia = new Noticia($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $dados_noticia = $noticia->leituraID($id);
    $data_publicacao = $_POST['dataRepublicacao'];
    $conteudo = $_POST['conteudo'];
    $imagem = $_FILES['imagem'];
    $autor = $_POST['autor'];
    $nomeImagem = "aaa";

      if ($imagem['error']===UPLOAD_ERR_OK){
         $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
         $tamanho = 10 * 1024 * 1024; //10mb
      
         $apagarImagem = pathinfo($imagem['name']);

         //validar tipos de arquivos
         $tiposPermitidos = ['jpg','jpeg','png'];
         if (!in_array($extensao, $tiposPermitidos)){
            die("Apenas arquivos JPG, JPEG e PNG são permitidas");
         } 
         if($imagem['size']>$tamanho){
            die("O tamanho do arquivo não pode execer 10MB");
         }

         //gerar nome único para o arquivo
         $nomeImagem = uniqid().".".$extensao;
         $destino = "../uploads/".$nomeImagem;

         //mover o arquivo para o diretório
         if (!move_uploaded_file($imagem['tmp_name'], $destino)){
            die ("erro ao salvar a imagem");
         } else if ($imagem['error'] !== UPLOAD_ERR_OK){
            die ("erro ao fazer upload da imagem");
         }
      } if (unlink("../uploads/".$dados_noticia['foto'])){
      } else {$nomeImagem = $dados_noticia['foto'];}

    $noticia->alterar($id, $titulo, $autor, $data_publicacao, $conteudo, $nomeImagem);
    header('Location: portal.php');
    exit();
}