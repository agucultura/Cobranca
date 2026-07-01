<?php
// =========================
// GERENCIAMENTO DE SESSÃO
// =========================
session_start([
    'cookie_lifetime' => 0,
    'cookie_secure'   => true,
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax'
]);

// =========================
// SEGURANÇA
// =========================
if (empty($_SESSION['contad'])) {
    header('Location: index.php');
    exit;
}

// =========================
// VARIÁVEIS
// =========================
$plataforma = htmlspecialchars($_SESSION['plataforma'] ?? '', ENT_QUOTES, 'UTF-8');
$nome       = htmlspecialchars($_SESSION['nome'] ?? '', ENT_QUOTES, 'UTF-8');
$sistema    = htmlspecialchars($_SESSION['sistema'] ?? '', ENT_QUOTES, 'UTF-8');

$botoes = [
    ['Dados Cadastrais',   'cob-cadastro.php'],
    ['Habilitar Uso',      'cob-habilitar.php'],
    ['Clientes/Carteira',  'cob-clientes.php'],
    ['Gerar Cobranças',    'cob-gerarcob.php'],
    ['Resumo Geral',       'cob-resregal.php'],
    ['Resumo por Clientes','cob-rescliente.php'],
    ['Cobranças',          'cob-cobranças.php'],
    ['Recebimentos',       'cob-recebimentos.php'],
    ['Inadimplencias',     'cob-inadimplencias.php'],
    ['Voltar',             'index.php']
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu Cobrança</title>

<style>
*{margin:0;padding:0;box-sizing:border-box}

body{
    font-family:Arial,Helvetica,sans-serif;
    background:#bfe9ff;
    min-height:100vh;
    display:flex;
    flex-direction:column;
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
    padding:15px;
}

.menu{
    width:min(700px,100%);
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:12px;
}

.menu a{
    text-decoration:none;
}

.menu button{
    width:100%;
    padding:16px;
    background:green;
    color:#fff;
    border:0;
    border-radius:10px;
    font-size:18px;
    cursor:pointer;
    transition:.2s;
}

.menu button:hover{
    background:orange;
}

.msg{
    text-align:center;
    color:orange;
    font-size:18px;
}

@media (max-width:600px){
    .menu{
        grid-template-columns:1fr;
    }

    header div:last-child{
        font-size:26px;
    }
}
</style>

</head>
<body>

<header>
    <div>
        <strong><?= $plataforma ?></strong><br>
        <?= $nome ?>
    </div>

    <div>
        <?= $sistema ?>
    </div>
</header>

<main>

<section class="menu">

<?php foreach($botoes as $botao): ?>
    <a href="<?= $botao[1] ?>">
        <button type="button"><?= $botao[0] ?></button>
    </a>
<?php endforeach; ?>

</section>

</main>

</body>
</html>