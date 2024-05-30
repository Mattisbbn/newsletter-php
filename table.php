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
                foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo("<div class='email'>".$row['email']."</div>"); ?></td>
                        <td><?php if($row['disabled'] == 0){
                            echo'Activé';
                        }else{
                            echo('<span disabled="true">Desactivé</span>');
                        }
                        
                        
                        
                        
                        ?></td>
                        <td><a href="?delete=<?php echo intval($row['id']) ?>">Delete</a></td>
                       
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <span ></span>