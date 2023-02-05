<?php
if (isset($_POST['Acessar'])) {

    //VALIDAR SE OS CAMPOS ESTÃO PREENCHIDOS   
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
        overflow: hidden; /*TRANSBORDAR -> ESCONDIDO  */
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
        padding: 50px; /*DISTANCIA ENTRA A BORDA DA DIV E SEU PRIMEIRO ELEMENTO */
        padding-top: 20px; /* MESMA COISA POREM PARA A BORDA SUPERIOR SOMENTE */
        border: 1px solid grey;   
    }

    .input-wrapper { 
        display: flex;
        flex-direction: column;
        gap: 8px; /*DISTANCIA ENTRE OS ELEMENTOS */
    }

    .button-wrapper {
        display: flex;
        flex-direction: row;
        padding: 10px;
        gap: 10px;
    }

    .button {
        cursor: pointer; /*FAZ VIRAR A MAOZINHA AO PASSAR O MOUSE POR CIMA */
        border: 1px solid transparent;
        padding: .375rem .75rem;/*REM -> ROOT ELEMENT, OU SEJA O ELEMENTO RAIZ, USANDO REM A GENTE PODE MUDAR O VALOR INICIAL E AUTOMATICAMENTE TODOS OS ELEMENTOS FILHOS TERÃO SEUS VALORES AJUSTADOS */
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
                    <input name="cpf" id="cpf" autocomplete="off"></input>
                    <label>Senha:</label>
                    <input type="password" name="senha" autocomplete="off"></input>
                </div>
                <div class="button-wrapper">
                    <button name="Registrar" class="button">Registrar</button>
                    <button name="Acessar" class="button">Acessar</button>
                </div>
                <a href="">Esqueceu a senha?</a>
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