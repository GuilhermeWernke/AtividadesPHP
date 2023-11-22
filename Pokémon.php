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
