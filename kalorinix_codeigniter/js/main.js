"use strict";

var test = 0;

/**
 * Hanterar hämtning av data från databasen och överlämning till tabellen.
 * @link http://www.w3schools.com/jsref/met_win_cleartimeout.asp
 */
function calorieCounter(p_path){
	this.path = p_path;
	this.timeoutID  = false;
	
	//AJAX med REST, en sekunds fördröjning, hanterar food items från datakällan.
	this.updateList = function() {
		if(this.timeoutID){window.clearTimeout(this.timeoutID);}
		this.timeoutID = setTimeout(function(){
			   $("#foodText").hide();
			   var param = "/" + document.getElementById("searchTxt").value;

			   //AJAX get json
			   $.getJSON(this.path + param)
				    .done(function( jsonData ) {
				    	var count = 0;
					    $( "#dataTable" ).empty();
				    	$.each(jsonData, function(index) {
				    		var row = '';
				            
				    		row += '<tr><td id=\"item' + (++count) + '\"><span>';
				    		row += jsonData[index].food_item;
				    		row += '</span></td></tr>';

				    		$( "#dataTable" ).append( row );

				    		//Event click handler
				    		$( "#item" + (count) + "" ).on( "click", {
				    			id_food: jsonData[index].id_food,
				    			food_item: jsonData[index].food_item,
					    		st: jsonData[index].st,
					    		l: jsonData[index].l, 
					    		dl: jsonData[index].dl, 
					    		msk: jsonData[index].msk, 
					    		tsk: jsonData[index].tsk, 
					    		krm: jsonData[index].krm
					    		}, sendToTableModal );
				        });
				    });
			   
			},1000); //1000 milli sekund.
		};
		
		//Event handler som initierar och visar modalen send_to_table, som skickar data till tabellen.
	    var sendToTableModal = function( event ) {

			  $("#send_to_table_item").text( event.data.food_item + ':' );

			  $( "#selectOptions" ).empty();
			  
			  //Standard enhet.
			  $("#selectTableOptions").append( "<option value=\"g\">Gram (g)</option>" );
			  
			  if(event.data.st > 0)//Lägg till om extra enheter är över 0.
			  {
				  $("#selectTableOptions").append( "<option value=\"st\">Stycken (st):</option>" );
			  }
			  if(event.data.l > 0)//Lägg till om extra enheter är över 0.
			  {
				  $("#selectTableOptions").append( "<option value=\"l\">Liter (l)</option>" );
			  }
			  if(event.data.dl > 0)//Lägg till om extra enheter är över 0.
			  {
				  $("#selectTableOptions").append( "<option value=\"dl\">Deciliter (dl):</option>" );
			  }
			  if(event.data.msk > 0)//Lägg till om extra enheter är över 0.
			  {
				  $("#selectTableOptions").append( "<option value=\"msk\">Matsked (msk):</option>" );
			  }
			  if(event.data.tsk > 0)//Lägg till om extra enheter är över 0.
			  {
				  $("#selectTableOptions").append( "<option value=\"tsk\">Tesked (tsk):</option>" );
			  }
			  if(event.data.krm > 0)//Lägg till om extra enheter är över 0.
			  {
				  $("#selectTableOptions").append( "<option value=\"krm\">Kryddmått (krm):</option>" );
			  }
			  
			  //Visa modal.
			  $('#send_to_table').modal('show');
		};
}
	
/**
 * @link http://www.w3schools.com/jquery/html_hasclass.asp
 */
function sendToTable(){
	
	//Test
	this.update = function() {
		var str_tr = "<tr>";
		
		//Om sista tagen inte är markerad. Markera den nya. Varanan tabellrad ska färgläggas.
		if( !$("#counter").last().hasClass("alt") && test !=1){ str_tr = "<tr class=\"alt\">"; test = 1; }
		else{ test = 0; }
		
		var str = ""
			+ str_tr
			  + "<td>Morot</td>"
			  + "<td>13:00</td>"
			  + "<td>100</td>"
			  + "<td>"
			    + "<span class=\"glyphicon glyphicon-edit blueColor\"></span>"
			    + "<span class=\"glyphicon glyphicon-remove-sign redColor\"></span>"
			  + "</td>"
			+ "</tr>";
		
		
		
		
		$("#counter").append( str );
	};
	
}
	
/* Swedish initialisation for the jQuery UI date picker plugin. */
/* Written by Anders Ekdahl ( anders@nomadiz.se). */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['sv'] = {
	closeText: 'Stäng',
	prevText: '&#xAB;Förra',
	nextText: 'Nästa&#xBB;',
	currentText: 'Idag',
	monthNames: ['Januari','Februari','Mars','April','Maj','Juni',
	'Juli','Augusti','September','Oktober','November','December'],
	monthNamesShort: ['Jan','Feb','Mar','Apr','Maj','Jun',
	'Jul','Aug','Sep','Okt','Nov','Dec'],
	dayNamesShort: ['Sön','Mån','Tis','Ons','Tor','Fre','Lör'],
	dayNames: ['Söndag','Måndag','Tisdag','Onsdag','Torsdag','Fredag','Lördag'],
	dayNamesMin: ['Sö','Må','Ti','On','To','Fr','Lö'],
	weekHeader: 'Ve',
	dateFormat: 'yy-mm-dd',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['sv']);

return datepicker.regional['sv'];

}));
    
    




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
