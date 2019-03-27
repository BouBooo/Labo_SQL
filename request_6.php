<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;



if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('   SELECT DISTINCT
                                    (SELECT SUM(i.Payement) 
                                    FROM invoice i 
                                    JOIN animals a
                                    ON a.IdAnimal = i.IdAnimal
                                    JOIN chenil c
                                    ON c.IdChenil = a.IdChenil
                                    WHERE c.IdChenil = 1
                                    ) as "Chenil Bordeaux",
                                    
                                        (SELECT SUM(i.Payement) 
                                    FROM invoice i 
                                    JOIN animals a
                                    ON a.IdAnimal = i.IdAnimal
                                    JOIN chenil c
                                    ON c.IdChenil = a.IdChenil
                                    WHERE c.IdChenil = 2
                                    ) as "Chenil Marseille",
                                    
                                        (SELECT SUM(i.Payement) 
                                    FROM invoice i 
                                    JOIN animals a
                                    ON a.IdAnimal = i.IdAnimal
                                    JOIN chenil c
                                    ON c.IdChenil = a.IdChenil
                                    WHERE c.IdChenil = 3
                                    ) as "Chenil Paris"
                                FROM chenil c
                            ');
                            
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 6</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See which chenil won most money </h2>

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
                        <th>Bordeaux</th>
                        <th>Marseille</th>
                        <th>Paris</th>

                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['Chenil Bordeaux']?> €</td>
                    <td><?= $row['Chenil Marseille']?> €</td>
                    <td><?= $row['Chenil Paris']?> €</td>
                </tr>

    <?php
            } 
        }
        else if($showResult == false)
        {
            echo '<img src="img/request_6.PNG"/>';
        } 
    ?>
            </table>

</div>
