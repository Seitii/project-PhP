<header>
    <h3>Atualizar Contatos</h3>
</header>

<?php
if (isset($_FILES['fotoCliente']) && $_FILES['fotoCliente']['error'] == 0) {
    $fotoCliente = $_FILES['fotoCliente'];

    if($fotoCliente['size'] > 5000000)
        die("A imagem deve ter no máximo 5MB.");

    $pasta = "pages/clientes/fotos-clientes/";
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($fotoCliente['name'], PATHINFO_EXTENSION));

    if(!in_array($extensao, array('jpg', 'png', 'jpeg', 'gif')))
        die("Extensão de arquivo de imagem inválida para o upload.");
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    if(move_uploaded_file($fotoCliente['tmp_name'], $path)){
        $fotoCliente = $novoNomeDoArquivo . '.' . $extensao;
    }else{
        die("Erro no upload da imagem.");
    }
} else {
    if (empty($fotoCliente)) {
        $sqlFotoAtual = "SELECT fotoCliente FROM contatos WHERE idCliente = '{$idCliente}'";
        $resultadoFotoAtual = mysqli_query($conexao, $sqlFotoAtual) or die("Erro ao buscar foto atual.");
        $dadosFotoAtual = mysqli_fetch_assoc($resultadoFotoAtual);
        $fotoCliente = $dadosFotoAtual['fotoCliente'];
    }
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

