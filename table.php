<table border="1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>État</th>
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


                <td><?php echo $row['id']; ?></td>
                <td><?php echo ("<div class='email' disabled='$disabled' >" . $row['email'] . "</div>"); ?></td>
                <td><?php if ($disabled == 0) {
                        echo 'Activé';
                    } else {
                        echo ('Desactivé');
                    } ?>
                </td>
                <td><a href="?delete=<?php echo intval($row['id']) ?>">Delete</a></td>

            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<span></span>