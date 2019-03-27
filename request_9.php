<?php

require('_classes/database.php');
require('assets/head.php');

$showResult = false;
$request_error = "";


if(isset($_POST['run']))
{
    if(!empty($_POST['date_1']) && !empty($_POST['date_2']))
    {

            $date_1 = $_POST['date_1'];
            $date_2 = $_POST['date_2'];
            $showResult = true;


            $db = Database::connect();

            //Count how many doggos/cats are adopted

            $request = $db->prepare('   SELECT "Nombre adoption", COUNT(a.adopted) as "Chiens", 
                                                (SELECT COUNT(a.adopted) 
                                                FROM animals a     
                                                JOIN categories c    
                                                ON c.IdCategory = a.IdCategory 
                                                JOIN buyers b
                                                ON b.IdAnimal = a.IdAnimal  
                                                WHERE c.IdCategory = 2 
                                                AND a.adopted = 1
                                                AND b.AdoptedAt BETWEEN "' . $date_1 . '" AND "' . $date_2 . '" ) "Chats"

                                        FROM animals a     
                                        JOIN categories c    
                                        ON c.IdCategory = a.IdCategory 
                                        JOIN buyers b
                                        ON b.IdAnimal = a.IdAnimal  
                                        WHERE c.IdCategory = 1  
                                        AND a.adopted = 1
                                        AND b.AdoptedAt BETWEEN "' . $date_1 . '" AND "' . $date_2 . '"   

                                    ');
            $request->execute();
            $doggos = $request->fetch();
    }
    else
    {
        $request_error = '<span class="alert alert-danger">Please inquire all inputs</span>';
    }
}
?>

<div class="container">

    <h1>Request 9</h1>

    <a class="btn btn-dark" href="index.php">Forward</a>

    <h2>See which animal category has the most adoption between X date and X date</h2>


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



    <?php
        if($showResult)
        {            
    ?>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Adoption number</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Chiens</td>
                    <td><?= $doggos['Chiens'] ?></td>
                </tr>
                <tr>
                    <td>Chats</td>
                    <td><?= $doggos['Chats'] ?></td>
                </tr>

            </table>

            <?php
        }
        else
        {
            // Print if error
            echo $request_error . '<br><br>';

            // Show request
            echo '<img src="img/request_9.PNG"/><br><br>';
        }
        ?>

</div>
