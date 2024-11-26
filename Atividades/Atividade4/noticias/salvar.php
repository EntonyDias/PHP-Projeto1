<?PHP
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}

   require_once "../classes/Noticia.php";
   require_once "../config/config.php";

   if($_SERVER['REQUEST_METHOD']==='POST'){
      $titulo = $_POST['titulo'];
      $autor = $_SESSION['usuario_id'];
      $noticia = $_POST['conteudo'];
      $data_publicacao = $_POST['dataPublicacao'];
      $imagem = $_FILES['imagem'];

      //validação do upload de imagem
      $nomeImagem = "";
      if ($imagem['error']===UPLOAD_ERR_OK){
         $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
         $tamanho = 10 * 1024 * 1024; //10mb
      
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

         $noticiaObjeto = new Noticia($db);
         $noticiaObjeto->salvarNoticia ($titulo, $autor,$data_publicacao, $noticia, $nomeImagem);
         echo "Noticia salva com sucesso!";
         echo "<br><a href='portal.php'>Voltar</a>";
      }
   }
?>