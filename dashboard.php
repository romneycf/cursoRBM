<?php //ACONTECE ANTES DA PAGINA CARREGAR
include "./inc/configuracao.php";
global $conexao;
session_start();

//CASO AO ENTRAR NA TELA NAO TENHA REGISTRO DE USUARIO LOGADO, TE EMPURRA DE VOLTA PARA A login.php
if ($_SESSION['cpfusuario'] == '') {
    header('Location: login.php');
}

$cpfusuario = $_SESSION['cpfusuario']; //BUSCANDO O CPF DA SESSAO
$sql =
    "SELECT
    *
FROM
    usuarios
WHERE
    CPF = '$cpfusuario'";
$queryConsulta = mysqli_query($conexao, $sql);
$dadosConsulta = mysqli_fetch_assoc($queryConsulta);
$nome = $dadosConsulta['NOME'];

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="dashboard">
            <div>
                <h1>Seja bem vindo(a), <?= $nome ?></h1>
                <div class="input-wrapper">
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
            <form method="Post">
            <div class="card">
                    <h2>Cadastrar cupom</h2>
                    <div class="input-wrapper">
                        <label>Código:</label>
                        <input required autocomplete="off" name="Codigo"></input>
                        <label>Cpf:</label>
                        <input required autocomplete name="Cpf" class="cpf"></input>
                        <label>Valor:</label>
                        <input required autocomplete name="Valor" class="money"></input>
                        <label>Loja:</label>
                        <input required autocomplete name="Loja"></input>
                        <label>Data e Hora:</label>
                        <input required autocomplete name="Dthr" type="datetime-local"></input>
                        <div class="button-wrapper">
                            <button type="Submit" name="Cadastrar" class="button" id="Cadastrar">Cadastrar</button>
                            <button type="Button" class="button" id="cupons" onclick="location.href='cupons.php'">Cupons</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script LANGUAGE="javascript">
</script>

</html>
<?php //ACONTECE DEPOIS DA PAGINA CARREGAR
if (isset($_POST['Cadastrar'])) {
    //PEGANDO OS VALORES DE TODOS OS CAMPOS PREENCHIDOS
    $codigo = $_POST['Codigo'];
    $cpf = $_POST['Cpf'];
    $cpf = str_replace(array('.', '-'), '', $cpf); //REMOVENDO PONTO E - DO CPF
    $valor = $_POST['Valor'];
    $valor = str_replace(array('R$', '.', '-'), '', $valor); //REMOVENDO 'R$', '.', '-'
    $valor = str_replace(',', '.', $valor); //TROCANDO ',' POR '.'
    $loja = $_POST['Loja'];
    $loja = strtoupper($loja);
    $dthr = $_POST['Dthr'];

    $sql =
    "SELECT
        *
    FROM
        cupons
    WHERE
        CODIGO = '$codigo'
    AND
        CPF = '$cpf'";
    $queryConsulta = mysqli_query($conexao, $sql); //CONSULTA NO BANCO SE ESSE CUPOM JA FOI CADASTRADO PARA ESTE CPF
    if (mysqli_num_rows($queryConsulta) > 0) { //SE SIM DISPARA UM ALERTA
        echo "<script>Toast.fire({icon: 'error',title: 'Cupom já cadastrado para este cpf.'})</script>";
    } else {
        $situacao = 'APROVADO';
        if ($cpfusuario != $cpf) { //VALIDANDO SE O CPF LOGADO E DIFERENTE DO DIGITADO PARA O CUPOM
            $situacao = 'REPROVADO';
        }
        try {
            $sql =
                "INSERT INTO
            cupons
        SET
            CODIGO = '$codigo',
            CPFCUPOM = '$cpf',
            VALOR = '$valor',
            LOJA = '$loja',
            DTHR = '$dthr'
            SITUACAO = '$situacao'";
            $queryCupom = mysqli_query($conexao, $sql);
            if (!$queryCupom) {
                throw new Exception(mysqli_error($conexao));
            }
        } catch (Exception $e) {
            echo "<script>Toast.fire({icon: 'info',title: '" . $e->getMessage() . "'})</script>";
        }
        echo "<script>Toast.fire({icon: 'success',title: 'Cupom cadastrado com sucesso!'})</script>";
        //FAZER LOGICA PARA GERAR NUMEROS DA SORTE APOS O CADASTRO DO CUMPOM LEVANDO EM CONTA A COLUNA VALOR RESTANTE 
    }
}

?>