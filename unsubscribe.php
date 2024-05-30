<?php include_once("./partials/header.php") ?>
<form class="principal_form" method="POST">
    <label for="unsubscribe_input">Unsubscribe</label>
    <input id="unsubscribe_input" name="unsub_email" placeholder="Email" type="email">
    <button type="submit">Confirmer</button>
</form>

<?php
function connectToDb($host, $db, $user, $pass)
{
    $pdo = new PDO('mysql:host=' . $host . '; port=3306; dbname=' . $db, $user, $pass);
    return $pdo;
}


if (isset($_POST["unsub_email"]) && $_POST["unsub_email"] !== "") {

    $unsub_email = $_POST["unsub_email"];



    $pdo = connectToDb('localhost', 'db1', 'mattis', '49610');
    $sql = "SELECT email FROM emails";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (in_array($unsub_email, $emails)) {
        $deleteCommand = "DELETE FROM emails WHERE email = :unsub_email";
        $stmtDelete = $pdo->prepare($deleteCommand);
        $stmtDelete->bindParam(':unsub_email', $unsub_email);
        $stmtDelete->execute();
    } else {
        echo ("L'email n'existe pas dans la base de données ");
    }
};



?>





<a href="index.php">index</a>


<!-- //commmande sql
"DELETE FROM emails WHERE email = "test@test.com";" -->