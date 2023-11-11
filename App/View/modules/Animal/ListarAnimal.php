<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - Animal</title>
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
                    <p>Cadastro de Animal</p>
                </div>
            </div>

            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button id="adicionar" class="btn" data-bs-toggle="modal" data-bs-target="#modalAnimal">Adicionar</button>
                </div>

                <div class="containers-card">
                    <div class="container-table">
                        <!--<div class="loading-container d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>-->

                        <table id="tableAnimal" class="table table-bordered table-style off">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Raça</th>
                                    <th>Idade</th>
                                    <th>Sexo</th>
                                    <th>Cor</th>
                                    <th>Observacao</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($model->rows !== null) : ?>
                                    <?php foreach ($model->rows as $animal) : ?>
                                        <tr>
                                            <td><?= $animal->id ?></td>
                                            <td><?= $animal->nome_animal ?></td>
                                            <td><?= $animal->raca ?></td>
                                            <td><?= $animal->idade ?></td>
                                            <td><?= $animal->sexo ?></td>
                                            <td><?= $animal->cor ?></td>
                                            <td><?= $animal->observacao ?></td>
                                            <td class="actions-list">
                                                <box-icon name="edit" color="#E9410B" id="<?= $animal->id ?>" data-bs-toggle="modal" data-bs-target="#modalAnimal" class="btn-icon btn-edit"></box-icon>
                                                <box-icon name="trash" color="#E9410B" id="<?= $animal->id ?>" class="btn-icon btn-delete"></box-icon>
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
    <div class="modal fade" id="modalAnimal" tabindex="-1" role="dialog" aria-labelledby="modalAnimalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnimalTitle">Cadastrar Animal</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/animal/save">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <label for="txtNomeAnimal">Nome do animal:</label>
                        <input type="text" name="nome_animal" class="form-control" id="txtNomeAnimal" required maxlength="90">
                        <label for="txtRaca">Raça:</label>
                        <input type="text" name="raca" class="form-control" id="txtRaca" required>
                        <label for="txtIdade">Idade:</label>
                        <input type="number" name="idade" class="form-control" id="txtIdade" required>
                        <label for="txtSexo">Sexo:</label>
                        <input type="text" name="sexo" class="form-control" id="txtSexo" required>
                        <label for="txtCor">Cor:</label>
                        <input type="text" name="cor" class="form-control" id="txtCor" required>
                        <label for="txtObservacao">Observação:</label>
                        <input type="text" name="observacao" class="form-control" id="txtObservacao" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn" style="background-color: #E9410B;" id="adicionarAnimal">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.animal.js"></script>

</body>

</html>