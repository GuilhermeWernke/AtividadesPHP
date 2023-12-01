<?php

    $pokeapi = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=100000");
    $pokemons = json_decode($pokeapi, true);

    for($i = 0; $i < 151; $i++)
    {
        $pokemon = $pokemons['results'][$i];

        $todas_info_api = file_get_contents($pokemon['url']);
        $pokemons['results'][$i] = json_decode($todas_info_api, true);
    }
    
?>
<html>
<html lang="en">

    <head>
        <title>Pokedex</title>

        <style>

            #pesquisa
            {
                background: red;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                padding: 20px;
                text-alling: center;

            }

            .pokemon
            {
                width: 20%;
                border: solid 2px #555;
                padding: 15px;
                margin: 20px;
                text-align: center;
                float: left;
            }

            .pokemon img 
            {
                max-width: 100%;
                height: 150px;
            }

        </style>
    </head>

    <body>


        <div id="Pesquisa">
            <form>

                <input type="text" placeholder="Digite um Pokémon">
                <br>
                <input type="submit" value="buscar">

            </form>
        </div>

        <?php for($i = 0; $i < 151; $i++):?>    
            
            <div id="pokemons">

                <div class="pokemon">
                    <img src="<?= $pokemons['results'][$i]['sprites']['other']['dream_world']['front_default'] ?>" width="200"> 
                    <h1><?= $pokemons['results'][$i]['name'] ?></h1> 
                    <p>peso: <?= ($pokemons['results'][$i]['weight'])/10?></p> 
                    <p>altura: <?= ($pokemons['results'][$i]['height'])/10?></</p>
                    <br>                  
                </div>
            </div>
        <?php endfor; ?>
    </body>
</html>
