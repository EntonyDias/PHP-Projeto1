<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercicio3 Script</title>
</head>

<body>
   <?PHP
   if (
      //verifica se existe essas variaveis
      isset($_POST["produto"]) && isset($_POST["quantidade"]) && isset($_POST["valorunit"]) &&
      //verifica se as caixas estão vazias
      !empty($_POST["produto"]) && !empty($_POST["quantidade"]) && !empty($_POST["valorunit"])
   ) {
      $produto=ucfirst($_POST["produto"]);
      $quantidade=(int)$_POST["quantidade"];
      $valorunit=(float)$_POST["quantidade"];
      $total=$quantidade*$valorunit;
      echo "O produto: $produto custa R$ $valorunit<br>";
      if($quantidade < 2){
      echo "$quantidade produto foi comprado<br>";
      } else {echo "$quantidade produtos foram comprados<br>";}
      echo "O valor total é: R$$total<br>";
   } else {
      echo "Os dados não foram fornecidos corretamente!";
   }
   ?>
</body>

</html>