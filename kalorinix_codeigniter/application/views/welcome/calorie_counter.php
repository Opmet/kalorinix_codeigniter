<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
   var table = new Database();

   //Uppdatera tabellen vid körning med dagens datum. 
   var time = new Time();
   var toDay = time.getToDay(); //Idag med format 2015-09-16.
   table.updateTable( toDay );

   var path = "<?php echo site_url('welcome/find_food'); ?>";
   var counter = new CalorieCounter( path );

   //Initierar datapicker och uppdaterar tabellen table.
   $(function() {
	   
		  $( "#datepicker" ).datepicker({
		      showWeek: true,
		      showAnim: "fold",
		      onSelect: function() //uppdaterar tabellen vid action.
		       { 
		           var date = $(this).datepicker('getDate'); //Hämta dag.

		           //Formaterar om datum till format 2015-09-16.
		           var time = new Time();
		           var day = time.getDay(date); //Idag med format 2015-09-16.
		           table.updateTable(day);
		       }
		    });

		  $("#datepicker").datepicker("setDate", new Date()); //Dagens datum
		  $("#datepicker").datepicker( $.datepicker.regional[ "sv" ] ); //Svenska
	  });

	  
</script>
<h2>Välkommen till KaloriNix!</h2>

<!-- Body -->
<div id="body">

<div style="height:30px;"></div>

<!-- Tabell -->
<div class="row">
  <div class="col-md-5">
    <div class="input-group">
      <input type="search" id="searchTxt" onkeyup="counter.updateList();" class="form-control" placeholder="Sök vara..." data-toggle="collapse" data-target="#dataWell" aria-expanded="false" aria-controls="collapseExample">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Funktioner <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
          <li><a href="<?php echo site_url('welcome/create_food'); ?>">Skapa vara</a></li>
          <li><a href="#">Lägg till motion</a></li>
        </ul>
      </div>
    </div>
    <div class="collapse" id="dataWell">
         <div class="well">
            <table id="dataTable">
               <tr id="foodText">
                  <td>Skriv för att söka efter varor.</td>
               </tr>
            </table>
         </div>
    </div>
  </div>
  <div class="col-md-7">
  
  <p>Datum: <input type="text" id="datepicker" size="30"></p>
  
     <table id="counter">
     <tr>
       <th>Vara</th>
       <th>Tid</th>
       <th>Kalorier</th>
       <th>Redigera/Ta bort</th>
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