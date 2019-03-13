<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;
$requestError = "";

if(isset($_POST['run']))
{
        $showResult = true;
        $db = Database::connect();


        $sql = 'SELECT AVG((f.price*3)) AS "AVG daily doggo" , AVG((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))) AS "AVG total doggo", SUM((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))) AS "total doggo", (SELECT AVG((f.price*3))
        FROM food_items f
        JOIN animals a 
        ON a.IdFood = f.IdFood
        JOIN donators d 
        ON d.IdAnimal = a.IdAnimal
        WHERE a.IdCategory = 2) AS "AVG daily cat", (SELECT(AVG((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt)))) AS "AVG total cat" FROM food_items f
        JOIN animals a 
        ON a.IdFood = f.IdFood
        JOIN donators d 
        ON d.IdAnimal = a.IdAnimal
        WHERE a.IdCategory = 2 ) AS "AVG total cat", (SELECT(SUM((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt)))) AS "AVG total cat" FROM food_items f
        JOIN animals a 
        ON a.IdFood = f.IdFood
        JOIN donators d 
        ON d.IdAnimal = a.IdAnimal
        WHERE a.IdCategory = 2 ) AS "total cat"
        
        FROM food_items f
        JOIN animals a 
        ON a.IdFood = f.IdFood
        JOIN donators d 
        ON d.IdAnimal = a.IdAnimal
        WHERE a.IdCategory = 1';


        $request = $db->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll();    
}

?>

<div class="container">

    <h1>Request 4</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h3>See how many each animal cost since it arrived : </h3>
    </h3>

    <form action="" method="POST">
        <label for="chenil">Price for feed animals :</label>

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
                        <th>Daily average for doggo</th>
                        <th>Total average for doggo</th>
                        <th>Total doggos</th>
                        <th>Daily average for cat</th>
                        <th>Total average for cat</th>
                        <th>Total cats</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['AVG daily doggo']; ?> €</td>
                    <td><?= $row['AVG total doggo']; ?> €</td>
                    <td><?= $row['total doggo']; ?> €</td>
                    <td><?= $row['AVG daily cat']; ?> €</td>
                    <td><?= $row['AVG total cat']; ?> €</td>
                    <td><?= $row['total cat']; ?> €</td>
                    
                </tr>

    <?php
            } 
            $db = Database::disconnect(); 
        }
    ?>
            </table>

</div>