<?PHP 

class Noticia {

   private $conn;
   private $table_name = "tbnoticias";

   public function __construct($db){
      $this->conn = $db;
   }

   public function salvarNoticia($titulo, $autor, $data, $noticia, $foto){
      //pedido do comando
      $query = "INSERT INTO ". $this->table_name . " (titulo, autor, data, noticia, foto) VALUES (?, ?, ?, ?, ?)";
      //faz a conexão e prepara o pedido
      $stmt = $this->conn->prepare($query);
      //executa o pedido no banco, e passa os parametros para cada "?"
      $stmt->execute([$titulo, $autor, $data, $noticia, $foto]);
      //retorna true ou false do comando
      return $stmt;
   }

   public function leitura(){
      $query = "SELECT * FROM " . $this->table_name;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
   }

   public function leituraData(){
      $query = "SELECT * FROM " . $this->table_name . " ORDER BY data ASC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
   }

   public function leituraID($id){
      $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   public function alterar($id,$titulo,$autor,$data,$noticia,$foto){
      $query = "UPDATE ". $this->table_name . " SET titulo = ?, autor = ?, data = ?, noticia = ?, foto = ? WHERE id = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$titulo,$autor,$data,$noticia,$foto,$id]);
      return $stmt;
   }

   public function excluir($id){
      $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$id]);
      return $stmt;
   }

} 
?>