<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercicio4</title>
</head>

<body> <a href="../../index.php">← Voltar</a>
   <?PHP
   include 'arquivo2.php'; //puxa o arquivo e se não tiver, ele continua rodando
   // require 'arquivo2.php'; puxa o arquivo e se não tiver, ele não vai continuar
   // include 'arquivo8.php'; puxa o arquivo mas não tem, ele continua rodando
   // require 'arquivo8.php'; puxa o arquivo mas não tem, ele não vai continuar
   echo "<h2>continuação!</h2>";
   exibirKDA();
   exibirKDAM(0);
   exibirKDAM(1);
   exibirKDAM(2);

   echo "<br>A soma é:" . somar(8, 6);

   $total = desconto(1820, 50);
   echo "<br>Desconto é: $total"; //assim não precisa concatenar

   //construtor 1
   $pessoa = new People("Lily", "Purple");
   echo $pessoa -> exibirInfo();
   $pessoa -> nome = "Lillie"; //mudando o valor de um atributo
   echo $pessoa -> exibirInfo();

   //construtor 2
   $pessoa -> nome = "Lily";
   $pessoa -> sobre = "Lillie";
   $pessoa -> setRoupa("Lulu");
   $pessoa -> setCor("Purple");

   echo $pessoa->nome;
   echo $pessoa->sobre;
   echo $pessoa->getRoupa();
   echo $pessoa->getCor();

   ?>
</body>

</html>