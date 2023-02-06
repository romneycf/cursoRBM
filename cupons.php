<?php
if (isset($_POST['Voltar'])) {
    header('Location: dashboard.php');
}
session_start();
if ($_SESSION['cpfusuario'] == '') {
    header('Location: login.php');
}
$nome = "Géssika"; //BUSCAR NO BANCO DE DADOS
$cupon1 = array(
    "CODCUPOM" => "01",
    "CPF" => "11111111111",
    "VALOR" => "500.00",
    "LOJA" => "AMERICANAS",
    "DTHR" => "2023-01-01 08:30:30",
    "STATUS" => "VALIDO"
);
$cupon2 = array(
    "CODCUPOM" => "02",
    "CPF" => "22222222222",
    "VALOR" => "450.00",
    "LOJA" => "PONTO FRIO",
    "DTHR" => "2023-01-01 08:30:30",
    "STATUS" => "INVALIDO"
);

$cupons = array(
    $cupon1,
    $cupon2
);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./inc/style.css">
    <title>Cupons</title>
</head>
<body>
    <div id="container">
        <div id="card">
            <h3>Cupons cadastrados para <?= $nome ?></h3>
            <table id="table">
                <thead>
                    <tr>
                        <th>Cód. Cupom</th>
                        <th>CPF</th>
                        <th>Valor</th>
                        <th>Loja</th>
                        <th>Data e hora</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    foreach ($cupons as $row) {
                    ?>
                        <tr>
                            <td><?= $row['CODCUPOM'] ?></td>
                            <td><?= $row['CPF'] ?></td>
                            <td><?= $row['VALOR'] ?></td>
                            <td><?= $row['LOJA'] ?></td>
                            <td><?= $row['DTHR'] ?></td>
                            <td><?= $row['STATUS'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <form method="Post">
                <div class="button-wrapper">
                    <button name="Voltar" class="button">Voltar</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script LANGUAGE="javascript">
    $(document).ready(function() {
        //MASCARA DE CPF
        $("#cpf").mask('000.000.000-00');
    });
</script>

</html>