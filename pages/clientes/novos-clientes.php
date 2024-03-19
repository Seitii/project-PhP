<header>
    <h3><i class="bi bi-person-square"></i> Cadastro de Clientes</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=adicionar-clientes" method="post" enctype="multipart/form-data" novalidate>
        <div class="mb-3">
            <label class="form-label" for="nomeCliente">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input class="form-control" type="text" name="nomeCliente" required>
                <div class="valid-feedback">
                    Está correto.
                </div>
                <div class="invalid-feedback">
                   Campo obrigatório de no máximo 255 caracteres 
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailCliente">E-Mail</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control" type="email" name="emailCliente" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="telefoneCliente">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input class="form-control" type="text" name="telefoneCliente" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="fotoCliente">Foto</label>
            <input class="form-control" type="file" name="fotoCliente" accept="image/*" required>
        </div>
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>
