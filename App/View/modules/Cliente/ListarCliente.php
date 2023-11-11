<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - Cliente</title>
    <?php include 'View/includes/css_config.php' ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
</head>

<body>

    <!-- Navbar -->
    <?php include 'View/includes/navbar.php' ?>

    <div class="main-container">
        <div class="container-card">
            <div class="header-card">
                <div class="text-container-header-card">
                    <p>Cadastro de Clientes</p>
                </div>
            </div>

            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button id="adicionar" class="btn" data-bs-toggle="modal" data-bs-target="#modalCliente">Adicionar</button>
                </div>

                <div class="containers-card">
                    <div class="container-table">
                        <!--<div class="loading-container d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>-->

                        <table id="tableCliente" class="table table-bordered table-style off">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Data_Nasc</th>
                                    <th>Telefone</th>
                                    <th>Logradouro</th>
                                    <th>Numero</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>CEP</th>
                                    <th>Referência</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($model->rows !== null) : ?>
                                    <?php foreach ($model->rows as $cliente) : ?>
                                        <tr>
                                            <td><?= $cliente->id ?></td>
                                            <td><?= $cliente->nome ?></td>
                                            <td><?= $cliente->cpf ?></td>
                                            <td><?= $cliente->data_nascimento ?></td>
                                            <td><?= $cliente->telefone ?></td>
                                            <td><?= $cliente->logradouro ?></td>
                                            <td><?= $cliente->numero ?></td>
                                            <td><?= $cliente->bairro ?></td>
                                            <td><?= $cliente->cidade ?></td>
                                            <td><?= $cliente->cep ?></td>
                                            <td><?= $cliente->ponto_referencia ?></td>
                                            <td class="actions-list">
                                                <box-icon name="edit" color="#E9410B" id="<?= $cliente->id ?>" data-bs-toggle="modal" data-bs-target="#modalCliente" class="btn-icon btn-edit"></box-icon>
                                                <box-icon name="trash" color="#E9410B" id="<?= $cliente->id ?>" class="btn-icon btn-delete"></box-icon>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    Nenhum registro.
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalClienteTitle">Cadastrar Cliente</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/cliente/save">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <label for="txtNome">Nome:</label>
                        <input type="text" name="nome" class="form-control" id="nome" required maxlength="90">
                        <label for="txtEmail">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <label for="txtCPF">CPF:</label>
                        <input type="number" name="cpf" class="form-control" id="cpf" required>
                        <label for="txtDataNascimento">Data Nascimento:</label>
                        <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" required>
                        <label for="txtTelefone">Telefone:</label>
                        <input type="number" name="telefone" class="form-control" id="telefone" required>
                        <label for="txtLogradouro">Logradouro:</label>
                        <input type="text" name="logradouro" class="form-control" id="logradouro" required>
                        <label for="txtNumero">Nº:</label>
                        <input type="number" name="numero" class="form-control" id="numero" required>
                        <label for="txtBairro">Bairro:</label>
                        <input type="text" name="bairro" class="form-control" id="bairro" required>
                        <label for="txtCidade">Cidade:</label>
                        <input type="text" name="cidade" class="form-control" id="cidade" required>
                        <label for="txtCEP">CEP:</label>
                        <input type="number" name="cep" class="form-control" id="cep" required>
                        <label for="txtReferencia">Ponto de Referência:</label>
                        <input type="text" name="ponto_referencia" class="form-control" id="ponto_referencia" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn" style="background-color: #E9410B;" id="adicionarCliente">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.cliente.js"></script>

</body>

</html>