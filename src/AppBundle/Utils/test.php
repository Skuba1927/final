<?php

?>
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Число');
        data.addColumn('number', 'Guardians of the Galaxy');


        data.addRows([
            [11, 41.8],
            [12,  32.4],
            [13, 25.7],
            [14,   10.5],
            [15,  10.4],
            [16, 7.7],
            [17,   9.6]

        ]);

        var options = {
            chart: {
                title: 'Курс'
        },
            width: 900,
        height: 500,
        axes: {
                x: {
                    0: {side: 'top'}
          }
            }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
</head>
<body>
  <div id="line_top_x"></div>
</body>
</html>