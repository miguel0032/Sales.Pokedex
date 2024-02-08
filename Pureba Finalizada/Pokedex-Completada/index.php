<?php
    include('url.php');
    include('getInfo.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pokédex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css">
    <link rel="icon" type="image/png" href="fav-ic/pokeball.png" />
</head>

<body>
    <h1>Pokédex Región de Kanto</h1>
   
    <div class="list-pokemon">
        <!-- Mostrar 150 Pokémon ----------------------------------------------- -->
        <?php foreach($pokemon as $_pokemon): ?>
            <div class="list-item-pokemon">
                <p class="pokeid"><?= pokemonId($_pokemon->name, 1)?>.</p>
                <div class="sprites-container">
                    <img class="sprite" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
                </div>
                <p class ="pokename"><?= $_pokemon->name ?></p>
                <p class="poketype">Tipo: <?= pokemonType($_pokemon->name, 3, 1)?></p>
            </div>

            <!-- Panel de información del Pokémon ----------------------------------------------- -->
            <div class="pokeinfo">
                <h2>Pokémon Región de Kanto</h2> 
                <p class="pokeinfoname"><?= $_pokemon->name ?></p>
                <p class="pokeinfotype"><strong>Tipo: </strong><?= pokemonType($_pokemon->name, 3, 1)?><br/></p>            
                <p class="pokeinfoabilities"><strong>Habilidades: </strong><?= pokemonAbilities($_pokemon->name, 4, 1)?></p>
                <img class="infosprite" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
                <img class="infosprite2" src="<?= pokemonSpriteShiny($_pokemon->name, 3, 0)?>">
                <p class="close-button">Cerrar información</p>
                <p class="pokeinfodescription"><strong>Descripción: </strong><?= pokemonDescription($_pokemon->name, 4, 1)?></p>
                <p class="pokeheight"><strong>Altura: </strong><?= pokemonHeight($_pokemon->name, 4, 1)?>0cm <br/></p>
                <p class="pokeweight"><strong>Peso: </strong><?= pokemonWeight($_pokemon->name, 4, 1)?>Kg</p>
                <p class="shinyform">Forma Brillante de <?= $_pokemon->name ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
