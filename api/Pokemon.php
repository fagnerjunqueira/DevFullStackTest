<?php
$Poke_id = $_POST['poke_id']; //DEFINE O POST NA VARIAVEL PARA CONSULTAR A API
$url = "https://pokeapi.co/api/v2/pokemon/$Poke_id/"; //CONSULTA A API
$pokemon = json_decode(file_get_contents($url)); //RETONA UM JSON
?>

<div class="pokemon">
    <?php 
        if(!$pokemon->sprites->other->dream_world->front_default){ //ERRO CASO O POKEMON INFORMADO NAO EXISTA OU TENHA SIDO INFORMADO ERRADO
            echo "<h1><font color='white'>Codigo/Nome do Pokemom invalido, tente novamente</font></h1>";
        }else{
    ?>
    <pokemon class="name"><?=ucfirst($pokemon->name)?></pokemon> <!-- NOME DO POKEMON -->
    <pokemon class="id">Id: <?=$pokemon->game_indices[4]->game_index?></pokemon> <!-- ID DO POKEMON -->
    <br>
    <img id='poke' align="left" src="<?=$pokemon->sprites->other->dream_world->front_default?>"> <!-- IMAGEM DO POKEMON -->
    
    <div class="group">
        <pokemon class="weight">Peso: <?=$pokemon->weight/10?>Kg</pokemon> <!-- PESO DO POKEMON -->
        <br>
        <pokemon class="height">Altura: <?=$pokemon->height/10?>m</pokemon> <!-- ALTURA DO POKEMON -->
        <br>
        <pokemon class="type">Tipo: <?=ucfirst($pokemon->types[0]->type->name)?></pokemon> <!-- TIPO DO POKEMON -->
    </div>
    <div class="group">
        <pokemon class="abilities">Habilidade(s): <?php for($i = 0; $i<count($pokemon->abilities); $i++){   //'FOR' QUE RETORNA AS HABILIDADES
            echo "<br> <pokemon class='abilitie'>".ucfirst($pokemon->abilities[$i]->ability->name)."</pokemon>";
        }?>
    </div>
    
    <pokemon class="stats"> <!-- 'FOR' QUE RETORNA O STATS DO POKEMON EM FORMA DE BARRAS -->
        <br><br><br><br>
        <?php for($i = 0; $i < count($pokemon->stats); $i++){
            ?>
            <?= ucfirst($pokemon->stats[$i]->stat->name).' : ' .$pokemon->stats[$i]->base_stat;?>
            <div class="progress">
            <div class="progress-bar" role="progressbar" style="width:<?=$pokemon->stats[$i]->base_stat?>%" aria-valuenow="<?=$pokemon->stats[$i]->base_stat?>" aria-valuemin="0" aria-valuemax="160"></div>
            </div>
            <?php }};?>
    </pokemon>