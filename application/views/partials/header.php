<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads and Clients</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- CSS -->
   <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/style.css">
    
   <!-- jQuery Canvas -->
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>  
    <script src="<?php echo base_url('assets/javascript/charts.php'); ?>"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        window.onload = function () {
        
        var options = {
            title: {
                text: "Customers and number of new leads"
            },
            
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 40,
                toolTipContent: "<b>{label}</b> - {y}",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 13,
                indexLabel: "{label} - {y}",
                dataPoints: [
<?php   
            foreach($leads as $lead){ ?>
                    { y: <?= $lead['number_of_leads'] ?>, label: "<?= $lead['client_name'] ?>" },
<?php } ?>
                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);
        
        }
    </script>
</head>
<body>
