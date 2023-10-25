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
                    <form class="form-add-product" method="post">
                        <div class="input-container">
                            <label for="txtDataVenda">Data da Venda: </label><br>
                            <input class="form-control" type="date" name="data_venda" id="data_venda">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>