<?php
session_start();
if ($_SESSION['cpfusuario'] == '') {
    header('Location: login.php');
}
$nome = "Géssika"; //BUSCAR NO BANCO DE DADOS
$nsorte = array(
    array(
        "CODNUMERO" => "1"
    ),
    array(
        "CODNUMERO" => "2"
    ),
    array(
        "CODNUMERO" => "3"
    )
);
if (isset($_POST['Voltar'])) {
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Dashboard</title>
</head>
<style>
    #container {
        display: flex;
        flex-flow: row wrap;
        justify-content: space-around;
    }

    #card {
        display: flex;
        flex-direction: column;
        align-items: left;
        padding: 50px;
        border: 1px solid grey;
        max-height: 400px;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .button-wrapper {
        display: flex;
        flex-direction: row;
        padding: 10px;
        gap: 10px;
    }

    .button {
        cursor: pointer;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        border-radius: .25rem;
    }
</style>

<body>
    <div id="container">
        <div>
            <h1>Seja bem vindo(a), <?= $nome ?></h1>
            <div class="wrapper">
                <label>Número da sorte Gerados</label>
                <table id="table">
                    <thead>
                        <tr>
                            <th style="text-align: Left">Números da Sorte</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($nsorte as $row) {
                        ?>
                            <tr>
                                <td><?= $row['CODNUMERO'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="card">
            <form method="Post">
                <h2>Cadastrar cupom</h2>
                <div class="wrapper">
                    <label>Código:</label>
                    <input required name="Codigo"></input>
                    <label>Cpf:</label>
                    <input required name="Cpf" id="cpf"></input>
                    <label>Valor:</label>
                    <input required name="Valor"></input>
                    <label>Loja:</label>
                    <input required name="Loja"></input>
                    <label>Data e Hora:</label>
                    <input required name="Dthr"type="datetime-local"></input>
                <div class="button-wrapper">
                    <button type="Submit" name="Cadastrar" class="button">Cadastrar</button>
                    <button type="Button" class="button" id="cupons">Cupons</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script LANGUAGE="javascript">
    $(document).ready(function() {
        //MASCARA DE CPF
        $("#cpf").mask('000.000.000-00');
        $("#cupons").click(function(){
            window.location = "cupons.php";
        });
    });
</script>

</html>