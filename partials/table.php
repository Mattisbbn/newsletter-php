<?php

$sql = "SELECT * FROM emails";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
?>



<table border="1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>État</th>
            <th></th>
            <th><button onclick="copyText()">copy</button></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $row) : ?>
            <tr>

                <?php
                if ($row['disabled'] == 0) {
                    $disabled = false;
                } else {
                    $disabled = true;
                }
                ?>


                <?php echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . ("<div class='email' disabled='$disabled' >" . $row['email'] . "</div>") . "</td>";
                if ($disabled == 0) {
                    echo "<td>" . "Activé" . "</td>";
                } else {
                    echo "<td>" . 'Desactivé' . "</td>";
                } ?>

                <td>


                    <form method="POST">
                        <input type="hidden" name="rowid" value="<?php echo intval($row['id']); ?>">
                        <button name="delete_email" type="submit">Delete</button>
                    </form>

                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="changeState" value="<?php echo intval($row['id']); ?>">
                        <button type="submit">
                            <?php
                            if ($disabled == true) {
                                echo ("Activer");
                            } else {
                                echo ("Désactiver");
                            }
                            ?>
                        </button>
                    </form>
                </td>


            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<span></span>