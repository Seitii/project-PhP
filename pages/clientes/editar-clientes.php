<?php
$idCliente = $_GET['idCliente'];
$sql = "SELECT * FROM contatos WHERE idCliente = '{$idCliente}'";
$rs = mysqli_query($conexao,$sql) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));

$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>Editar Clientes</h3>
</header>
<div class="row">
<div class="col-6" >
    <form action="index.php?menuop=atualizar-clientes" method="post">
        <div class="mb-3 col-3">
            <label class="form-label" for="nomeCliente">ID</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-key-fill"></i>
                </span>
            <input class="form-control" type="text" name="idCliente" value="<?=$dados['idCliente']?>" readonly>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomeCliente">Nome</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>
                <input class="form-control" type="text" name="nomeCliente">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailCliente">E-Mail</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control" type="email" name="emailCliente">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="telefoneCliente">Telefone</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-telephone-fill"></i>
                </span>
                <input class="form-control" type="text" name="telefoneCliente">
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-warning" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>
<div class="col-6">
    <?php
       if($dados["fotoCliente"]=="" || !file_exists('pages/clientes/fotos-clientes/'. $dados["fotoCliente"])){
            $nomeFoto = "semfoto.png";
       }else{
            $nomeFoto = $dados["fotoCliente"];
       }
    ?>
    <div class="mb-3">
        <img width="580" src="pages/clientes/fotos-clientes/<?=$nomeFoto?>" alt="Foto do Contato">
    </div>

    <div class="mb-3">
        <button class="btn btn-info" id="btn-editar-foto">
            <i class="bi bi-camera-fill">
        </i> Editar Foto</button>
    </div>
    <div id="editar-foto">
        <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idCliente" value="<?=$idCliente?>">
        <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>
            <div class="input-group">
                <input class="form-control" type="file" name="arquivo" id="arquivo">
                <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
            </div>
        </form>
    </div>                
</div>
</div>