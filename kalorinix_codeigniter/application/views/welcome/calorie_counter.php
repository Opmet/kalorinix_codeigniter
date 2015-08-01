<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<h2>Välkommen till KaloriNix!</h2>

<!-- Body -->
<div id="body">

<div style="height:30px;"></div>

<!-- Tabell -->
<div class="row">
  <div class="col-md-5">
    <div class="input-group">
      <input type="search" id="searchTxt" onkeyup="updateList()" class="form-control" data-toggle="collapse" data-target="#dataWell" aria-expanded="false" aria-controls="collapseExample">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Funktioner <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
          <li><a href="<?php echo site_url('welcome/create_food'); ?>">Skapa ny matvara</a></li>
          <li><a href="#">Lägg till motion</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div>
    </div>
    <div class="collapse" id="dataWell">
         <div class="well">
            <table id="dataTable">
               <tr id="foodText">
                  <td>Skriv för att söka efter matvaror.</td>
               </tr>
            </table>


<script>
$(document).ready(function(){
	var timeoutID = false;

	/**
	 * AJAX med REST, en sekunds fördröjning, hanterar food items från datakällan.
	 * @link http://www.w3schools.com/jsref/met_win_cleartimeout.asp
	 */
	updateList = function() {
		if(timeoutID){window.clearTimeout(timeoutID);}
		timeoutID = setTimeout(function(){
			   $("#foodText").hide();
			   var param = "/" + document.getElementById("searchTxt").value;

			   //AJAX get json
			   $.getJSON("<?php echo site_url('welcome/find_food'); ?>" + param)
				    .done(function( jsonData ) {
					    var count = 0;
				    	$.each(jsonData, function(index) {
				    		var $row = '';
				            
				    		$row += '<tr><td id=\"item' + (++count) + '\"><span>';
				    		$row += jsonData[index].food_item;
				    		$row += '</span></td></tr>';

				    		$( "#dataTable" ).append( $row );

				    		//Event click handler
				    		$( "#item" + (count) + "" ).on( "click", {
					    		id_food: jsonData[index].id_food
					    		}, sendToTable );
				        });
				    });
			   
			},1000); //1000 milli sekund.
    };

    /**
	 * Event handler, Skickar data till tabellen.
	 */
    sendToTable = function( event ) {
		  alert( "Hello " + event.data.id_food );
		}
});
</script>


            
         </div>
    </div>
  </div>
  <div class="col-md-7">
     <table id="counter">
     <tr>
       <th>Matvara</th>
       <th>Tid</th>
       <th>Kalorier</th>
       <th>Redigera/Ta bort</th>
     </tr>
     <tr>
       <td>Morot</td>
       <td>13:00</td>
       <td>100</td>
       <td>
          <span class="glyphicon glyphicon-edit blueColor"></span>
          <span class="glyphicon glyphicon-remove-sign redColor"></span>
       </td>
     </tr>
     <tr class="alt">
       <td>Jordgubb</td>
       <td>13:00</td>
       <td>100</td>
       <td></td>
     </tr>
     <tr>
       <td>Poatis</td>
       <td>13:00</td>
       <td>100</td>
       <td></td>
     </tr>
     <tr class="alt">
       <td>Lök</td>
       <td>13:00</td>
       <td>100</td>
       <td></td>
     </tr>
   </table>
   </div>
</div><!-- /Tabell -->

<!-- Summa -->
<div class="row">
  <div class="col-md-5">
  </div>
  <div class="col-md-7">

  <div class="well well-sm">
  
  <h3>Resultat</h3>
<hr>
       <p>
       Kalorier: 400<br />
       Kvar att äta: <span class="redColor">Logga in och gå till inställningarna.</span>
       </p>
       
   </div>
       
   </div>
</div><!-- /Summa -->

<div style="height:30px;"></div>

<!-- Charts -->
<div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-4">
      <div id="piechart" style="width:100%;"></div>
   </div><!-- /.col-md-5 -->
   <div class="col-md-6">	
      <div id="chart_div" style="width: 100%;"></div>
   </div>
   <div class="col-md-1"></div>
</div><!-- /Charts -->

</div><!-- /Body -->

<!-- End of file calorie_counter.php -->
<!-- Location: ./application/views/welcome/calorie_counter.php -->