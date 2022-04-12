<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem do sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
    <section class="container my-4">
        <?php
        session_start();
        if (isset($_SESSION["msg_error"])) : ?>
            <div class="alert alert-warning">
                <?= $_SESSION["msg_error"]; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION["msg_success"])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION["msg_success"]; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION["msg_validation_error"])) : ?>
            <div class="alert alert-warning">
                <ul>
                    <?php foreach ($_SESSION["msg_validation_error"] as $msg) : ?>
                        <li>
                            <?= $msg; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </section>
</body>

</html>
<?php
unset($_SESSION["msg_error"]);
unset($_SESSION["msg_success"]);
unset($_SESSION["msg_validation_error"]);
?>