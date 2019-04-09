<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;
$requestError = "";

if(isset($_POST['run']))
{
        $showResult = true;
        $db = Database::connect();


        $sql = '        SELECT ROUND(AVG((f.price*3)), 2) AS "AVG daily doggo" , 
                            ROUND(AVG((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "AVG total doggo", 
                            ROUND(SUM((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "total doggo", 
                                (SELECT ROUND(AVG((f.price*3)),2)
                                FROM food_items f
                                JOIN animals a 
                                ON a.IdFood = f.IdFood
                                JOIN donators d 
                                ON d.IdAnimal = a.IdAnimal
                                WHERE a.IdCategory = 2) AS "AVG daily cat",
                                (SELECT ROUND(AVG((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "AVG total cat" 
                                FROM food_items f
                                JOIN animals a 
                                ON a.IdFood = f.IdFood
                                JOIN donators d 
                                ON d.IdAnimal = a.IdAnimal
                                WHERE a.IdCategory = 2 ) AS "AVG total cat", 
                                (SELECT ROUND(SUM((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "AVG total cat" 
                                FROM food_items f
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

    <h1>Request 7</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h3>Which animal's category is the most expensive to feed : </h3>
    </h3>
    

    

    <form action="" method="POST">
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

            if($row['total doggo'] > $row['total cat'])
            {
                $diff_total = round($row['total doggo'] - $row['total cat'], 2.3);
                $avg_daily = round($row['AVG daily doggo'] - $row['AVG daily cat'], 2.3 );
                $avg_total = round($row['AVG total doggo'] - $row['AVG total cat'], 2.3 );
                $cost_info = 'Au total, les chiens sont plus cher à nourrir que les chats de <b>' . $diff_total . '€</b><br>
                            Le cout journalier d\'un chien est, en moyenne, plus cher de <b>' . $avg_daily . '€</b><br>
                            Et en moyenne, à nourrir, un chien coûte plus cher de  <b>' . $avg_total . '€ </b>';

                
            }
            else if($row['total doggo'] < $row['total cat'])
            {
                $diff_total = $row['total cat'] - $row['total doggo'];
                $cost_info = 'Au total, les chats sont plus cher à nourrir que les chiens de ' . $diff_total;
            }
            else if($row['total doggo'] == $row['total cat'])
            {
                $cost_info = 'Les chiens sont aussi cher à nourrir que les chats';
            }

            echo $cost_info; 

            
            
            $db = Database::disconnect(); 
        }
        else
        {
            echo '<img width="600" src="img/request_4.PNG"/><br><br>';
        }
    ?>
            </table>

            

</div>




