<?php include_once("partials/header.php") ?>
<form class="principal_form" method="POST" action="">
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="email" required>
    <button type="submit">Confirmer</button>
</form>

<?php
 function connectToDb($host, $db, $user, $pass){
    $pdo = new PDO('mysql:host=' . $host . '; port=3306; dbname=' . $db, $user, $pass);
    return $pdo;
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $pdo = connectToDb('localhost', 'db1', 'mattis', '49610');
    $sql = "INSERT INTO emails (email) VALUES (:email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
}
?>
<a href="admin.php">Admin</a>
<a href="unsubscribe.php">Unsubscribe</a>

</body>

</html>