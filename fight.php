<?php

require __DIR__.'/_header.php';

use MatthieuTK\PokemonBattle\Attack;

$em = require __DIR__.'/bootstrap.php';
$pokemonRepository = $em->getRepository('MatthieuTK\PokemonBattle\PokemonModel');

$trainerRepository = $em->getRepository('MatthieuTK\PokemonBattle\Trainer');

$attackRepository = $em->getRepository('MatthieuTK\PokemonBattle\Attack');

//isConnected menu
$isConnected = false;
if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;
}else{
    header('Location: index.php');
}


//associer Pokemon au trainer attaquant (Trainer connected)
$strikerId = $_SESSION['id']; //on récupère l'ID de l'attaquant

$criteria = array('trainerId' => $strikerId);
$strikerPokemon = $pokemonRepository->findOneBy($criteria);


//associer Pokemon au trainer defenseur (celui sur lequel on a cliqué)
$defensorId = $_GET['defensorId'];

$critere = array('trainerId' => $defensorId);
$defensorPokemon = $pokemonRepository->findOneBy($critere);


//combat
$strikerPokemonType = $strikerPokemon->getType();
$defensorPokemonType = $defensorPokemon->getType();

if(($strikerPokemonType = 0 && $defensorPokemonType = 2) ||
    ($strikerPokemonType = 1 && $defensorPokemonType = 0) ||
    ($strikerPokemonType = 2 && $defensorPokemonType = 1)){
    $pokemonAttack = mt_rand(5,10);
}elseif(($strikerPokemonType = 2 && $defensorPokemonType = 0) ||
        ($strikerPokemonType = 0 && $defensorPokemonType = 1) ||
        ($strikerPokemonType = 1 && $defensorPokemonType = 2)){
    $pokemonAttack = mt_rand(15,30);
}else{
    $pokemonAttack = mt_rand(10,20);
}

$defensorHp = $defensorPokemon->removeHP($pokemonAttack);


// add to database
$criteria_defensor_username = array('id' => $defensorId);
$trainerDefensor = $trainerRepository->findOneBy($criteria_defensor_username);

$trainerDefensorUsername = $trainerDefensor->getUsername();

$date = new DateTime('now');
$timestamp = $date->format('U');


//test existence attack
$criteria_test_attack = array('trainerStrikerUsername' => $_SESSION['username']);
$test_attack = $attackRepository->findOneBy($criteria_test_attack);

if(empty($test_attack)) {

    $attack = new Attack();

    $attack
        ->setTrainerStrikerUsername($_SESSION['username'])
        ->setTrainerDefensorUsername($trainerDefensorUsername)
        ->setPokemonStrikerName($strikerPokemon->getName())
        ->setPokemonDefensorName($defensorPokemon->getName())
        ->setAttackValue($pokemonAttack)
        ->setTimestamp($date);

    $em->persist($attack);
    $em->flush();

    echo $twig->render('fight.html.twig',[
        'strikerPokemon' => $strikerPokemon,
        'defensorPokemon' => $defensorPokemon,
        'pokemonAttack' => $pokemonAttack,
        'defensorHp' => $defensorHp,
        'isConnected' => $isConnected
    ]);
}else {
    if ($timestamp < $timestamp + 21600) {
        echo $twig->render('error_time.html.twig', [
            'isConnected' => $isConnected
        ]);
    } else {
        $test_attack
            ->setTrainerDefensorUsername($trainerDefensorUsername)
            ->setPokemonStrikerName($strikerPokemon->getName())
            ->setPokemonDefensorName($defensorPokemon->getName())
            ->setAttackValue($pokemonAttack);
        $em->flush();

        echo $twig->render('fight.html.twig',[
            'strikerPokemon' => $strikerPokemon,
            'defensorPokemon' => $defensorPokemon,
            'pokemonAttack' => $pokemonAttack,
            'defensorHp' => $defensorHp,
            'isConnected' => $isConnected
        ]);
    }
}



