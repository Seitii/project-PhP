<header>
    <h3>Atualizar Contatos</h3>
</header>

<?php
    if (isset($_POST['fotoCliente'])) {
        $fotoCliente = mysqli_real_escape_string($conexao, $_POST['fotoCliente']);
    } else {
        $fotoCliente = ''; 
    }

    $idCliente = mysqli_real_escape_string($conexao, $_POST['idCliente']);
    $nomeCliente = mysqli_real_escape_string($conexao, $_POST['nomeCliente']);
    $emailCliente = mysqli_real_escape_string($conexao, $_POST['emailCliente']);
    $telefoneCliente = mysqli_real_escape_string($conexao, $_POST['telefoneCliente']);

    $sql  = "UPDATE contatos SET
    nomeCliente = '{$nomeCliente}',
    emailCliente = '{$emailCliente}',
    telefoneCliente = '{$telefoneCliente}',
    fotoCliente = '{$fotoCliente}'
    WHERE idCliente = {$idCliente}";

    mysqli_query($conexao, $sql) or die("Erro na atualização de dados" . mysqli_error($conexao));
    echo "O Contato foi atualizado com sucesso!";
?>
