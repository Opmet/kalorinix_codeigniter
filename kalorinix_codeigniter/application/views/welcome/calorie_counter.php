<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<h2>Välkommen till KaloriNix!</h2>
<div id="body">

<div style="height:30px;"></div>

<div class="row">
  <div class="col-md-5">
    <div class="input-group">
      <input type="text" class="form-control" aria-label="..." data-toggle="collapse" data-target="#dataWell" aria-expanded="false" aria-controls="collapseExample">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Funktioner <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Lägg till motion</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->
    <div class="collapse" id="dataWell">
         <div class="well">
            <p>Skriv något för att söka.</p>
         </div>
    </div><!-- /dataWell -->
  </div><!-- /.col-md-5 -->
  
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
       <td></td>
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
</div>






<div class="row">
  <div class="col-md-5">
  </div><!-- /.col-md-5 -->
  <div class="col-md-7">

  <div class="well well-sm">
  
  <h3>Resultat</h3>
<hr>
       <p>
       Kalori mål: 2500<br />
       Summa innehåll: 2000<br />
       Kvar att äta: 500
       </p>
       
   </div>
       
   </div>
</div>




<div style="height:30px;"></div>

<!-- charts -->
<div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-4">
      <div id="piechart" style="width:100%;"></div>
   </div><!-- /.col-md-5 -->
   <div class="col-md-6">	
      <div id="chart_div" style="width: 100%;"></div>
   </div>
   <div class="col-md-1"></div>
</div><!-- /.row -->




</div>

<!-- End of file calorie_counter.php -->
<!-- Location: ./application/views/welcome/calorie_counter.php -->