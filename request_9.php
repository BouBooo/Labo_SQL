<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('SELECT c.categoryName, a.adopted, 
                                (SELECT COUNT(idAnimal) FROM animals WHERE adopted = 1 AND IdCategory = 1) as "adopt"
                                    FROM animals a     
                                    JOIN categories c    
                                    ON c.IdCategory = a.IdCategory   
                                    WHERE c.IdCategory = 1  
                                    AND a.adopted = 1      
                            ');
    $request->execute();
    $doggos = $request->fetch();



    $request2 = $db->prepare('SELECT c.categoryName, a.adopted, 
    (SELECT COUNT(idAnimal) FROM animals WHERE adopted = 1 AND IdCategory = 2) as "adopt"
        FROM animals a     
        JOIN categories c    
        ON c.IdCategory = a.IdCategory   
        WHERE c.IdCategory = 2   
        AND a.adopted = 1   
        ');
    $request2->execute();
    $cats = $request2->fetch();
}

?>

<div class="container">

    <h1>Request 9</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See adopted infos</h2>

    <form action="" method="POST">
        <input class="btn btn-info" type="submit" name="run" value="Run"/>
    </form>


    <?php
        if($showResult)
        {            
    ?>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Adoption</th>
                        <th>Adoption number</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                            if($doggos['adopted'] == 1)
                            {
                                $adoption  = "Adopted doggos";
                            }
                ?>
                <tr>
                    <td><?= $doggos['categoryName']; ?></td>
                    <td><?= $adoption ?></td>
                    <td><?= $doggos['adopt'] ?></td>
                </tr>
                <tr>

                <?php
                            if($cats['adopted'] == 1)
                            {
                                $adoption  = "Adopted cats";
                            }
                ?>
                    <td><?= $cats['categoryName']; ?></td>
                    <td><?= $adoption ?></td>
                    <td><?= $cats['adopt'] ?></td>
                </tr>

    <?php

        }
    ?>
            </table>

            <?php
            if($cats['adopt'] > $doggos['adopt'])
            {
                $adopt_info = 'Il y a plus d\'adoption de chats que de chiens';
            }
            else if($doggos['adopt'] > $cats['adopt'])
            {
                $adopt_info = 'Il y a plus d\'adoption de chiens que de chats';
            }
            else if($doggos['adopt'] == $cats['adopt'])
            {
                $adopt_info = 'Il y a autant d\'adoption de chiens que de chats';
            }

            echo $adopt_info;
            ?>

</div>
