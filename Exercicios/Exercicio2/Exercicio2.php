<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercicio2</title>
</head>

<body>
   <h1>Deixe seu Feedback</h1>
   <form method="POST">
      <label for="mensagem">
         Sua mensagem
      </label><br>
      <textarea id="mensagem" name="mensagem" rows="3" cols="50" placeholder="Escreva aqui..."></textarea>
      <br>
      <br>
      <input type="submit" value="Enviar">
   </form>

   <?PHP
      //Verifica se o form foi enviado e se o campo da mensagem não esta vazia
         //Se ouver uma requisição do tipo "post" => $_SERVER["REQUEST_METHOD"]=="POST"
      if ($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["mensagem"])){

         //Exibe a mensagem enviada
         $mensagem= htmlspecialchars($_POST["mensagem"]);

         echo"<p><strong>Você escreveu: </strong>$mensagem</p>";
      }
      //Verifica se o campo mensagem não esta vazio
      else if(empty($_POST["mensagem"])){
         echo"<p><strong>O campo esta vazio!</strong><br>Envie uma mensagem usando o formulário acima!</p>";
      }

      $rota = "../index.php";
      echo "<a href=".$rota.">Voltar</a><br>";
   ?>

</body>

</html>