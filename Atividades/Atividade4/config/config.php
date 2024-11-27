<?php
   //ini_set('display_errors', 0);
   @include_once '../classes/Database.php'; 
   @include_once './classes/Database.php';
   $database = new Database(); 
   $db = $database->getConnection();
?> 