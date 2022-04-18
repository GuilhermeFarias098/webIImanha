<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora MRU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <form action="process.php" method="POST">
            <section class="row">
                <article class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="initialPosition" class="form-label">Posição inicial</label>
                        <input type="number" class="form-control" id="initialPosition" name="initialPosition" required>
                    </div>
                </article>
                <article class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="velocity" class="form-label">Velocidade</label>
                        <input type="number" class="form-control" id="velocity" name="velocity" required>
                    </div>
                </article>
                <article class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="time" class="form-label">Tempo</label>
                        <input type="number" class="form-control" id="time" name="time" required>
                    </div>
                </article>
            </section>
            <section class="row">
                <article class="col-12 justify-content-center d-flex">
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </article>
            </section>
        </form>
        <?php
            session_start();
            if(!empty($_SESSION["msg_error"])):
        ?>
        <div class="alert alert-warning">
            <?= $_SESSION["msg_error"]; ?>
        </div>
        <?php endif; unset($_SESSION["msg_error"]) ?>
        <?php
            if(!empty($_SESSION["msg_success"])):
        ?>
        <div class="alert alert-success">
            <?= $_SESSION["msg_success"] ?>
        </div>
        <?php endif;  unset($_SESSION["msg_success"]) ?>
    </main>
</body>

</html>