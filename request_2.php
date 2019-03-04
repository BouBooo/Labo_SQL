<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('SELECT c.chenilName, c.IdChenil, l.locationName, comp.companyName FROM chenil c JOIN location l ON c.IdLocation = l.IdLocation JOIN company comp ON comp.IdCompany = l.IdCompany');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 2</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See chenils</h2>

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
                        <th>ID</th>
                        <th>Chenil</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Number of animals</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
                $countAnimals = $db->prepare("SELECT * 
                FROM animals 
                WHERE IdChenil = ?");

                $countAnimals->execute(array($row['IdChenil']));
                $count = $countAnimals->rowCount();
                var_dump($count);
    ?>
                <tr>
                    <td><?= $row['IdChenil']; ?></td>
                    <td><?= $row['chenilName']; ?></td>
                    <td><?= $row['companyName']; ?></td>
                    <td><?= $row['locationName']; ?></td>
                    <td><?= $count; ?></td>
                </tr>

    <?php
            }  
        }
    ?>
            </table>

</div>