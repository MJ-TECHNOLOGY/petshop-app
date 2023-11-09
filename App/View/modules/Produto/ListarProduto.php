<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - Produto</title>
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
                    <p>Cadastro de Produtos</p>
                </div>
            </div>

            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button id="adicionar" class="btn" data-bs-toggle="modal" data-bs-target="#modalProduto">Adicionar</button>
                </div>

                <div class="containers-card">
                    <div class="container-table">
                        <!--<div class="loading-container d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>-->

                        <table id="tableProduto" class="table table-bordered table-style off">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Categoria</th>
                                    <th>Marca</th>
                                    <th>Preço</th>
                                    <th>Peso</th>
                                    <th>Código</th>
                                    <th>Data_Validade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($model->rows !== null) : ?>
                                    <?php foreach ($model->rows as $produto) : ?>
                                        <tr>
                                            <td><?= $produto->id ?></td>
                                            <td><?= $produto->descricao ?></td>
                                            <td><?= $produto->categoria?></td>
                                            <td><?= $produto->marca ?></td>
                                            <td><?= $produto->preco ?></td>
                                            <td><?= $produto->peso ?></td>
                                            <td><?= $produto->codigo ?></td>
                                            <td><?= $produto->data_validade ?></td>
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
    <div class="modal fade" id="modalProduto" tabindex="-1" role="dialog" aria-labelledby="modalProdutoTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProdutoTitle">Cadastrar Produto</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/produto/save">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="id_categoria">Categoria:</label><br>
                            <select class="selectpicker form-control" data-live-search="true" name="id_categoria" id="id_categoria">
                                <?php if ($model->lista_categoria == null) : ?>
                                    <option class="option-evento" value="">Cadastre uma categoria primeiro!</option>
                                <?php else : ?>
                                    <option class="option-evento" value="">Selecione uma categoria</option>
                                    <?php foreach ($model->lista_categoria as $categoria) : ?>
                                        <option class="option-evento" value=<?= $categoria->id ?>><?= $categoria->descricao ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="descricao">Descrição:</label><br>
                            <input type="text" name="descricao" class="form-control" id="descricao" required><br>
                        </div>
                        <div class="input-container">
                            <label for="marca">Marca:</label><br>
                            <input type="text" name="marca" class="form-control" id="marca" required><br>
                        </div>
                        <div class="input-container">
                            <label for="preco">Preço:</label><br>
                            <input type="number" name="preco" class="form-control" id="preco" required><br>
                        </div>
                        <div class="input-container">
                            <label for="peso">Peso:</label><br>
                            <input type="number" name="peso" class="form-control" id="peso" required><br>
                        </div>
                        <div class="input-container">
                            <label for="codigo">Código:</label><br>
                            <input type="number" name="codigo" class="form-control" id="codigo" required><br>
                        </div>
                        <div class="input-container">
                            <label for="data_validade">Data de validade:</label><br>
                            <input type="date" name="data_validade" class="form-control" id="data_validade" required><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn" style="background-color: #1e82f4;" id="adicionarProduto">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.produto.js"></script>

</body>

</html>