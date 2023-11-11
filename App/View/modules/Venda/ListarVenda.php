<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - Agendamento</title>
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
                    <p>Agendamento</p>
                </div>
            </div>

            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button id="adicionar" class="btn" data-bs-toggle="modal" data-bs-target="#modalVenda">Adicionar</button>
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
                                    <th>Agendamento</th>
                                    <th>Nome_Cliente</th>
                                    <th>Nome_Animal</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($model->rows !== null) : ?>
                                    <?php foreach ($model->rows as $venda) : ?>
                                        <tr>
                                            <td><?= $venda->id ?></td>
                                            <td><?= $venda->agendamento ?></td>
                                            <td><?= $venda->nome_cliente ?></td>
                                            <td><?= $venda->nome_animal ?></td>
                                            <td class="actions-list">
                                                <box-icon name="edit" color="#E9410B" id="<?= $venda->id ?>" data-bs-toggle="modal" data-bs-target="#modalVenda" class="btn-icon btn-edit"></box-icon>
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
    <div class="modal fade" id="modalVenda" tabindex="-1" role="dialog" aria-labelledby="modalVendaTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVendaTitle">Cadastrar Venda</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/venda/save">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="input-container">
                            <label for="agendamento">Agendamento:</label><br>
                            <input type="date" name="agendamento" class="form-control" id="agendamento" required><br>
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
                            <label for="id_animal">Animal:</label><br>
                            <select class="selectpicker form-control" data-live-search="true" name="id_animal" id="id_animal">
                                <?php if ($model->lista_animal == null) : ?>
                                    <option class="option-evento" value="">Cadastre um animal primeiro!</option>
                                <?php else : ?>
                                    <option class="option-evento" value="">Selecione um animal</option>
                                    <?php foreach ($model->lista_animal as $animal) : ?>

                                        <option class="option-evento" value=<?= $animal->id ?>><?= $animal->nome_animal ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
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
    <script src="View/js/src/jquery.venda.js"></script>

</body>

</html>