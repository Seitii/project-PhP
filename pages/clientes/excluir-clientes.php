<header>
    <h3>Excluir Clientes</h3>
</header>

<?php
    $idCliente = mysqli_real_escape_string($conexao, $_GET['idCliente']);
    $sql = "DELETE FROM contatos WHERE idCliente = '{$idCliente}'";

mysqli_query($conexao, $sql) or die("Erro na exclusão de dados" . mysqli_error($conexao));
echo "O Contato foi excluído com sucesso!";
?>

