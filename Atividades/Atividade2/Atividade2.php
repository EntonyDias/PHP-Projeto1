<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gerador de rifa</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <!--CABECALHO-->
   <header>
      <a href="../../index.php">← Voltar</a>
      <h1 id="titulo">Gerador de rifa</h1>
   </header>
   <!--MONTAGEM DA RIFA-->
   <main>
      <form action="./rifa.php" method="POST">
         <!--premio-->
         <label for="premio">Premio</label>
         <input type="text" name="premio" id="premio" maxlength="30" placeholder="Nome do prêmio" required>

         <!--data-->
         <br>
         <label for="data">Data</label>
         <input type="date" name="data" id="data" value="2024-12-30" required>

         <!--valor-->
         <br>
         <label for="valor">Valor</label>
         <input type="number" name="valor" id="valor" step="1.0" required>

         <!--quantidade-->
         <br>
         <label for="premio">Quantidade de Nº</label>
         <input type="number" name="quant" id="quant" placeholder="Quantidade de rifas" required>

         <!--botões-->
         <br>
         <input type="submit" value="Gerar">
         <input type="reset" value="Refazer">
      </form>
   </main>
   <script src="script.js"></script>
</body>

</html>