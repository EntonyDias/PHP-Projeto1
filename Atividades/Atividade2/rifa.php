<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Rifas</title>
   <link rel="stylesheet" href="style.css">
</head>
<a href="../../index.php">← Voltar</a>

<body>
   <?PHP
   $premio = $_POST['premio'];
   $data = $_POST['data'];
   $valor = $_POST['valor'];
   $quant = $_POST['quant'];

   echo "<main style='
      margin: auto; display:flex; overflow-wrap: break-word; flex-wrap: wrap; color: black;'>";

   for ($i = 1; $i <= $quant; $i++){
   
   echo "
      <div id='rifa' style='background-color: orchid;'>
      <div id='usu'>
         <p style='margin: 1px; padding: 0;'><strong>Nº ".sprintf("%08d",$i)."</strong></p>
         <p style='margin-top: 5px;'>Nome:<br>_______________</p>
         <p style='margin-top: 3px;'>Endereço:<br>_______________<br>_______________</p>
         <p style='margin-top: 3px;'>Fone:<br>_______________</p>
      </div>

      <div id='info'>
         <h3>Ação entre amigos</h3>
         <p>Prêmio: $premio</p>
         <p>Valor: $valor</p>
         <p>Data: $data</p>
         <p>Nº ".sprintf("%08d",$i)."</p>
      </div>
   </div> ";
   }

   

   echo "</main>";

   ?>
</body>

</html>