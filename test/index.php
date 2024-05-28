<?php

    // Etablissement de la connexion avec la BDD
    $host = 'localhost';
    $db   = 'db1';
    $user = 'mattis';
    $pass = '49610';
    
    $pdo = new PDO('mysql:host='.$host.'; port=3306; dbname='.$db,$user,$pass);


    echo("<pre>");
    echo("<code>");
    var_dump($_POST);
    echo("</code>");
    echo("</pre>");



    // enregistrer en BDD le formulaire
    if(count($_POST) > 0) {
        // le formulaire est soumis
        // echo "soumis";

        // insertion de données
        $sql = "INSERT INTO `email` (`nom`, `prenom`) VALUES (:nom, :prenom)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->execute();
    }

    // récupérer les informations de la BDD pour les afficher dans le tableau
    $sql = "SELECT * FROM `email`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        div {padding: 10px 0;}
        td, th {padding: 5px 10px;}
    </style>
</head>
<body>
    <h1>email</h1>
    <br>
    <h2>Ajout d'un client</h2>
    <!-- Action vide => renvoi ver sla page elle-même -->
    <!-- Method = POST ou GET (par défaut) -->
    <form action="" method="POST">
        <div>
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" placeholder="Nom">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input id="prenom" type="text" name="prenom" placeholder="Prénom">
        </div>
        <div>
            <button type="submit">Ajouter le client</button>
        </div>
    </form>
    <h2>email</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- tableau ici -->
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prenom']; ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>