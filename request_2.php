<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('   SELECT COUNT(a.IdAnimal) as "Adopted animals count", 
                                    ROUND(AVG(DATEDIFF(b.adoptedAt, a.BornAt)/365), 2) as "Average age"
                                    FROM animals a
                                    JOIN buyers b 
                                    ON a.IdAnimal = b.IdAnimal
                                    WHERE a.adopted = 1
                                    
                                    ');
    $request->execute();
    $rows = $request->fetchAll();
}


?>

<div class="container">

    <h1>Request 2</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>Determiner l'age moyen des animaux adoptés</h2>

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
                        <th>Number of adopted animals</th>
                        <th>Average age</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['Adopted animals count']; ?> animals</td>
                    <td><?= $row['Average age']; ?> years old</td>
                </tr>

    <?php
            }  
        }
        else
        {
            echo '<img src="img/request_2.PNG"/><br><br>';
        }
    ?>
            </table>

</div>