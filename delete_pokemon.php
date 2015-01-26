<?php

require __DIR__.'/_header.php';

$em = require __DIR__.'/bootstrap.php';
$pokemonRepository = $em->getRepository('MatthieuTK\PokemonBattle\PokemonModel');


$isConnected = false;
if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;

    $criteria = array('trainerId' => $_SESSION['id']);
    $pokemon_test = $pokemonRepository->findOneBy($criteria);

    $em->remove($pokemon_test);

    $em->flush();

    echo $twig->render('delete_pokemon.html.twig',[
        'isConnected' => $isConnected,
    ]);
}



