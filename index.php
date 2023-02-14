<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Exo complet lecture SQL.</title>
</head>
<body>
<div>
    <?php

    $server = 'localhost';
    $user = 'root';
    $pwd = '';
    $db = 'grand_exercice';

    try {
        $maConnexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pwd);

        $client = $maConnexion->prepare("SELECT lastName, firstName from clients");

        $state = $client->execute();

        if($state) {
            foreach ($client->fetchAll() as $user) {
                echo "<p><span>" . $user['lastName'] . " " . $user['firstName'] . "</span></p>";
            }
        }

    ?>
</div>
<div>
    <?php
    $client = $maConnexion->prepare("SELECT type from showtypes");

    $state = $client->execute();

    if($state) {
        foreach ($client->fetchAll() as $user) {
            echo "<p><span>" . $user['type'] . "</span></p>";
        }
    }
    ?>
</div>
<div>
    <?php
    $client = $maConnexion->prepare("SELECT lastName, firstName from clients LIMIT 20");

    $state = $client->execute();

    if($state) {
        foreach ($client->fetchAll() as $user) {
            echo "<p><span>" . $user['lastName'] . " " . $user['firstName'] . "</span></p>";
        }
    }
    ?>
</div>
<div>
    <?php
    $client = $maConnexion->prepare("SELECT lastName, firstName from clients WHERE card IN ('1')");

    $state = $client->execute();

    if($state) {
        foreach ($client->fetchAll() as $user) {
            echo "<p><span>" . $user['lastName'] . " " . $user['firstName'] . "</span></p>";
        }
    }
    ?>
</div>
<div>
    <?php
    $client = $maConnexion->prepare("SELECT lastName, firstName from clients WHERE lastName LIKE 'M%'");

    $state = $client->execute();

    if($state) {
        foreach ($client->fetchAll() as $user) {
            echo "<p><span>Nom: " . $user['lastName'] . ", Prenom: " . $user['firstName'] . "</span></p>";
        }
    }
    ?>
</div>
<div>
    <?php
    $client = $maConnexion->prepare("SELECT title, performer, date, startTime from shows");

    $state = $client->execute();

    if($state) {
        foreach ($client->fetchAll() as $user) {
            echo "<p><span>" . $user['title'] . " par " . $user['performer'] . " le " . $user['date'] . " à " . $user['startTime'] . "</span></p>";
        }
    }
    ?>
</div>
<div>
    <?php
    $client = $maConnexion->prepare("SELECT lastName, firstName, birthDate, card, cardNumber from clients");

    $state = $client->execute();

    if($state) {
        foreach ($client->fetchAll() as $user) {
            if($user['card'] === 1) {
                echo "<p><span>Nom: " . $user['lastName'] . ",</span><br><span>Prenom: " . $user['firstName'] . ",</span><br><span>Date de naissance: " . $user['birthDate'] . ",</span><br><span>Carte de fidélité: oui,</span><br><span>Numero de la carte " . $user['cardNumber'] . "</span></p>";
            }
            else {
                echo "<p><span>Nom: " . $user['lastName'] . ",</span><br><span>Prenom: " . $user['firstName'] . ",</span><br><span>Date de naissance: " . $user['birthDate'] . ",</span><br><span>Carte de fidélité: non</span></p>";
            }
        }
    }
    }
    catch (PDOException $exception) {
    echo "Erreur de connexion: " . $exception->getMessage();
    }
    ?>
</div>

</body>
</html>
