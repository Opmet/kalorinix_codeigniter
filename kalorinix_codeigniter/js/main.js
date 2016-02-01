"use strict";

var test = 0;
var parant_json = 0;


/**
 * Hanterar webbdatabasen.
 */
function Database(){
	
	/**
	 * Kontrollera om webbläsaren stödjer IndexedDB. 
	 * Metoden omdirigerar till ny webbsida vid fel.
	 * Metoden körs i header.php
	 * @param webbsidan.
	 */
	this.indexedDB = function(p_replace_path) {
		var path = p_replace_path;
		
		//Kontrollerar om webbläsaren stödjer IndexedDB.
		if(!window.indexedDB){
			window.location.replace( path ); //Om IndexedDB inte stöds omdirigeras till ny webbsida. 
    	}
	};
	
	/**
	 * Starta table databas.
	 */
	this.initTable = function() {
		
		//Öppna databasen.
		var table = indexedDB.open("table");
		
		// Om databasen inte redan finns skapa objekt och index.
		table.onupgradeneeded = function() {
			db = table.result;
			var store = db.createObjectStore("date", {keyPath: "id", autoIncrement: true});
			var titleIndex = store.createIndex("by_item", "item");
			var timeIndex = store.createIndex("by_time", "time");
			var calorieIndex = store.createIndex("by_calorie", "calorie");
			var dayIndex = store.createIndex("by_day", "day");
			};
			
		// Om databas uppkopplingen lyckades.
		table.onsuccess = function() {
			return true;
			};
	};
	
	/**
	 * Lägger till en ny post i databasen.
	 */
	this.updateDB = function() {
		var db = null;
		
		var id = $('#hiddenID').text();
		var json = parant_json;
		var product = find_product(id, json);
		
		//Hämta timmar och minuter med format 09:01. Idag med format 2015-09-16. 
		var time = new Time();
		var toDay = time.getToDay();
		var timeNow = time.getTimeNow(); 
		
		//Öppna databasen.
		var request = indexedDB.open("table");
			
		request.onsuccess = function() {
			db = request.result;
			
			var tx = db.transaction("date", "readwrite");
			var store = tx.objectStore("date");

			store.put({item: product.food_item, time: timeNow, calorie: calc_calories(product), day: toDay});

			tx.oncomplete = function() {
			  // All requests have succeeded and the transaction has committed.
				alert("Klart2: " + db);
				};
			};
	};
	
	/**
	 * Uppdaterar tabellen table.
	 * Ex:  database.updateTable(); uppdaterar table.
	 */
	this.updateTable = function(p_day) {
		var db = null;
		var day = p_day;
		
		var i = 0;
		alert("Tid: " + day);
		
		//Öppna databasen.
		   var table = indexedDB.open("table");
			
		   // Om databas uppkopplingen lyckades.
		   table.onsuccess = function() {
			   db = table.result;			   
			   
			    var tx = db.transaction("date", "readonly");
		    	var store = tx.objectStore("date");
		    	var index = store.index("by_day");

		    	var request = index.openCursor(IDBKeyRange.only( day ));
				
				request.onsuccess = function(event) { 
					var cursor = request.result;
					
					if (cursor) {
					    // Called for each matching record.
						alert("Rätt" + i + ": " + cursor.value.item);
						 ++i;
					    //report(cursor.value.isbn, cursor.value.title, cursor.value.author);
					    cursor.continue();
					  } else {
					    // No more matching records.
					    //report(null);
						  alert("Tomt: " + day);
					  }
					};
			   };
	};
	
	/**
	 * Ta bort hela databasen.
	 * Ex:  database.delate("table"); Radderar hela databasen table.
	 * @param p_database Databasen som ska radderas
	 */
	this.delate = function(p_database) {
		var database = p_database;
		
		var req = indexedDB.deleteDatabase(database);
		
		req.onsuccess = function () {
		    console.log("Deleted database successfully");
		    };
		req.onerror = function () {
		    console.log("Couldn't delete database");
		    };
		req.onblocked = function () {
		    console.log("Couldn't delete database due to the operation being blocked");
		    };
	};
	
	/**
	 * Sök efter en vara med rätt id.
	 * 
	 * @param p_id Id
	 * @param p_json Samling varor.
	 * @return En vara
	 */
    var find_product = function( p_id, p_json ) {
    	var product = null;
    	
    	//Sök efter varan med rätt id.
		for (var key in p_json) {
			if (p_json.hasOwnProperty(key)) {
				var obj = p_json[key];
				if(obj.id_food == p_id)
				{
					product = obj;//När varan med rätt id hittats.
				}
			}
		}
		
		return product;
	};
	
	/**
	 * Beräkna kalorier
	 * 
	 * @param p_product Varan som ska beräknas.
	 * @return Antal kalorier på en vara.
	 */
    var calc_calories = function( p_product ) {
    	var kcal = p_product.kcal; //kalorier på 100g.
    	var input = $('#tableSendIn').val();
    	var selected_entity = $('#selectTableOptions option:selected').val();
    	
    	var tot_calories = 0;
    	
    	//Användaren kan välja en entitet.
    	switch (selected_entity) {
        case "g":
        	//Hela vikten multipliceras med kallorier och delas slutligen med det hela (100g).
        	tot_calories = (input * kcal)/100;
            break;
        case "st":
        	//input är x många varor som kallorier ska beräknas på.
        	//st är vikten på en vara.
        	//X antal varor multipliceras med gram på en vara
        	var st = p_product.st; //Gram på en vara.
        	tot_calories = input * st;
            break;
        case "l":
        	var l = p_product.l; //Gram på en vara.
        	tot_calories = input * l;
            break;
        case "dl":
        	var dl = p_product.dl; //Gram på en vara.
        	tot_calories = input * dl;
            break;
        case "msk":
        	var msk = p_product.msk; //Gram på en vara.
        	tot_calories = input * msk;
            break;
        case "tsk":
        	var tsk = p_product.tsk; //Gram på en vara.
        	tot_calories = input * tsk;
            break;
        case "krm":
        	var krm = p_product.krm; //Gram på en vara.
        	tot_calories = input * krm;
            break;
    }

    	return tot_calories;
	};
}

/**
 * Hanterar hämtning av data från databasen och överlämning till tabellen.
 * @link http://www.w3schools.com/jsref/met_win_cleartimeout.asp
 */
function CalorieCounter(p_path){
	this.path = p_path;
	var timeoutID  = false;
	
	//AJAX med REST, en sekunds fördröjning, hanterar food items från datakällan.
	this.updateList = function() {
		if(timeoutID){window.clearTimeout(timeoutID);}
		timeoutID = setTimeout(function(){
			   $("#foodText").hide();
			   var param = "/" + document.getElementById("searchTxt").value;

			   //AJAX get json
			   $.getJSON(this.path + param)
				    .done(function( jsonData ) {
				    	parant_json = jsonData;
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

	    	  $("#hiddenID").text( event.data.id_food );
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