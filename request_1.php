<meta charset="UTF-8"/>

<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('   SELECT COUNT(com.IdCompany) as "Company",
                                    (SELECT COUNT(c.IdChenil) FROM chenil c) as "Chenils",
                                    (SELECT COUNT(e.IdEmployee) FROM employees e) as "Employees",
                                    (SELECT COUNT(j.IdJob) FROM jobs j) as "Jobs",
                                    (SELECT COUNT(a.IdAnimal) FROM animals a) as "Animals",
                                    (SELECT COUNT(cat.IdCategory) FROM categories cat) as "Categories",
                                    (SELECT COUNT(r.IdRace) FROM races r) as "Races"
                                FROM company com  

                            ');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 1</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>Get PetHeaven informations</h2>

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
                        <th>Company</th>
                        <th>Chenils</th>
                        <th>Employees</th>
                        <th>Jobs</th>
                        <th>Animals</th>
                        <th>Categories</th>
                        <th>Races</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['Company']; ?></td>
                    <td><?= $row['Chenils']; ?></td>
                    <td><?= $row['Employees']; ?></td>
                    <td><?= $row['Jobs']; ?></td>                    
                    <td><?= $row['Animals']; ?></td>
                    <td><?= $row['Categories']; ?></td>
                    <td><?= $row['Races']; ?></td>

                </tr>

    <?php
            }  
        }
        else
        {
            echo '<img src="img/request1.PNG"/>';
        }
    ?>
            </table>

</div>

