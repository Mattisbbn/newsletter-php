<form class="principal_form" method="POST">
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="email" required>
    <button type="submit">Confirmer</button>
</form>

<?php


if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pdo = connectToDb('localhost', 'db1', 'mattis', '49610');
    $sql = "INSERT INTO emails (email) VALUES (:email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
}
?>
<a href="?admin">Admin</a>
<a href="?unsubscribe">Unsubscribe</a>
</body>

</html>