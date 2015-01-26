<?php

require __DIR__.'/_header.php';


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use MatthieuTK\PokemonBattle\Trainer;

$username = !empty($_POST['username']) ? $_POST['username'] : null;
$password = !empty($_POST['password']) ? $_POST['password'] : null;

if(!isset($_SESSION['connected'])) {
    /**
     * SignIn
     */
    if (null !== $username && null !== $password) {
        $trainer = new Trainer();

        $trainer
            ->setUsername($username)
            ->setPassword($password);

        $em->persist($trainer);
        $em->flush();

        echo '<div class="alert alert-success" role="alert">Trainer created!</div>';
    }

} else{
    header('Location: index.php');
}


echo $twig->render('new_user.html.twig');