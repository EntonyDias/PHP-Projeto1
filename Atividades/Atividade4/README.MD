# Criação de Agendas com Autenticação

## Sobre o Projeto

O **Portal de Notícias** é um projeto que visa a criação de noticias criadas pelos própios usuários, sendo um site responsivo e de fácil uso para o usuário.

Este projeto utiliza **HTML**, **CSS** e **PHP** para criar uma experiência interativa e fluida.

## Visão Geral

### Estrutura do Projeto e Pastas

- **index.php**: Pagina principal das noticias
- **logout.php**: Desloga o usuario
- **gerenciar.php**: Rota para gerenciar os usuarios ou noticias

- **classes/**: Pasta com as classes
- **classes/Usuario.php**: classe Usuario
- **classes/Database.php**: classe Banco de dados
- **classes/Noticia.php**: Classe Noticia

- **config/config.php**: Configura a conexão com o banco de dados
- **uploads/**: Pasta com as fotos das noticias
- **usables/**: Pasta com as fotos utilizadas no site

- **noticias/**: Pasta responsável por todas as telas de gerenciamento de noticias (CRUD)
- **noticias/alterar.php**: Altera a tabela de noticias no banco de dados
- **noticias/alterarNoticia.php**: Tela de alterar noticia
- **noticias/excluirNoticia.php**: Exclui a tabela de noticias no banco de dados
- **noticias/novaNoticia**: Tela de criar uma nova noticia
- **noticias/portal.php**: Lista todas as noticias da tabela noticias no banco de dados
- **noticias/salvar.php**: Salva na tabela de noticias no banco de dados

- **usuarios/**: Pasta responsável por todas as telas de gerenciamento do usuario (CRUD)
- **usuarios/deletarUsuario.php**: Exclui a tabela de usuarios no banco de dados
- **usuarios/listaUsuarios.php**: Lista todos os usuarios na tabela usuario no banco de dados
- **usuarios/login**: Loga o usuario, consultando o banco de dados
- **usuarios/registrarUsuario.php**: Salva na tabela de usuarios no banco de dados

## Pré-requisitos

- **Git**: Para clonar o repositório.
- **Navegador**: Google Chrome, Firefox, Safari, etc., para visualizar o site.
- **Editor de Código**: Recomendamos o Visual Studio Code ou o Sublime Text.
- **Software**: Ter o apache ligado no seu sistema

## Tecnologias Utilizadas

As tecnologias e ferramentas utilizadas neste projeto são:

- **HTML5**: Estruturação semântica e organizada.
- **CSS3**: Estilos visuais e layout responsivo.
- **PHP**: Validação de formulários e construtor automatico da estrutura.

## Desenvolvedor

- Aluno: [Entony]
- Contato: [entonydias07@gmail.com]
