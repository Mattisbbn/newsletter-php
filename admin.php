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
    <label for="password">Mot de passe</label>
    <input name="password" placeholder="Mot de passe" type="text">
    <button type="submit">Entrer le mot de passe</button>
</form>

<a href="index.php">Index</a>

<?php
$password = '1234';

if (isset($_POST['password'])) {
    $inputPassword = $_POST['password'];

    if ($inputPassword == $password) {

        include_once("./table.php");
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
}
?>

<script src="script.js"></script>