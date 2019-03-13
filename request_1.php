<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;

if(isset($_POST['run']))
{
    $showResult = true;
    $db = Database::connect();
    $request = $db->prepare('SELECT * FROM categories');
    $request->execute();
    $rows = $request->fetchAll();
}

?>

<div class="container">

    <h1>Request 1</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See animals who eat chicken and still are in chenils</h2>

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
                        <th>Category's name</th>
                    </tr>
                </thead>
                <tbody>
    <?php   
            foreach($rows as $row)
            {
    ?>
                <tr>
                    <td><?= $row['IdCategory']; ?></td>
                    <td><?= $row['categoryName']; ?></td>
                </tr>

    <?php
            }  
        }
    ?>
            </table>

</div>
