<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link CSS -->
    <link rel="stylesheet" href="View/modules/Login/login.css">
    <title>Petshop - Login</title>
</head>

<body>
    <div class="container-login">
        <div class="img-box">
            <img src="View/assets/logo_teste.png">
        </div>
        <div class="content-box">
            <div class="form-box">
                <h2>Login</h2>
                <form action="/login/auth">
                    <div class="input-box">
                        <span>E-mail:</span>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
                    </div>

                    <div class="input-box">
                        <span>Senha:</span>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                    </div>

                    <div class="input-box">
                        <input type="submit" value="Entrar">
                    </div>

                    <div>
                        <?php if ($loginFailed == true) : ?>
                            <h6 style="color: red;">Falha no login, tente novamente!</h6>
                        <?php endif; ?>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>