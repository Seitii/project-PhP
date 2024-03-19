<header>
    <h3>Inserir Contatos</h3>
</header>

<?php
$nomeCliente = mysqli_real_escape_string($conexao, $_POST['nomeCliente']);
$emailCliente = mysqli_real_escape_string($conexao, $_POST['emailCliente']);
$telefoneCliente = mysqli_real_escape_string($conexao, $_POST['telefoneCliente']);

if (isset($_FILES['fotoCliente']) && $_FILES['fotoCliente']['error'] === UPLOAD_ERR_OK) {
    $fotoCliente_tmp = $_FILES['fotoCliente']['tmp_name'];
    $fotoClienteContent = file_get_contents($fotoCliente_tmp); 

    $sql = "INSERT INTO contatos (nomeCliente, emailCliente, telefoneCliente, fotoCliente) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, 'sssb', $nomeCliente, $emailCliente, $telefoneCliente, $fotoClienteContent);

    mysqli_stmt_execute($stmt) or die("Erro na inserção de dados" . mysqli_error($conexao));
    echo "O Contato foi inserido com sucesso!";
} else {
    echo "Erro no upload da imagem.";
}
?>
