<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('   SELECT DISTINCT r.raceName, 
                                    (SELECT COUNT(a.IdRace) 
                                        FROM animals a 
                                        WHERE a.IdRace = r.IdRace 
                                        AND a.adopted = 1) as "Adopted"
                                FROM races r
                                JOIN animals a
                                ON a.IdRace = r.IdRace
                                ORDER BY Adopted DESC

                            ');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 4</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See the most popular dog breed</h2>

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
                        <th>Race</th>
                        <th>Adopted</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['raceName']; ?></td>
                    <td><?= $row['Adopted']; ?></td>

                </tr>
    <?php
            } 

        }
        else
        {
            echo '<img width="" src="img/request_10a.PNG"/><br><br>';
        }
    ?>
            </table>

        <?php
        if($showResult)
        {
            echo '<p>Shiba are the most adopted dogs: <b>5</b></p>';
        }
        ?>
            

</div>