<?php //ACONTECE ANTES DA PAGINA CARREGAR
include "./inc/configuracao.php";
global $conexao;
session_start();
if (isset($_POST['Acessar'])) {
    //PEGANDO OS VALORES DE TODOS OS CAMPOS PREENCHIDOS
    $cpf = $_POST['Cpf'];
    $cpf = str_replace(array('.', '-'), '', $cpf); //REMOVENDO PONTO E - DO CPF
    $password = $_POST['Password'];

    $sql =
        "SELECT
        *
    FROM
        usuarios
    WHERE
        CPF = '$cpf'
    AND
        SENHA = '$password'";
    $queryConsulta = mysqli_query($conexao, $sql); //CONSULTA NO BANCO SE EXISTE CADASTRO PARA O CPF E A SENHA DIGITADOS
    if (mysqli_num_rows($queryConsulta) == 0) { //SE NAO EXISTE RESULTADO
        $alerta = true; //GAMBIARRA PARA DISPARAR ALERTA EM JAVASCRIPT
    } else {
        $_SESSION['cpfusuario'] = $cpf; //GRAVANDO NA SESSAO O CPF QUE IRA LOGAR (JA REMOVIDO OS '.', '-')
        header('Location: dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form method="Post">
            <div class="card">
                <h2>Login</h2>
                <div class="input-wrapper">
                    <label>CPF:</label>
                    <div>
                        <input required autocomplete="off" name="Cpf" class="cpf"></input>
                    </div>
                    <label>Senha:</label>
                    <div>
                        <input required autocomplete="off" type="password" name="Password" id="password"></input>
                        <button type="Button" class="bt-icone fa-regular fa-eye-slash" id="eye-icon" onclick="togglePassword()"></button>
                    </div>
                </div>
                <div class="button-wrapper">
                    <button type="Button" name="Registrar" class="button" onclick="location.href='registrar.php'">Registrar</button>
                    <button type="Submit" name="Acessar" class="button" id="Acessar">Acessar</button>
                </div>
                <a href="">Esqueceu a senha?</a>
            </div>
        </form>
    </div>
</body>
<script LANGUAGE="javascript">
    $(document).ready(function() {
        if (<?= $alerta ?>) {
            Toast.fire({
                icon: 'error',
                title: 'CPF ou senha inválidos.'
            });
        }
    });

    function togglePassword() {
        var element = document.getElementById("password");
        var icon = document.getElementById("eye-icon");
        if (element.type === "password") {
            element.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            element.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    };
</script>

</html>