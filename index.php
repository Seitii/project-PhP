<?php
include('db/conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Sistema Agendamentos</title>
    
</head>
<body>
    <header class="bg-dark">
        <div class="container">
        <h1>Controle de Clientes</h1>
        <nav class="navbar navbar-expand lg navbar-dark bg-dark" >
            <a class="navbar-brand" href"#">
                <img src="  pages/clientes/fotos-clientes/logoo.png" alt="Logo" width="120" height="50" class="d-inline-block align-top">
            </a>

            <div class="collpase navbar-collapse" id="conteudo-navbar">
                <ul class="navbar-nav mr-uto">
                    <li class="nav-item "><a class="nav-link" href="index.php?menuop=clientes">Clientes</a></li>
                </ul>
            </div>
        </nav>
        </div>
    </header>

    <main>
        <div class="container">
    <?php
        $menuop = (isset($_GET['menuop']) ? $_GET['menuop'] : 'clientes' ); 
        switch($menuop){
            case 'clientes':
                include("pages/clientes/clientes.php");
                break;
            case 'novos-clientes':
                include('pages/clientes/novos-clientes.php');
                break;
            case 'adicionar-clientes':
                include('pages/clientes/adicionar-clientes.php');
                break;
            case 'editar-clientes':
                include('pages/clientes/editar-clientes.php');
                break;
            case 'excluir-clientes':
                include('pages/clientes/excluir-clientes.php');
                break;    
            case 'atualizar-clientes':
                include('pages/clientes/atualizar-clientes.php');
                break;
            default:
                include('pages/clientes/clientes.php');
                break;
        }
    ?>
    </div>    
    </main>
    <footer class="container-fluid fixed-bottom bg-dark">
        <div class="text-center">
            Cadastro de Clientes
        </div>
    </footer>
    <script src="js/validacao.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <script src="jquery.form.js"></script>    
</body>
</html>