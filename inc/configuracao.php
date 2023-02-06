<?PHP
//CONEXAO COM O BANCO DE DADOS
include "./inc/conexao.php";
//----------------------------
//FUNCOES EM PHP QUE USAMOS NO PROJETO TODO
function mosstraData($data)
{
    if ($data != '') {
        return (substr($data, 8, 2) . '/' . substr($data, 5, 2) . '/' . substr($data, 0, 4));
    }
}

function gravaData($data)
{
    if ($data != '') {
        return (substr($data, 6, 4) . '-' . substr($data, 3, 2) . '-' . substr($data, 0, 2));
    }
}
//------------------------------------------
?>

<!--ARQUIVOS E BIBLIOTECAS EXTERNAS QUE IMPORTAMOS NO PROJETO-->
<!--JQUERY - ESCRITA MAIS PRATICA DO JAVASCRIPT-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--JQUERY MASK - MASCARA PARA CAMPOS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--SWEET ALERTS - ALERTAS-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--FONTAWESOME - ICONES-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--MASKMONEY - MASCARA DE DINHEIRO MAIS COMPLETA-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!------------------------------------------------------------>

<!--ESTILO DO PROJETO-->
<link rel="stylesheet" href="./inc/style.css">
<!--------------------->

<!--FUNCOES E JS QUE USAMOS NO PROJETO TODO-->
<script LANGUAGE="javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        iconColor: 'white',
        showConfirmButton: false,
        customClass: {
            popup: 'colored-toast'
        },
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    $(document).ready(function() {
        //MASCARA DE CPF
        $(".cpf").mask('000.000.000-00');
        $(".money").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: true});
    });
</script>