<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;
$requestError = "";

if(isset($_POST['run']))
{
    if(!empty($_POST['date_1']) && !empty($_POST['date_2']))
    {
        $showResult = true;
        $db = Database::connect();
        $date_1 = $_POST['date_1'];
        $date_2 = $_POST['date_2'];


        $sql = 'SELECT d.GivenAt, r.raceName, d.donatorName, a.IdAnimal, a.animalName, cat.categoryName 
                FROM animals a 
                JOIN categories cat 
                ON a.IdCategory = cat.IdCategory 
                JOIN donators d 
                ON d.IdDonator = a.IdDonator 
                JOIN races r 
                ON r.IdRace = a.IdRace 
                WHERE d.GivenAt BETWEEN "' . $date_1 . '" AND "' . $date_2 . '" 
                ORDER BY d.GivenAt';
        $request = $db->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll();   
    }
    else
    {
        $requestError = "<span class='alert alert-danger'>Merci de compléter tous les champs</span>";
    }
 
}

?>

<div class="container">

    <h1>Request 4</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h3>On cherche à connaitre les infos suivantes pour les animaux arrivés entre deux dates (définies par l'utilisateur) : </h3>
        <ul>
            <li>Nom de l'animal</li>
            <li>Catégorie de l'animal</li>
            <li>Race de l'animal</li>
            <li>Nom du donator</li>
            <li>Date d'arrivée de l'animal</li>
        </ul>
    </h3>

    <form action="" method="POST">
        <label for="chenil">Animals arrived between :</label>
        <input name="date_1" type="text" placeholder="2019-05-25" value="<?php
                                                                    if(!empty($_POST['date_1']))
                                                                    {
                                                                        echo $_POST['date_1'];
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '" placeholder="2016-05-25';
                                                                    }
                                                                    ?> 
                                                                    "/>

        <label for="chenil">and :</label>
        <input name="date_2" type="text" placeholder="2019-05-25" value="<?php
                                                                    if(!empty($_POST['date_2']))
                                                                    {
                                                                        echo $_POST['date_2'];
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '" placeholder="2019-05-25';
                                                                    }
                                                                    ?> 
                                                                    "/>

        <input class="btn btn-info" type="submit" name="run" value="Run"/>
    </form>

    <?= $requestError; ?>


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
                        <th>Donator</th>
                        <th>Arrival date</th>
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
                    <td><?= $row['donatorName']; ?></td>
                    <td><?= $row['GivenAt']; ?></td>
                </tr>

    <?php
            }  
        }
    ?>
            </table>

</div>