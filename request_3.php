<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('   SELECT DISTINCT
                                    (SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.IdChenil = 1 AND a.adopted = 0) as "Bordeaux animals",
                                    (SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.IdChenil = 2 AND a.adopted = 0) as "Marseille animals",
                                    (SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.IdChenil = 3 AND a.adopted = 0) as "Paris animals",
                                    (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdChenil = 1 AND e.IdJob = 4) as "Bordeaux employees",
                                    (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdChenil = 2 AND e.IdJob = 4) as "Marseille employees",
                                    (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdChenil = 3 AND e.IdJob = 4) as "Paris employees",
                                    (	ROUND((SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.adopted = 0) 
                                        / 
                                        (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdJob = 4))) as "Avg"
                                FROM animals
                                
                                ');
    $request->execute();
    $rows = $request->fetchAll();

}

?>

<div class="container">

    <h1>Request 3</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>Watch how many animals can manage an employee</h2>

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
                        <td><b>Bordeaux</b> (Animals / Employees)</td>
                        <td><b>Marseille</b> (Animals / Employees)</td>
                        <td><b>Paris</b> (Animals / Employees)</td>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['Bordeaux animals']; ?> / <?= $row['Bordeaux employees']; ?></td>
                    <td><?= $row['Marseille animals']; ?> / <?= $row['Marseille employees']; ?></td>
                    <td><?= $row['Paris animals']; ?> / <?= $row['Paris employees']; ?></td>
                </tr>

    <?php
            }  

            $info =  'An employee manages an average of <b>'. $row['Avg'] .'</b> animals';
        }
        else
        {
            echo '<img src="img/request_3.PNG"/><br><br>';
        }
        
    ?>
            </table>

            <?php
            if($showResult)
            {
                echo $info;
            }
            ?>

</div>