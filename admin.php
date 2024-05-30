<?php include_once("partials/header.php") ?>
<?php
function connectToDb($host, $db, $user, $pass){
    $pdo = new PDO('mysql:host=' . $host . '; port=3306; dbname=' . $db, $user, $pass);
    return $pdo;
}
$pdo = connectToDb('localhost', 'db1', 'mattis', '49610');
$sql = "SELECT * FROM emails";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
?>

<form class="principal_form" method="POST" action="">
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

if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    $sql = "DELETE FROM emails WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
    $stmt->execute();
    echo "Veuillez refresh pour voir les motifications";
}

if (isset($_POST['changeState'])) {
    $changeId = intval($_POST['changeState']);
    foreach ($results as $row) {
        if ($row['disabled'] == 1) {
            $sql = "UPDATE emails SET disabled = 0 WHERE id = :id;";
        } else {
            $sql = "UPDATE emails SET disabled = 1 WHERE id = :id;";
        }
    }
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $changeId, PDO::PARAM_INT);
    $stmt->execute();
    
    echo "Veuillez rafraîchir pour voir les modifications";
}



include_once("./partials/footer.php");
?>

