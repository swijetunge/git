<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Pie Charts</title>
    <!-- <script src="js/jquery-migrate-1.0.0.js" type="text/javascript"></script> -->
    <script src="js/jquery-1.9.1.js" type="text/javascript"></script>
    <script>
        $(function () 
        {
            // On document ready, call visualize on the datatable.
            $(document).ready(function () 
            {
                /**
                * Visualize an HTML table using Highcharts. The top (horizontal) header
                * is used for series names, and the left (vertical) header is used
                * for category names. This function is based on jQuery.
                * @param {Object} table The reference to the HTML table to visualize
                * @param {Object} options Highcharts options
                */
                Highcharts.visualize = function (table, options) 
                {
                    // the categories
                    sliceNames = [];
                    $('tbody th', table).each(function (i) 
                    {
                        sliceNames.push(this.innerHTML);
                    });
	
                    // the data series
                    options.series = [];
                    $('tr', table).each(function (i) 
                    {
                        var tr = this;
                        $('th, td', tr).each(function (j) 
                        {
                            if (j > 0) { // skip first column
                                if (i == 0) 
                                { // get the name and init the series
                                    options.series[j - 1] = 
                                    {
                                        name: this.innerHTML,
                                        data: []
                                    };
                                }
                                else 
                                { // add values
                                    options.series[j - 1].data.push({name: sliceNames[i - 1], y: parseFloat(this.innerHTML)});
                                }
                            }
                        });
                    });

                    var chart = new Highcharts.Chart(options);
                }

                var table = document.getElementById('datatable'),
        options = {
            chart: {
                renderTo: 'container',
                type: 'pie'
            },
            title: {
                text: 'Data extracted from a HTML table in the page'
            },
            xAxis: {
        },
        yAxis: {
            title: {
                text: 'Units'
            }
        },
        tooltip: 
       {
            formatter: function() 
           {
               return '<b>'+ this.series.name +'</b><br/>'+
                  this.y +' '+ this.point.name;
            }
       },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    formatter: function () {
                        return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                    }
                }
            }
        }
    };

                Highcharts.visualize(table, options);
            });

        });

    </script>
</head>
<body>
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<table id="datatable" border=1>
    <thead>
        <tr>
            <th>Fruits</th>
            <th>Qty</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Apples</th>
            <td>3</td>

        </tr>
        <tr>
            <th>Pears</th>
            <td>2</td>

        </tr>
        <tr>
            <th>Plums</th>
            <td>5</td>

        </tr>
        <tr>
            <th>Bananas</th>
            <td>1</td>

        </tr>
        <tr>
            <th>Oranges</th>
            <td>2</td>

        </tr>
    </tbody>
</table>
</body>
</html>