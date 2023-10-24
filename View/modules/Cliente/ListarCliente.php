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
                    <button id="adicionar" class="btn" data-bs-toggle="modal" data-bs-targer="#modalCliente">Adicionar</button>
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
                                                <box-icon name="edit" color="#e8ac07" id="<?= $cliente->id ?>" data-bs-toggle="modal" data-bs-target="#modalCliente" class="btn-icon btn-edit"></box-icon>
                                                <box-icon name="trash" color="#e8ac07" id="<?= $cliente->id ?>" class="btn-icon btn-delete"></box-icon>
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


    <?php include 'View/includes/js_config.php' ?>

</body>

</html>