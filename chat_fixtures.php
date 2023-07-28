<?php

// Remplacez ces valeurs par les informations de votre base de données
$servername = "db";
$username = "root";
$password = "jjj123";
$dbname = "test";

try {
    // Connexion à la base de données via PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configure le mode d'erreur pour les exceptions PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fonction pour générer une valeur aléatoire pour un champ donné
    function getRandomValue($array)
    {
        return $array[array_rand($array)];
    }

    // Tableaux de valeurs possibles pour chaque champ
    $noms = ["Felix", "Minou", "Mia", "Chaton", "Tom", "Moustache", "Whiskers", "Grisou", "Salem"];
    $couleurs = ["roux", "noir", "blanc", "gris", "tigré", "écaille de tortue"];
    $races = ["Siamois", "Bengal", "Maine Coon", "Persan", "Sacré de Birmanie", "British Shorthair"];
    $miaous = [
        "Miaou ! Je suis le roi de la maison, et tout le monde doit me vénérer !",
        "Meow ! Qui veut jouer avec moi ? Attrapez la balle, attrapez la balle !",
        "Purr... Les caresses derrière les oreilles, c'est le paradis pour un chat comme moi.",
        "Nya~ J'ai entendu dire qu'il y a un oiseau dehors, je vais le surveiller depuis la fenêtre !",
        "Miaou ! La boîte en carton est mon royaume, et je ne tolère aucun intrus !",
        "Meow ! Je suis un chat ninja, je peux me faufiler partout sans être vu !",
        "Purr... Rien de mieux qu'une sieste ensoleillée l'après-midi, ronronnant paisiblement.",
        "Nya~ J'ai besoin de mes croquettes préférées, sinon je boude dans un coin.",
        "Miaou ! Personne ne résiste à mon charme félin, je suis irrésistible !",
        "Meow ! Les chiens peuvent être sympas parfois, mais nous les chats, nous sommes supérieurs !",
        "Purr... Les humains devraient apprendre de nous, comment vivre sans souci et en beauté.",
        "Nya~ J'ai déjà conquis Internet, bientôt le monde entier sera sous ma patte !",
        "Miaou ! Une corde qui pend ? C'est le meilleur jouet du monde, je suis fou d'elle !",
        "Meow ! J'ai réussi à attraper cette mouche, je suis un chasseur hors pair !",
        "Purr... Mon ronronnement apaise tout le monde, c'est un super pouvoir félin.",
        "Nya~ Une boîte vide ? Parfait, c'est la meilleure cachette pour surprendre les humains !",
        "Miaou ! La nuit, je deviens le chat fantôme, personne ne peut me voir bouger !",
        "Meow ! Je suis le chat le plus élégant du quartier, tout le monde le sait.",
        "Purr... Quoi de mieux qu'une séance de toilettage approfondie ? Je suis d'une beauté inégalée !",
        "Nya~ Les câlins, c'est bon, mais seulement quand j'en ai envie. Je suis un chat indépendant.",
        "Miaou ! Le balcon est mon domaine, je le patrouille pour protéger notre territoire !",
        "Meow ! Quelqu'un a ouvert le frigo ? J'espère qu'il y a du thon pour moi !",
        "Purr... J'ai réussi à grimper tout en haut de l'arbre, je suis le roi de l'escalade !",
        "Nya~ Les lasers rouges sont mes ennemis jurés, je les pourchasse sans relâche !",
        "Miaou ! Aujourd'hui est une journée parfaite pour jouer à cache-cache, qui veut participer ?",
        "Meow ! Mon humain a le privilège de me servir, c'est ainsi que les choses fonctionnent ici.",
        "Purr... Les papillons dans le jardin m'intriguent, je vais partir à leur poursuite !",
        "Nya~ L'ordinateur portable de mon humain est un coussin parfait pour faire la sieste.",
        "Miaou ! Mon regard envoûtant hypnotise tous ceux qui croisent mon chemin.",
        "Meow ! Les rideaux sont parfaits pour grimper et observer le monde en secret.",
        "Purr... On dit que les chats ont neuf vies, mais moi, j'ai l'intention de vivre éternellement !"
    ];
    // Génération des 30 fixtures
    for ($i = 1; $i <= 30; $i++) {
        $nom = getRandomValue($noms);
        $couleur = getRandomValue($couleurs);
        $race = getRandomValue($races);
        $miaou = getRandomValue($miaous);

        // Requête SQL pour insérer les données dans la table "chat"
        $sql = "INSERT INTO chat (nom, couleur, race, miaou) VALUES (:nom, :couleur, :race, :miaou)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':couleur', $couleur);
        $stmt->bindParam(':race', $race);
        $stmt->bindParam(':miaou', $miaou);

        if ($stmt->execute()) {
            echo "Fixture $i insérée avec succès<br>";
        } else {
            echo "Erreur lors de l'insertion de la fixture $i<br>";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn = null;

?>