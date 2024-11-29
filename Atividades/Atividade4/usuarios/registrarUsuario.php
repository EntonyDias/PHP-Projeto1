<?php
session_start();
include_once '../config/config.php';
include_once '../classes/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario($db);
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario->criar($nome, $sexo, $fone, $email, $senha);
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuário</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <div>

        <?php if (!isset($_SESSION['usuario_id'])) {
            echo "<a id='af' href='./login.php'>Voltar</a>";
         } else {
            echo "<a id='af' href='../gerenciar.php'>Voltar</a>";
         } ?>

        </div>
        <h1>Novo Usuário</h1>
    </header>
    <main>
        <form method="POST">
            <div id="ac">
                <input placeholder="nome" type="text" name="nome" required>
                <br><br>
                <label for="masculino">
                    <input type="radio" id="masculino" name="sexo" value="M" required> Masculino
                </label>
                <label for="feminino">
                    <input type="radio" id="feminino" name="sexo" value="F" required> Feminino
                </label>
                <br><br>
                <input placeholder="Telefone" type="text" name="fone" required>
                <br><br>
                <input placeholder="Email" type="email" name="email" required>
                <br><br>
                <input placeholder="Senha" type="password" name="senha" required>
                <br><br>
                <input id="ad" type="submit" value="Adicionar">
            </div>
        </form>
    </main>
</body>

<style>
    header {
        justify-content: center;
    }


    main {
        max-width: 80%;
        text-align: start;
        max-height: auto;
        margin: auto;
        justify-content: center;
    }

    .box {
        justify-content: center;
    }

    #ac {
        justify-content: center;
        text-align: center;
    }

    #ad {
        border: 3px solid;
        display: inline-block;
        min-width: 130px;
        min-height: 20px;
        justify-content: center;
        text-align: center;
    }

    input{
        text-align: center;
    }

    a {
        border: 3px solid;
        display: inline-block;
        min-width: 180px;
        min-height: 20px;
        justify-content: center;
        text-align: center;
    }
    
    #af{
        top: 5px;
        left: 5px;
        border: 3px solid;
        display: inline-block;
        min-width: 60px;
        min-height: 20px;
        justify-content: center;
        text-align: center;
        position:absolute;
        font-size:large;
    }

</style>

</html>