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

    <h1>Request 8</h1>

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
            
            $bordeaux = $row['Chenil Bordeaux'];
            $marseille = $row['Chenil Marseille'];
            $paris = $row['Chenil Paris'];

            if(($bordeaux > $marseille) && ($bordeaux > $paris))
            {
                $diff1 = $bordeaux - $marseille;
                $diff2 = $bordeaux - $paris;
                
                $info = 'Le chenil de Bordeaux est le chenil qui a généré le plus d\'argent : <b>' . $bordeaux . ' €</b><br>
                        <b>' . $diff1 .' €</b> de plus que que Marseille, et <b>' . $diff2 . ' €</b> de plus que Paris';
            }
            else if(($marseille > $bordeaux) && ($marseille > $paris))
            {
                $diff1 = $marseille - $bordeaux;
                $diff2 = $marseille - $paris;

                $info = 'Le chenil de Marseille est le chenil qui a généré le plus d\'argent : <b>' . $marseille . ' €</b><br>
                        <b>' . $diff1 .' €</b> de plus que que Bordeaux, et <b>' . $diff2 . ' €</b> de plus que Paris';
            }
            else if(($paris > $marseille) && ($paris > $bordeaux))
            {
                $diff1 = $paris - $bordeaux;
                $diff2 = $paris - $marseille;

                $info = 'Le chenil de Paris est le chenil qui a généré le plus d\'argent : <b>' . $paris . ' €</b><br>
                        <b>' . $diff1 .' €</b> de plus que que Bordeaux, et <b>' . $diff2 . ' €</b> de plus que Marseille';
            }
        }
        else if($showResult == false)
        {
            echo '<img src="img/request_6.PNG"/>';
        } 
    ?>
            </table>

            <?php if($showResult)
            {
                echo $info;
            }
            ?>

</div>