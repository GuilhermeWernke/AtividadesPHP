<?php
     
    $dados_em_texto;
    $pos_ataque = 1;
    $qual_pokemon;

    print("Escolha um pokemon usando somente letras minusculas! \n");
    $qual_pokemon = readline("\n");
    $dados_em_texto = file_get_contents("https://pokeapi.co/api/v2/pokemon/$qual_pokemon");
    


    $pokemon = json_decode($dados_em_texto, true);

    print("Nome: ");
    print_r($pokemon['name']);
    print("\n");

    print("Altura: ");
    print_r($pokemon['height'] / 10);
    print(" M\n");

    print("Peso: ");
    print_r($pokemon['weight'] / 10);
    print(" Kg\n");

    foreach($pokemon['moves'] as $move)
    {
        print("Ataque $pos_ataque: " . $move['move']['name'] . "\n");
        $pos_ataque++;
    }
?>

<?php

    $pokeapi = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0");
    $pokemons = json_decode($pokeapi, true);

    for($i = 0; $i < 20; $i++)
    {
        $pokemon = $pokemons['results'][$i];

        $todas_info_api = file_get_contents($pokemon['url']);
        $pokemon['results'][$i] = json_decode($todas_info_api, true);
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

        <?php for($i = 0; $i < 20; $i++):?>            
            <div id="pokémons">

                <div class="pokemon">
                    <img src="<?= $pokemons['results'][$i]['sprites']['others']['dream_world']['front_default'] ?>" width="200"> 
                    <h1><?= $pokemons['results'][$i]['name'] ?></h1> 
                    <p>peso: 54</p> 
                    <p>altura: 1,2</p>
                    <br>                  
                </div>
            </div>
        <?php endfor; ?>
    </body>
</html>
