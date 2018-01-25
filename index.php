<?php		
    require_once 'php/database.php';
    
    $statement = $pdo->prepare("DESCRIBE $table_name");
    $statement->execute();
    $tables = $statement->fetchAll(PDO::FETCH_COLUMN);
    
    //Handles, which data is shown, when the search is activated
    require_once 'php/search.php';

    //Makes calculations and "prepares" the arrays for the chart
    require_once 'php/chartHelper.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Emotion Chart</title>
        
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <script language="javascript" type="text/javascript" src="js/Chart.js"></script>
    </head>
    
    
    <body>
        
    <form action="index.php" method="get">
        <input type="search" class="search" name="search" class="search" placeholder="Search..." autofocus>
    </form>
        
        
    <div class="chart-container" style="position: relative; height:40vh; width:99vw">
        <canvas id="myChart"></canvas>
    </div>
        
         <?php require_once 'php/chartGenerator.php'; //Loads the js to generate the chart ?>
         
    </body>
</html>
