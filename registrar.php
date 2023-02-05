<?php
if (isset($_POST['Registrar'])) {
    //SELECT SE JA ESTA INSERIDO O CPF SE N�O FAZER INSERT
}

if (isset($_POST['Voltar'])) {
    header('Location: login.php');
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

    <title>Registrar</title>
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
        max-height: 400px;
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
                <h2>Registrar</h2>
                <div class="input-wrapper">
                    <label>CPF:</label>
                    <input id="cpf" />
                    <label>Nome:</label>
                    <input />
                    <label>Sexo:</label>
                    <select name="sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    <label>Data de Nascimento:</label>
                    <input type="date" />
                    <label>Senha:</label>
                    <input type="password" />
                    <label>Favor repetir a senha:</label>
                    <input type="password" />
                </div>
                <div class="button-wrapper">
                    <button name="Voltar" class="button">Voltar</button>
                    <button name="Registrar" class="button">Registrar</button>
                </div>
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