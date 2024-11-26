<?PHP
   $rota = ("../index.php");
   echo "<a href=".$rota.">Voltar</a><br>";
   echo "Olá, Mundo!"; //saida
   $nome = "lily"; //variavel
   $sobrenome = "purple"; //variavel
   echo "<br> $nome $sobrenome"; //saida

   $name = "lily"; //string
   $number = 8; //integer
   $numero = 3.3; //float
   $verdade = true; //boolean
   
   $numeroInt = (int) $numero; //converte o float para integer
   $numeroFloat = (float) $number; //converte o integer para float
   $numeroString = (string) $numero; //converte o float para string
   //existe mais, faz oque achar melhor

   echo "<br>$numeroInt $numeroFloat $numeroString<br>"; //saida de teste

   //array
   $nomes = array("lily", "purple", 8, 3.3, true);
   echo "$nomes[1] "; //exibe tudo
   echo "$nomes[3] "; //exibe o numero 3.3
   echo "$nomes[0] "; //exibe o primeiro nome
?>