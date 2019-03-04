<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;
$requestError = "";

if(isset($_POST['run']))
{
    if(!empty($_POST['name']))
    {
        $name = $_POST['name'];
        $showResult = true;
        $db = Database::connect();
        $request = $db->prepare('SELECT r.raceName, cat.categoryName, a.IdAnimal, a.animalName, c.chenilName, d.donatorName, d.GivenAt 
                                 FROM animals a 
                                 JOIN donators d 
                                 ON d.IdDonator = a.IdDonator 
                                 JOIN chenil c 
                                 ON c.IdChenil = a.IdChenil 
                                 JOIN categories cat 
                                 ON cat.IdCategory = a.IdCategory 
                                 JOIN races r 
                                 ON r.IdRace = a.IdRace 
                                 WHERE a.animalName LIKE("%'.$name.'%")');
        $request->execute(array($name));
        $rows = $request->fetchAll();
    }
    else
    {
        $requestError = "<span class='alert alert-danger'>Merci de compléter tous les champs</span>";
    }
}

?>

<div class="container">

    <h1>Request 5</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See animals informations</h2>

    <form action="" method="POST">
        <label for="name">Animals :</label>
        <input name="name" type="text" placeholder="Animal name"/>

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
                        <th>Name</th>
                        <th>Category</th>
                        <th>Race</th>
                        <th>Arrival date</th>
                        <th>Donator</th>
                        <th>Chenil</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['IdAnimal']; ?></td>
                    <td><?= $row['animalName']; ?></td>
                    <td><?= $row['categoryName']; ?></td>
                    <td><?= $row['raceName']; ?></td>
                    <td><?= $row['GivenAt']; ?></td>
                    <td><?= $row['donatorName']; ?></td>
                    <td><?= $row['chenilName']; ?></td>
                </tr>

    <?php
            }  
        }
    ?>
            </table>

        <?= $requestError; ?>
</div>