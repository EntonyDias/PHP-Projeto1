<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}
include_once '../config/config.php';
include_once '../classes/Noticia.php';


$notica = new Noticia($db);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $notica->excluir($id);
    header('Location: portal.php');
    exit();
}
?>
