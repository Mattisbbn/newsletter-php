<form class="principal_form" method="POST">
    <label for="password_input">Mot de passe</label>
    <input id="password_input" name="password" placeholder="Mot de passe" type="text">
    <button type="submit">Entrer le mot de passe</button>
</form>

<a href="index.php">Index</a>

<?php
$password = '1234';

if (isset($_POST['password'])) {
    $inputPassword = $_POST['password'];

    if ($inputPassword == $password) {
        setcookie('stored_password', json_encode($inputPassword), strtotime("+1 year"));
        include_once("./partials/table.php");
    }
} else if (isset($_COOKIE['stored_password'])) {
    $stored_password = json_decode($_COOKIE['stored_password']);
    if ($stored_password == $password) {
        include_once("./partials/table.php");
    } else {
        echo ("le mot de passe enregistré n'est pas le bon");
    }
} else {
    echo 'Veuillez entrer un mot de passe';
}


if (isset($_POST['delete_email'])) {
    $deleteId = intval($_POST['delete_email']);
    $rowid = $_POST["rowid"];
    $sql = "DELETE FROM emails WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $rowid, PDO::PARAM_INT);
    $stmt->execute();
    echo "Veuillez refresh pour voir les motifications";
}

if (isset($_POST['changeState'])) {
    $changeId = intval($_POST['changeState']);
    $row = fetchSingleDb($changeId);
    if ($row) {
        if ($row['disabled'] == 1) {
            $sql = "UPDATE emails SET disabled = 0 WHERE id = :id;";
        } else if ($row['disabled'] == 0) {
            $sql = "UPDATE emails SET disabled = 1 WHERE id = :id;";
        } else {
            echo "Erreur";
            exit;
        }

        // Prepare and execute the statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $changeId, PDO::PARAM_INT);
        $stmt->execute();

        echo "Veuillez rafraîchir pour voir les modifications";
    } else {
        echo "ID non trouvé";
    }
}





include_once("./partials/footer.php");
?>