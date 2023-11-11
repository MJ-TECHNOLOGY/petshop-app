<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - Venda Produto</title>
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
                    <p>Venda Produto</p>
                </div>
            </div>

            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button id="adicionar" class="btn" data-bs-toggle="modal" data-bs-target="#modalVendaProduto">Adicionar</button>
                </div>

                <div class="containers-card">
                    <div class="container-table">
                        <!--<div class="loading-container d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>-->

                        <table id="tableVenda" class="table table-bordered table-style off">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome_Cliente</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Unitário</th>
                                    <th>Total</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($model->rows !== null) : ?>
                                    <?php foreach ($model->rows as $venda) : ?>
                                        <tr>
                                            <td><?= $venda->id ?></td>
                                            <td><?= $venda->nome_cliente ?></td>
                                            <td><?= $venda->descricao ?></td>
                                            <td><?= $venda->quantidade ?></td>
                                            <td>R$ <?= $venda->preco ?></td>
                                            <td>R$ <?= $venda->valor_total ?></td>
                                            <td class="actions-list">
                                                <box-icon name="edit" color="#E9410B" id="<?= $venda->id ?>" data-bs-toggle="modal" data-bs-target="#modalVendaProduto" class="btn-icon btn-edit"></box-icon>
                                                <box-icon name="trash" color="#E9410B" id="<?= $venda->id ?>" class="btn-icon btn-delete"></box-icon>
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
    <div class="modal fade" id="modalVendaProduto" tabindex="-1" role="dialog" aria-labelledby="modalVendaTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVendaTitle">Cadastrar Venda Produto</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/venda_produto/save">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="input-container">
                            <label for="data_venda">Data da Venda:</label><br>
                            <input type="date" name="data_venda" class="form-control" id="data_venda" required><br>
                        </div>
                        <div class="mb-3">
                            <label for="id_cliente">Cliente:</label><br>
                            <select class="selectpicker form-control" data-live-search="true" name="id_cliente" id="id_cliente">
                                <?php if ($model->lista_cliente == null) : ?>
                                    <option class="option-evento" value="">Cadastre um cliente primeiro!</option>
                                <?php else : ?>
                                    <option class="option-evento" value="">Selecione um cliente</option>
                                    <?php foreach ($model->lista_cliente as $cliente) : ?>
                                        <option class="option-evento" value=<?= $cliente->id ?>><?= $cliente->nome ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_produto">Produto:</label><br>
                            <select class="selectpicker form-control" data-live-search="true" name="id_produto" id="id_produto" onchange="definirPreco()">
                                <?php if ($model->lista_produto == null) : ?>
                                    <option class="option-evento" value="">Cadastre um produto primeiro!</option>
                                <?php else : ?>
                                    <option class="option-evento" value="">Selecione um produto</option>
                                    <?php foreach ($model->lista_produto as $produto) : ?>
                                        <option class="option-evento" value="<?= $produto->id ?>" data-preco="<?= $produto->preco ?>">
                                            <?= $produto->descricao ?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="preco">Preço:</label><br>
                            <input type="text" name="preco" class="form-control" id="preco" readonly>
                        </div>
                        <div class="input-container">
                            <label for="quantidade">Quantidade:</label><br>
                            <input type="number" name="quantidade" class="form-control" id="quantidade" onchange="calculoValorTotal()" required><br>
                        </div>                       
                        <div class="input-container">
                            <label for="valor_total">Valor Total:</label><br>
                            <input type="number" name="valor_total" class="form-control" id="valor_total" readonly><br>
                        </div>                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn" style="background-color: #E9410B;" id="adicionarVenda">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.venda.produto.js"></script>

</body>

</html>