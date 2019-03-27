<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('       SELECT COUNT(a.IdAnimal) AS "Summer donations", 
                                        (SELECT COUNT(a.IdAnimal)
                                        FROM animals a
                                        WHERE a.ArrivalDate NOT LIKE "____-06-__"
                                        AND a.ArrivalDate NOT LIKE "____-07-__"
                                        AND a.ArrivalDate NOT LIKE "____-08-__") AS "Other donations"
                                    FROM animals a 
                                    WHERE a.ArrivalDate LIKE "____-06-__"
                                    OR a.ArrivalDate LIKE "____-07-__"
                                    OR a.ArrivalDate LIKE "____-08-__"
 ');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 1</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See animals who eat chicken and still are in chenils</h2>

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
                        <th>Summer donations </th>
                        <th>Other donations</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['Summer donations']; ?></td>
                    <td><?= $row['Other donations']; ?></td>
                </tr>

    <?php
            }  
        }
        else
        {
            echo '<img src="img/request_1.PNG"/>';
        }
    ?>
            </table>

            <ul><h5> Summer donations : </h5>
                    <li>Juin</li> 
                    <li>Juillet</li> 
                    <li>Aout</li> 
            </ul>
</div>
