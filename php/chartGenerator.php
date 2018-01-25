<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $labels; ?>
            datasets: [{
                label: 'Emotional level over time',
                data: <?php echo $data; ?>
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)'
                ],
                borderWidth: 2
            }, {
                label: 'Average in general',
                data: <?php echo $average; ?>
                backgroundColor: [
                    'rgba(57, 123, 255, 0)'
                ],
                borderColor: [
                    'rgba(57, 123, 255, 1)'
                ],
                borderWidth: 1
            }, {
                label: 'Personal average',
                data: <?php echo $paverage; ?>
                backgroundColor: [
                    'rgba(3, 230, 63, 0)'
                ],
                borderColor: [
                    'rgba(3, 230, 63, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: '<?php echo $chart_title; //Is generated in search.php?>'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:false,
                        stepValue: 1,
                        min: 1,
                        max: 6
                    }
                }]
            }
        }
    });
</script>