<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('SELECT e.LastName, e.FirstName, e.Email, c.chenilName, comp.companyName, l.locationName, j.jobName
                            FROM employees e
                            JOIN chenil c
                            ON c.IdChenil = e.IdChenil 
                            JOIN company comp
                            ON comp.IdCompany = e.IdCompany
                            JOIN location l
                            ON l.IdLocation = e.IdLocation  
                            JOIN jobs j
                            ON j.IdJob = e.IdJob  
                            ORDER BY j.jobName DESC                  
                            ');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 6</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See employees infos</h2>

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
                        <th>Job</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Chenil</th>
                        <th>Company</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['jobName']; ?></td>
                    <td><?= $row['FirstName']; ?></td>
                    <td><?= $row['LastName']; ?></td>
                    <td><?= $row['Email']; ?></td>
                    <td><?= $row['locationName']; ?></td>
                    <td><?= $row['chenilName']; ?></td>
                    <td><?= $row['companyName']; ?></td>
                </tr>

    <?php
            }  
        }
    ?>
            </table>

</div>
