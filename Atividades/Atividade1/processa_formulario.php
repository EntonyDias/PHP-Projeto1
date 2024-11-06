<?php
   $rota = "Atividade0.html";
   echo "<a href=".$rota.">Voltar</a><br>";

   $nome = $_POST['nome'];
   $idade = $_POST['idade'];
   $altura = $_POST['altura'];
   $peso = $_POST['peso'];
   
   echo "Nome: ".$nome."<br>Idade: ".$idade."<br>Altura: ".$altura."<br>Peso: ".$peso;
?>