<?php
include_once "includes/survey.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Encuesta</title>
</head>

<body>
    <form action="#" method="POST">

        <?php
        
            $survey = new Survey();
            $showResults = false;

            
            if (isset($_POST['food'])) {
                $showResults = true;
                $survey->setOptionSelected($_POST['food']);
                $survey->vote();
            }            
        ?>

        <h2>What's your preffered food?</h2>

            <?php 
                if ($showResults) {
                    $foods = $survey->showResults();

                    echo '<h2>' . $survey->showTotalVotes() . ' votos totales</h2>';

                    foreach ($foods as $food) {
                        $porcentage = $survey->getPorcentages($food['votes']);
                        
                        include 'views/view-result.php';
                    }
                }
            ?>

        <input type="radio" name="food" id="" value="potatoes"> Potatoes <br>
        <input type="radio" name="food" id="" value="fish"> Fish <br>
        <input type="radio" name="food" id="" value="bacon"> Bacon <br>
        <input type="radio" name="food" id="" value="bistec"> Bistec <br>
        <input type="radio" name="food" id="" value="chicken"> Chicken <br>
        <input type="radio" name="food" id="" value="poto"> Poto <br>

        <input type="submit" value="Vote!">
    </form>

   
</body>

</html>