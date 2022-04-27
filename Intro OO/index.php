<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de ingressos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <form action="src/Controller/ticket.php" method="post">
            <section class="row">
                <article class="col-12 col-md-4">
                    <label for="seat" class="form-label">Assento</label>
                    <input type="text" name="seat" id="seat" required class="form-control">
                </article>
                <article class="col-12 col-md-4">
                    <label for="price" class="form-label">Preço do ingresso</label>
                    <input type="number" name="price" id="price" min=30 max=100 required class="form-control">
                </article>
                <article class="col-12 col-md-4">
                    <label for="typeOfUser" class="form-label">Tipo de cliente</label>
                    <select name="typeOfUser" id="typeOfUser" required class="form-control">
                        <option value=1>Padrão</option>
                        <option value=2>Estudante/Idoso</option>
                        <option value=3>VIP</option>
                    </select>
                </article>
            </section>
            <section class="row">
                <article class="col-12">
                    <button type="submit" class="btn btn-primary">Vender</button>
                </article>
            </section>
        </form>
    </main>
</body>

</html>