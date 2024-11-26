<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercicio3</title>
</head>

<body> <a href="../../index.php">Voltar</a><br>
   <h1>Calculadora de Produtos</h1>
   <form action="./script.php" method="POST">
      <label for="produto">Informe o Produto</label><br>
      <input type="text" name="produto" required><br>
      <label for="quantidade">Informe a quantidade</label><br>
      <input type="number" step="1.0" name="quantidade" required> <br>
      <label for="valorunit">Informe a quantidade</label><br>
      <input type="number" name="valorunit" step="0.1" required><br><br>
      <input type="submit" value="Calcular">
   </form>
</body>

</html>