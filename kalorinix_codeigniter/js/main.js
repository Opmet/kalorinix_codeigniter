/**
 * Google jsapi Visar diagram.
 * @Link https://www.google.com/jsapi
 */
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart); //Pie chart
      google.setOnLoadCallback(drawVisualization); //Combo chart
      
      /**
       * Pie chart
       */
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Kolhydrat',     11],
          ['Fett',      2],
          ['Protein',  2]
        ]);

        var options = {
          title: 'Dagens näringstabell'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
      /**
       * Combo chart
       */
      function drawVisualization() {
    	  // Some raw data (not necessarily accurate)
    	  var data = google.visualization.arrayToDataTable([
             ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Kalori mål'],
             ['Måndag',  165,      938,         522,             998,           450,      2500],
             ['Tisdag',  135,      1120,        599,             1268,          288,      2500],
             ['Onsdag',  157,      1167,        587,             807,           397,      2500],
             ['Torsdag',  139,      1110,        615,             968,           215,     2500],
             ['Fredag',  136,      691,         629,             1026,          366,      2500],
             ['Lördag',  139,      1110,        615,             968,           215,      2500],
             ['Söndag',  136,      691,         629,             1026,          366,      2500]
          ]);
    	  
    	  var options = {
    			  title : 'Veckans kaloritabell',
    			  vAxis: {title: "Kalorier"},
    			  hAxis: {title: "Vecka 36"},
    			  seriesType: "bars",
    			  series: {5: {type: "line"}}
    			  };
    	  
    	  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    	  chart.draw(data, options);
       }
