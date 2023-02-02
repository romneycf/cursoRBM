<?php
if (isset($_POST['Acessar'])) {
    session_start();
    $_SESSION['cpfusuario'] = $_POST['cpf'];
    header('Location: dashboard.php');
}
if (isset($_POST['Registrar'])) {
    header('Location: registrar.php');
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

    <title>Login</title>
</head>
<style>
    body {
        overflow: hidden;
    }

    #container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100vw;
        height: 100vh;
    }

    #card {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 50px;
        border: 1px solid grey;
        max-height: 200px;
    }

    .input-wrapper {
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
        <form method="Post">
            <div id="card">
                <h2>Login</h2>
                <div class="input-wrapper">
                    <label>CPF:</label>
                    <input name="cpf" id="cpf" />
                    <label>Senha:</label>
                    <input name="senha" />
                </div>
                <div class="button-wrapper">
                    <button name="Registrar" class="button">Registrar</button>
                    <button name="Acessar" class="button">Acessar</button>
                </div>
                <a href="">Esquceu a senha?</a>
            </div>
        </form>
    </div>
</body>

<script LANGUAGE="javascript">
    $(document).ready(function() {
        //MASCARA DE CPF
        $("#cpf").mask('000.000.000-00');
    });
</script>

</html>