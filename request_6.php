<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;
$requestError = "";

if(isset($_POST['run']))
{
    if(!empty($_POST['run']))
    {
        $showResult = true;
        $db = Database::connect();
        $request = $db->prepare('   SELECT animalName, ROUND((DATEDIFF(NOW(), a.BornAt)/365), 1) AS "Age", f.foodName, f.Composition
                                        FROM animals a
                                        JOIN food_items f
                                        ON a.IdFood = f.IdFood
                                        WHERE IdCategory = 1  
                                        ORDER BY `Age`  ASC
                                        
                                        ');
        $request->execute();
        $rows = $request->fetchAll();
    }
}

?>

<div class="container">

    <h1>Request 6</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>Diet of dogs according to their age</h2>

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
                        <th>Animal</th>
                        <th>Age</th>
                        <th>Régime</th>
                        <th>Composition</th>
            
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['animalName']; ?></td>
                    <td><?= $row['Age']; ?></td>
                    <td><?= $row['foodName']; ?></td>
                    <td><?= $row['Composition']; ?></td>
                </tr>

    <?php
            }  
        }
        else
        {
            echo '<img width="" src="img/request_5.PNG"/><br><br>';
        }
    ?>
            </table>

        <?= $requestError; ?>
</div>


