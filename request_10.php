<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('SELECT DISTINCT r.IdRace, r.raceName, 
                                (SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.adopted = 1) as "total",
                                (SELECT COUNT(a.IdRace) FROM animals a WHERE a.IdRace = r.IdRace AND a.adopted = 0) as "races"
                            FROM races r
                            JOIN animals a
                            ON a.IdRace = r.IdRace
                            ORDER BY r.raceName                   
                            ');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 10</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See how many animals remain to be adopted for each breed</h2>

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
                        <th>Race</th>
                        <th>Nbr to be adopted</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['IdRace']; ?></td>
                    <td><?= $row['raceName']; ?></td>
                    <td><?= $row['races']; ?></td>

                </tr>
    <?php
            } 

        }
    ?>
            </table>

</div>