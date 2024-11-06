<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercicio1</title>
</head>

<body>
   <header>
      <a href="../index.php">Voltar</a>
   </header>

   <main>

      <form action="#" method="post">
         <input type="text" name="nome" id="nome" placeholder="Apenas seu primeiro nome" maxlength="50" required>
         <input type="password" name="senha" id="senha" placeholder="Coloque uma senha forte" maxlength="50" required>
         <input type="number" name="idade" id="idade" placeholder="Coloque sua Idade" required>
         <input type="number" name="altura" step="0.1" id="altura" placeholder="Coloque sua altura" required>
         <input type="email" name="email" id="email" placeholder="Coloque seu email" required>
         <input type="URL" name="site" id="site" placeholder="site?" required>
         <input type="date" name="data" id="data" required>
         <input type="time" name="hora" id="hora" required>
         <input type="submit" name="enviar" id="enviar" required>
         <input type="reset" name="redefinir" id="redefinir" required>
      </form>

   </main>

</body>

</html>