<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - Serviços</title>
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
                    <p>Cadastro de Serviços</p>
                </div>
            </div>

            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button id="adicionar" class="btn" data-bs-toggle="modal" data-bs-target="#modalServico">Adicionar</button>
                </div>

                <div class="containers-card">
                    <div class="container-table">
                        <!--<div class="loading-container d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>-->

                        <table id="tableServico" class="table table-bordered table-style off">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($model->rows !== null) : ?>
                                    <?php foreach ($model->rows as $servico) : ?>
                                        <tr>
                                            <td><?= $servico->id ?></td>
                                            <td><?= $servico->descricao ?></td>
                                            <td class="actions-list">
                                                <box-icon name="edit" color="#E9410B" id="<?= $servico->id ?>" data-bs-toggle="modal" data-bs-target="#modalServico" class="btn-icon btn-edit"></box-icon>
                                                <box-icon name="trash" color="#E9410B" id="<?= $servico->id ?>" class="btn-icon btn-delete"></box-icon>
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
    <div class="modal fade" id="modalServico" tabindex="-1" role="dialog" aria-labelledby="modalServicoTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalServicoTitle">Cadastrar Serviço</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/servico/save">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <label for="txtDescricao">Descrição:</label>
                        <input type="text" name="descricao" class="form-control" id="descricao" required maxlength="90">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn" style="background-color: #E9410B;" id="adicionarServico">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.servico.js"></script>

</body>

</html>