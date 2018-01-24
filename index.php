<?php		
    include_once 'database.php';
    
    $statement = $pdo->prepare("DESCRIBE $table_name");
    $statement->execute();
    $tables = $statement->fetchAll(PDO::FETCH_COLUMN);
    
    $sql = "SELECT ".$tables[1].", ".$tables[2]." FROM ".$table_name;
    $statement = $pdo->prepare($sql);
    $result = $statement->execute();
    
    

    $data = "[";
    $labels = "[";
    for($i = 0; $row = $statement->fetch(); $i++) {
        $labels = $labels.'"'.$row[0].'", ';
        $data = $data.'"'.$row[1].'", ';
    }
    $data = substr($data, 0, -2);
    $labels = substr($labels, 0, -2);
    $data = $data."],";
    $labels = $labels."],";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <script language="javascript" type="text/javascript" src="js/Chart.js"></script>
    </head>
    
    
    <body>
        
    <form action="index.php" method="post">
        <input type="search" class="search" name="search" placeholder="Search..." autofocus>
    </form>
        
        
    <div class="chart-container" style="position: relative; height:40vh; width:99vw">
        <canvas id="myChart"></canvas>
    </div>
        
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo $labels; ?>
                    datasets: [{
                        label: 'Emotional level (higher is better)',
                        data: <?php echo $data; ?>
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:false,
                                stepValue: 1,
                                max: 6
                            }
                        }]
                    }
                }
            });
        </script>
    </body>
</html>
