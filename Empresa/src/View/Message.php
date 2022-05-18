<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem do sistema</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
    <?php
    session_start();
    ?>
    <main class="container m-5 d-flex justify-content-center">
        <?php
        if (!empty($_SESSION["msg_success"])) :
        ?>
            <div class="card col-5 text-white bg-success">
                <div class="card-body">
                    <h4 class="card-title">Operação realizada com sucesso!!!</h4>
                    <p><?= $_SESSION["msg_success"] ?></p>
                </div>
                <div class="card-footer">
                    <a href="Dashboard.php" class="text-white">Voltar</a>
                </div>
            </div>
        <?php
        endif;
        unset($_SESSION["msg_success"]);
        ?>
        <?php
        if (!empty($_SESSION["msg_error"])) :
        ?>
            <div class="card col-5 text-white bg-danger">
                <div class="card-body">
                    <h4 class="card-title">OPS... Houve um erro inesperado!!!</h4>
                    <p><?= $_SESSION["msg_error"] ?></p>
                </div>
                <div class="card-footer">
                    <a href="../../index.html" class="text-white">Voltar</a>
                </div>
            </div>
        <?php
        endif;
        unset($_SESSION["msg_error"]);
        ?>
        <?php
        if (!empty($_SESSION["msg_verify_error"])) :
        ?>
            <div class="card col-5 text-white bg-warning">
                <div class="card-body">
                    <h4 class="card-title">Lamento, houveram alguns erros no formulário!!!</h4>
                    <ul>
                        <?php
                        foreach ($_SESSION["msg_verify_error"] as $msg) :
                        ?>
                            <li>
                                <?= $msg ?>
                            </li>
                        <?php
                        endforeach;
                        unset($_SESSION["msg_verify_error"]);
                        ?>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="../../index.html" class="text-white">Voltar</a>
                </div>
            </div>
        <?php
        endif;
        unset($_SESSION["msg_verify_error"]);
        ?>
    </main>
</body>

</html>