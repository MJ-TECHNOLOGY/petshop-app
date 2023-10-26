<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop - Venda</title>
    <?php include 'View/includes/css_config.php' ?>
    <link rel="stylesheet" href="View/modules/Venda/venda.css">
</head>
<body>

    <?php include 'View/includes/navbar.php' ?>
    
    <div class="main-container">
        <div class="container-card">
            <div class="header-card">
                <div class="text-container-header-card d-flex justify-content-center">
                    <h4>Cadastro de Vendas</h4>
                </div>
            </div>

            <div class="main-card">
                <div class="containers-card buttons-container">
                    <form class="form-add-cliente" method="post">
                        <div class="input-container">
                            <label for="txtDataVenda">Data da Venda: </label><br>
                            <input class="form-control" type="date" name="data_venda" id="data_venda">
                        </div>
                        <div class="input-container select-container">
                            <label for="id_cliente">Cliente:</label><br>
                            <select class="selectpicker bg-light form-control" name="id_cliente" id="id_cliente">
                                <option value="">Selecione o cliente</option>
                                <?php foreach ($model->lista_cliente as $cliente) : ?>
                                    <option value="<?= $cliente->id ?>"><?= $cliente->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-container select-container">
                            <label for="quantidade">Animal:</label><br>
                            <select class="selectpicker bg-light form-control" name="id_animal" id="id_animal">
                                <option value="">Selecione o animal</option>
                                <?php foreach ($model->lista_animal as $animal) : ?>
                                    <option value="<?= $animal->id ?>"><?= $animal->nome_animal ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-container">
                            <button type="button" class="btn" style="background-color: #1e82f4;" id="adicionarProduto">Salvar Registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'View/includes/js_config.php' ?>
    <!--<script src="View/js/src/jquery.cliente.js"></script>-->

</body>
</html>