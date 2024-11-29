<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}
include_once '../config/config.php';
include_once '../classes/Usuario.php';


$usuario = new Usuario($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $usuario->atualizar($id, $nome, $sexo, $fone, $email);
    header('Location: listaUsuarios.php');
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $usuario->lerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <div>
            <a id="af" href="./listaUsuarios.php">Voltar</a>
        </div>
        <h1>Editar Usuario</h1>
    </header>
    <form method="POST">
        <div id="ac">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input placeholder="Nome" type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
            <br><br>
            <label for="masculino_editar">
                <input type="radio" id="masculino_editar" name="sexo" value="M" <?php echo ($row['sexo'] === 'M') ? 'checked' : ''; ?> required> Masculino
            </label>
            <label for="feminino_editar">
                <input type="radio" id="feminino_editar" name="sexo" value="F" <?php echo ($row['sexo'] === 'F') ? 'checked' : ''; ?> required> Feminino
            </label>
            <br><br>
            <input placeholder="Telefone" type="text" name="fone" value="<?php echo $row['fone']; ?>" required>
            <br><br>
            <input placeholder="Email" type="email" name="email" value="<?php echo $row['email']; ?>" required>
            <br><br>
            <input id="ad" type="submit" value="Atualizar">
        </div>
    </form>
</body>

<style>
    header {
        justify-content: center;
    }

    input {
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

    #af {
        top: 5px;
        left: 5px;
        border: 3px solid;
        display: inline-block;
        min-width: 60px;
        min-height: 20px;
        justify-content: center;
        text-align: center;
        position: absolute;
        font-size: large;
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
</style>

</html>