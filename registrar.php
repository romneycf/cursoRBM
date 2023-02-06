<?php //ACONTECE ANTES DA PAGINA CARREGAR
include "./inc/configuracao.php";
global $conexao;
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <form method="Post">
                <h2>Registrar</h2>
                <div class="input-wrapper">
                    <label>CPF:</label>
                    <input required autocomplete="off" name="Cpf" class="cpf" id="cpf"></input>
                    <label>Nome:</label>
                    <input required autocomplete="off" name="Nome" id="nome"></input>
                    <label>Sexo:</label>
                    <select name="Sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    <label>Data de Nascimento:</label>
                    <input required autocomplete="off" name="Nascimento" type="date"></input>
                    <label>Senha:</label>
                    <input required autocomplete="off" type="password" name="Password" id="Password"></input>
                    <label>Favor repetir a senha:</label>
                    <input required autocomplete="off" type="password" name="Repassword" id="Repassword"></input>
                </div>
                <div class="button-wrapper">
                    <button type="Button" name="Voltar" class="button" onclick="location.href='login.php'">Voltar</button>
                    <button type="Submit" name="Registrar" class="button" id="Registrar">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script LANGUAGE="javascript">
    $('#Registrar').on('click', function() { //OU SEJA NA ACAO DE CLICKARMOS NO BOTAO REGISTRAR
        //VALIDANDO SE AS DUAS SENHAS ESTAO IGUAIS
        var password = document.getElementById('Password').value; //DUAS ESCRITAS DIFERENTES PARA O MESMO PROPOSITO,
        var repassword = $('#Repassword').val(); // PEGAR O VALOR DO CAMPO
        if (password != repassword) { //SE FOREM DIFERENTES
            Toast.fire({ //DISPARA O ALERTA QUE FOI CRIADO NA configuracao.php
                icon: 'error',
                title: 'As senhas não conferem!'
            })
            return false //ASSIM IMPEDIMOS DO FORMULARIO SER ENVIADO
        }
    });
</script>

</html>
<?php //ACONTECE DEPOIS DA PAGINA CARREGAR
if (isset($_POST['Registrar'])) {
    //PEGANDO OS VALORES DE TODOS OS CAMPOS PREENCHIDOS
    $cpf = $_POST['Cpf'];
    $cpf = str_replace(array('.', '-'), '', $cpf); //REMOVENDO PONTO E - DO CPF
    $nome = $_POST['Nome'];
    $nome = strtoupper($nome); //DEIXANDO O NOME TUDO MAIUSCULO
    $sexo = $_POST['Sexo'];
    $nascimento = $_POST['Nascimento']; //FORMATO DE DATA (YYYY-MM-DD)
    $password = $_POST['Password'];
    $repassword = $_POST['Repassword'];

    $sql =
        "SELECT
        *
    FROM
        usuarios
    WHERE
        CPF = '$cpf'";

    $queryConsulta = mysqli_query($conexao, $sql); //CONSULTA NO BANCO SE O CPF INFORMADO JA FOI CADASTRADO
    if (mysqli_num_rows($queryConsulta) > 0) { //SE SIM DISPARA UM ALERTA
        echo "<script>Toast.fire({icon: 'error',title: 'CPF já cadastrado no sistema.'})</script>";
    } else { //SE NAO, INSERE NOVO CADASTRO
        try {
            $sql =
            "INSERT INTO
                usuarios
            SET
                CPF = '$cpf',
                NOME = '$nome',
                SEXO = '$sexo',
                NASCIMENTO = '$nascimento',
                SENHA = '$password'";
            $queryUsuario = mysqli_query($conexao, $sql);
            if (!$queryUsuario) {
                throw new Exception(mysqli_error($conexao));
            }
        } catch (Exception $e) {
            echo "<script>Toast.fire({icon: 'info',title: '" . $e->getMessage() . "'})</script>";
        }
        echo "<script>Toast.fire({icon: 'success',title: 'Cadastro realizado com sucesso!'})</script>";
    }
}

if (isset($_POST['Voltar'])) {
    header('Location: login.php');
}
?>