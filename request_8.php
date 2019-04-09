<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('   SELECT r.IdRoom, r.roomName, r.capacity, c.categoryName,
                                    (SELECT COUNT(idAnimal) FROM animals WHERE idRoom = r.IdRoom AND adopted = 0) as "amaux"
                                FROM rooms r
                                JOIN categories c
                                ON c.IdCategory = r.IdCategory
                                ORDER BY r.roomName   
                                            
                            ');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 8</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See rooms infos</h2>

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
                        <th>Id room</th>
                        <th>Room</th>
                        <th>Animals / Capacity</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['IdRoom']; ?></td>
                    <td><?= $row['roomName']; ?></td>
                    <td><?= $row['amaux'] . ' / ' . $row['capacity']; ?></td>
                    <td><?= $row['categoryName']; ?></td>
                </tr>

    <?php
            }  
        }
        else
        {
            echo '<img width="" src="img/request_8.PNG"/><br><br>';
        }
    ?>
            </table>

</div>
