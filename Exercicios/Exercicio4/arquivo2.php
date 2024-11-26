<?php
echo '<h1>arquivo incluido!</h1>';
function exibirKDA()
{
   echo "Coisas";
}

function exibirKDAM($opc)
{
   if ($opc == 1) {
      echo "<h1>cabeçalho para supermercados</h1>";
   } else if ($opc == 2) {
      echo "<h1>cabeçalho para autopeças</h1>";
   } else {
      echo "<h1>cabeçalho versartil</h1>";
   }
}

function somar($num1, $num2)
{
   return ($num1 + $num2);
}

function desconto($num1, $descont)
{
   $total = $num1 - ($num1 * ($descont / 100));
   return $total;
}

class People
{
   public $nome; //public não precisa de getter e setter, php é top
   public $sobre;

   private $roupa;
   private $cor;

   //construtore 1
   // function __construct ($nome, $sobre){
   //    $this -> nome = $nome;
   //    $this -> sobre = $sobre;
   // }

   //construtor 2
   function __construct() {}

   //funções
   function exibirInfo()
   {
      return "<br>Nome: " . $this->nome . "<br> Sobrenome:" . $this->sobre . "<br>";
   }

   function setRoupa($roupa){$this->roupa = $roupa;}

   function setCor($cor) {$this->cor = $cor;}

   function getRoupa() {return $this-> roupa;}

   function getCor() {return $this-> cor;}

   function exibirPessoa(){
      return "Nome: ".$this->nome."<br>Sobrenome: ".$this->sobre."<br>Roupa: ".$this->roupa."<br>Cor: ". $this->cor;
   }
}
