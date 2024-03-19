<header>
    <h3><i class="bi bi-person-square"></i>Clientes</h3>
</header>    
<div>
    <a class="btn btn-secondary mb-2" href="index.php?menuop=novos-clientes"><i class="bi bi-person-plus-fill"></i> Novo contato</a>
</div>
<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa">
            <button class="btn btn-success btn-sm" type="submit"><i class="bi bi-search"></i>Pesquisar</button>
        </div>
    </form>
</div>
<div class="tabela">
    <table class="table table-dark table-hover table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql  = "SELECT idCliente, UPPER(nomeCliente) as nomeCliente, LOWER(emailCliente) as emailCliente,telefoneCliente, fotoCliente FROM contatos";
        $rs = mysqli_query($conexao, $sql) or die("Erro na seleção de dados" . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
            echo '<tr>';
            echo '<td>' . $dados['idCliente'] . '</td>';
            if (!empty($dados['fotoCliente'])) {
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($dados['fotoCliente']) . '" alt="Foto do cliente" style="width: 100px; height: auto;"></td>';
            } else {
                echo '<td><img src="pages/clientes/foto-clientes" alt="Sem foto" style="width: 100px; height: auto;"></td>';
            }
            echo '<td>' . htmlspecialchars($dados['nomeCliente'], ENT_QUOTES, 'UTF-8') . '</td>';
            echo '<td>' . htmlspecialchars($dados['emailCliente'], ENT_QUOTES, 'UTF-8') . '</td>';
            echo '<td>' . htmlspecialchars($dados['telefoneCliente'], ENT_QUOTES, 'UTF-8') . '</td>';
            echo '<td class="text-center"><a class="btn btn-danger btn-sm" href="index.php?menuop=excluir-clientes&idCliente=' . $dados['idCliente'] . '"><i class="bi bi-trash-fill"></i></a></td>';
            echo '<td class="text-center"><a class="btn btn-warning btn-sm" href="index.php?menuop=editar-clientes&idCliente=' . $dados['idCliente'] . '"><i class="bi bi-pencil-square"></i></a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>