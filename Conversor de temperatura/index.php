<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <?php
        session_start();
        if (!empty($_SESSION["msg_error"])) :
        ?>
            <div class="alert alert-warning">
                <?= $_SESSION["msg_error"] ?>
            </div>
        <?php endif;
        unset($_SESSION["msg_error"]) ?>
        <?php
        if (!empty($_SESSION["msg_value"])) :
        ?>
            <div class="alert alert-info">
                <?= $_SESSION["msg_value"] ?>
            </div>
        <?php endif;
        unset($_SESSION["msg_value"]) ?>
        <form action="conversor.php" method="get">
            <section class="row">
                <article class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="txtCelsius" class="form-label">Temperatura em °C</label>
                        <input type="number" name="txtCelsius" id="txtCelsius" class="form-control" required pattern="[0-9]{1,}">
                    </div>
                </article>
                <article class="col-12 col-md-6">
                    <div class="form-check">
                        <label for="txtFahrenheit" class="form-check-label">Fahrenheit</label>
                        <input type="radio" name="temperature" id="txtFahrenheit" class="form-check-input" value="Fahrenheit" checked>
                    </div>
                    <div class="form-check">
                        <label for="txtKelvin" class="form-check-label">Kelvin</label>
                        <input type="radio" name="temperature" id="txtKelvin" class="form-check-input" value="Kelvin">
                    </div>
                    <div class="form-check">
                        <label for="txtRankine" class="form-check-label">Rankine</label>
                        <input type="radio" name="temperature" id="txtRankine" class="form-check-input" value="Rankine">
                    </div>
                </article>
            </section>
            <section class="row">
                <article class="col">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Converter</button>
                    </div>
                </article>
            </section>
        </form>
    </main>
</body>

</html>