<?php
    if(is_string($_POST['poke_id'])){
        $_POST['poke_id'] = strtolower($_POST['poke_id']); //CASO A BUSCA SEJA FEITA PELO NOME, ELE O CONVERTE EM LETRAS MINUSCULAS PARA BUSCAR NA API
    };
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/css/style.css">
    <title>Poke-APi</title>
</head>
<body>
    <header class="cabecalho">
    <center>
    <img id='titulo' src="https://fontmeme.com/permalink/210127/ebc3ad60e9d5809450309f30f7d69943.png" alt="fonte-de-pokemon" border="0">
    </header>

    <nav class="navegacao"> <!-- REALIZA BUSCAS NA API -->
        <center>
        <form action="index.php?dir=api&file=Pokemon<?=ucfirst($pokemon->name);?>" method="post">
        <label for="poke_id">Insira o nome ou codigo do Pokemon:</label>
        <input type="text" name="poke_id">
        <button>Buscar</button>
        </form>
    </nav>

    <main class="principal">
        <?php if(!$_POST['poke_id']){
            $_POST['poke_id'] = 1;
            include(__DIR__ . "/api/Pokemon.php");
            }else{
            include(__DIR__ . "/{$_GET['dir']}/{$_GET['file']}.php");};?> <!-- INCLUSÃO DO ARQUIVO QUE EXIBE OS DADOS DA API -->
    </div>
    </main>
</body>
</html>