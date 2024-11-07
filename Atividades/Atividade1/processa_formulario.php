<?php
$rota = "Atividade0.html";
echo "<a href=" . $rota . ">Voltar</a><br>";
if (
   isset($_POST["nome"]) && isset($_POST["dataNasc"]) &&
   isset($_POST["altura"]) && isset($_POST["peso"]) && 
   isset($_POST["sexo"]) &&

   !empty($_POST["nome"]) && !empty($_POST["dataNasc"]) &&
   !empty($_POST["altura"]) && !empty($_POST["peso"]) &&
   !empty($_POST["sexo"])
) {
   $nome = $_POST['nome'];
   $altura = $_POST['altura'];
   $peso = $_POST['peso'];
   $sexo = $_POST['sexo'];
   $imc = $peso / ($altura*2);
   $result = "Ocorreu algum erro para ao calcular seu resultado";
   if($imc > 0 && $imc <= 18.5 ){
      $result = "Você esta abaixo do peso";
   } else if ($imc <= 25.9){
      $result = "O teu peso esta normal";
   }else if ($imc <= 29.9){
      $result = "Você esta obeso";
   } else {
      $result = "Você esta muito obeso";
   }

   $dataNasc = $_POST['dataNasc'];
   //maneira de extrair uma parte da data
   $anoNasc = date("y", strtotime($dataNasc));
   $mesNasc = date("m", strtotime($_POST['dataNasc']));
   $diaNasc = date("d", strtotime($_POST['dataNasc']));

   $dataRecebida = new DateTime($dataNasc);
   $dataAtual = new DateTime();
   $idade = $dataRecebida -> diff($dataAtual) -> y;

   echo "Nome: " . $dataNasc . "<br>Altura: " . $altura . "<br>Peso: " . $peso . "<br>Sexo: " . $sexo .
   "<br>Idade: " . $idade . "<br>Data de Nascimento: " . $diaNasc . "/" . $mesNasc . "/" . $anoNasc .
   "<br>IMC: ".$imc. "<br>" . $result;
} else {
   echo "Não foi preenchido corretamente";
}
