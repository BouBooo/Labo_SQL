<meta charset="UTF-8"/>

<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('   SELECT a.IdAnimal, a.animalName, f.Composition, f.foodName, c.chenilName
                                FROM animals a
                                JOIN food_items f
                                ON f.IdFood = a.IdFood
                                JOIN chenil c
                                ON c.IdChenil = a.IdChenil 
                                WHERE f.IdFood = 2
                                AND c.IdChenil = 3           
                            ');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 1</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>Get PetHeaven informations</h2>

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
                        <th>Animal name</th>
                        <th>Chenil</th>
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
                    <td><?= $row['chenilName']; ?></td>
                    <td><?= $row['foodName']; ?></td>
                    <td><?= $row['Composition']; ?></td>
                </tr>

    <?php
            }  
        }
        else
        {
            echo '<img src="img/request_7.PNG"/>';
        }
    ?>
            </table>

</div>

