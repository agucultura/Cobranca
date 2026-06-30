<?php
//==============================
// SESSÃO SEGURA
//==============================
session_start([
    'cookie_lifetime' => 0,
    'cookie_secure'   => true,
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax'
]);

if (!isset($_SESSION['contad'])) {
    header("Location: index.php");
    exit;
}

//==============================
// LÓGICA
//==============================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    switch ($_POST['acao']) {

        case '1':
            header("Location: cob-cadastro.php");
            exit;

        case '2':
            header("Location: cob-habilitar.php");
            exit;

        case '3':
            header("Location: cob-clientes.php");
            exit;

        case '4':
            header("Location: cob-gerarcob.php");
            exit;

        case '5':
            header("Location: cob-resregal.php");
            exit;

        case '6':
            header("Location: cob-rescliente.php");
            exit;

        case '7':
            header("Location: cob-cobranças.php");
            exit;

        case '8':
            header("Location: cob-recebimentos.php");
            exit;

        case '9':
            header("Location: cob-inadimplencias.php");
            exit;

        case '10':
            header("Location: index.php");
            exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Menu Cobranças</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,Helvetica,sans-serif;
}

body{
    height:100vh;
    display:flex;
    flex-direction:column;
    background:#cfefff;
}

header div:first-child{
    background:#68BD4F;
    color:#fff;
    padding:25px;
    font-size:16px;
}

header div:last-child{
    background:green;
    color:#fff;
    text-align:center;
    padding:5px;
    font-size:35px;
    font-weight:550;
}

main{
    flex:1;
    display:flex;
    justify-content:center;
    align-items:center;
}

form{
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:10px;
}

button{
    width:min(320px,90%);
    padding:12px;
    background:green;
    color:#fff;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:18px;
}

button:hover{
    background:orange;
}

.msg{
    text-align:center;
    color:orange;
    font-size:18px;
}

</style>

</head>

<body>

<header>

    <div>
        <strong><?= htmlspecialchars($_SESSION['plataforma']) ?></strong><br>
        <?= htmlspecialchars($_SESSION['nome']) ?>
    </div>

    <div>
        <?= htmlspecialchars($_SESSION['sistema']) ?>
    </div>

</header>

<main>

<form method="post">

<button name="acao" value="1">Dados Cadastrais</button>

<button name="acao" value="2">Habilitar Uso</button>

<button name="acao" value="3">Clientes/Carteira</button>

<button name="acao" value="4">Gerar Cobranças</button>

<button name="acao" value="5">Resumo Geral</button>

<button name="acao" value="6">Resumo por Clientes</button>

<button name="acao" value="7">Cobranças</button>

<button name="acao" value="8">Recebimentos</button>

<button name="acao" value="9">Inadimplências</button>

<button name="acao" value="10">Voltar</button>

</form>

</main>

</body>
</html>
