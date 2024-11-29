<?php
// Verificar se o usuário está logado
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}

include_once '../config/config.php';
include_once '../classes/Usuario.php';

$usuario = new Usuario($db);

// Obter dados do usuário logado
$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];
// Obter dados dos usuários
$dados = $usuario->ler();
// Função para determinar a saudação
function saudacao()
{
    $hora = date('H');
    if ($hora >= 6 && $hora < 12) {
        return "Bom dia";
    } elseif ($hora >= 12 && $hora < 18) {
        return "Boa tarde";
    } else {
        return "Boa noite";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios cadastrados</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><?php echo saudacao() . ", " . $nome_usuario; ?>!</h1>
        <section id="links">
            <a href="registrarUsuario.php">Adicionar Usuário</a>
            <a href="../gerenciar.php">Voltar</a>
            <a href="../logout.php">Logout</a>
        </section>
    </header>
        
    <main>
        <table border="3">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Fone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo ($row['sexo'] === 'M') ? 'Masculino' : 'Feminino'; ?></td>
                    <td><?php echo $row['fone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a id="ag" href="editarUsuario.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a id="ag" href="deletarUsuario.php?id=<?php echo $row['id']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </main>
</body>

</html>

<style>
    * {
        margin: 0;
        padding: 0;
        color: purple;
    }

    main {
        text-align: center;
        justify-content: center;
        display: flex;
    }

    header {
        display: flex;
        background-color: black;
        justify-content: center;
        padding-bottom: 10px;
        margin-bottom: 8px;
        align-items: center;
        flex-direction: column;
    }

    a{
      border: 3px solid;
      display: inline-block;
      min-width: 180px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }

   #ag{
    border: 3px solid;
      display: inline-block;
      min-width: 80px;
      min-height: 20px;
      justify-content: center;
      text-align: center;
   }

    #links{
        background-color: black;
        justify-content: center;
        text-align: center;
        padding: 8px;
    }

    table{
        border-color: purple;
    }

    @media (max-width: 600px){
        #links{
        background-color: black;
        justify-content: center;
        text-align: center;
        padding: 8px;
        align-items: center;
        flex-direction: column;
    }
    }

</style>