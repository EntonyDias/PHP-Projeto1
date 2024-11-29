<?php
session_start();
include_once '../config/config.php';
include_once '../classes/Usuario.php';


$usuario = new Usuario($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        // Processar login
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        if ($dados_usuario = $usuario->login($email, $senha)) {
            $_SESSION['usuario_id'] = $dados_usuario['id'];
            header('Location: ../gerenciar.php');
            exit();
        } else {
            $mensagem_erro = "Credenciais inválidas!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Style.css">
</head>


<body>

    <header style="justify-content: center;">
        <h1>Login</h1>

        <a id="af" href="../index.php">Cancelar</a>
    </header>
    <div class="container">

        <div class="box"><br><br><br><br>
            <form method="POST">

                <div id="ac">
                    <label for="email">Email: </label><br>
                    <input type="email" name="email" placeholder="Email" required>
                </div><br><br>
                <div id="ac">
                    <label for="senha">Senha: </label><br>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>
                <br><br>

                <div id="ac">
                    <input id="ad" type="submit" name="login" value="Login">
                </div>
            </form>

            <div class="mensagem">
                <?php if (isset($mensagem_erro)) echo "<p id='ac'>". $mensagem_erro . "</p>"; ?>
            </div>
        </div><br><br>
        <p id="ac">Não tem uma conta? <a id="ae" href="./registrarUsuario.php">Registre-se aqui</a></p>
    </div>
</body>

<style>
    header {
        justify-content: space-between;
    }

    .container {
        max-width: 80%;
        text-align: start;
        max-height: auto;
        margin: auto;
        justify-content: center;
    }

    .box{
        justify-content: center;
    }

    #ac {
        justify-content: center;  
        text-align: center;  
    }

    #ad{
        border: 3px solid;
        display: inline-block;
        min-width: 180px;
        min-height: 20px;
        justify-content: center;
        text-align: center;
    }

    #ae{
        background-color: gray;
        color: magenta;
    }

    .mensagem{
        justify-content: center;
        display: flex;
        gap: 8px;
    }

    a{
      border: 3px solid;
      display: inline-block;
      min-width: 80px;
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