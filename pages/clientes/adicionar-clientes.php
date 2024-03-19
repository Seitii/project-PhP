<header>
    <h3>Inserir Contatos</h3>
</header>

<?php
$nomeCliente = mysqli_real_escape_string($conexao, $_POST['nomeCliente']);
$emailCliente = mysqli_real_escape_string($conexao, $_POST['emailCliente']);
$telefoneCliente = mysqli_real_escape_string($conexao, $_POST['telefoneCliente']);

if (isset($_FILES['fotoCliente'])){
    $fotoCliente = $_FILES['fotoCliente'];

    if($fotoCliente['error']){
        die("Erro no upload da imagem.");
    }
    if($fotoCliente['size'] > 5000000)
        die("A imagem deve ter no máximo 5MB.");

    $pasta = "pages/clientes/fotos-clientes/";
    $nomedoArquivo = $fotoCliente['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomedoArquivo, PATHINFO_EXTENSION));

    if(!in_array($extensao, array('jpg', 'png', 'jpeg', 'gif')))
        die("Extensão de arquivo de imagem inválida para o upload.");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($fotoCliente['tmp_name'],$path);
    if($deu_certo){
        $query = "INSERT INTO contatos (nomeCliente, emailCliente, telefoneCliente, fotoCliente) 
        VALUES ('$nomeCliente', '$emailCliente', '$telefoneCliente', '$novoNomeDoArquivo.$extensao')";
        $resultado = mysqli_query($conexao, $query) or die("Erro no banco de dados: " . mysqli_error($conexao));
        echo "Foto Enviada com Sucesso!";   
    }else
        echo "Erro no upload da imagem.";
}    

