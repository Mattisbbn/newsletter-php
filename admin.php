<?php include_once ("partials/header.php") ?>
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

<form method="POST" action="">
    <label for="">Mot de passe</label>
    <input name="password" placeholder="Mot de passe" type="text">
    <button type="submit">Entrer le mot de passe</button>
</form>

<a href="index.php">Index</a>

<?php
$password = '1234';

if (isset($_POST['password'])) {
    $inputPassword = $_POST['password'];

    if ($inputPassword == $password) {
    ?>
        <table border="1px">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th><button onclick="copyText()">copy</button></th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo("<div class='email'>".$row['email']."</div>"); ?></td>
                        <td><a href="?delete=<?php echo intval($row['id']) ?>">Delete</a></td>
                    </tr>


                <?php endforeach; ?>

            </tbody>
        </table>
        <?php
    }
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