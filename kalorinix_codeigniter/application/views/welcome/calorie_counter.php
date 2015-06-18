<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<h2>Välkommen till KaloriNix!</h2>
<div id="body">

<!-- charts and table -->
<div class="row">
  <div class="col-md-5">
     <div id="piechart" style="width:100%;"></div>	
     <div id="chart_div" style="width: 100%;"></div>
  </div>
  <div class="col-md-7">
     <table id="customers">
     <tr>
       <th>Company</th>
       <th>Contact</th>
       <th>Country</th>
     </tr>
     <tr>
       <td>Alfreds Futterkiste</td>
       <td>Maria Anders</td>
       <td>Germany</td>
     </tr>
     <tr class="alt">
       <td>Berglunds snabbköp</td>
       <td>Christina Berglund</td>
       <td>Sweden</td>
     </tr>
     <tr>
       <td>Centro comercial Moctezuma</td>
       <td>Francisco Chang</td>
       <td>Mexico</td>
     </tr>
     <tr class="alt">
       <td>Ernst Handel</td>
       <td>Roland Mendel</td>
       <td>Austria</td>
     </tr>
     <tr>
       <td>Island Trading</td>
       <td>Helen Bennett</td>
       <td>UK</td>
     </tr>
     <tr class="alt">
       <td>Königlich Essen</td>
       <td>Philip Cramer</td>
       <td>Germany</td>
     </tr>
     <tr>
       <td>Laughing Bacchus Winecellars</td>
       <td>Yoshi Tannamuri</td>
       <td>Canada</td>
     </tr>
     <tr class="alt">
       <td>Magazzini Alimentari Riuniti</td>
       <td>Giovanni Rovelli</td>
       <td>Italy</td>
     </tr>
     <tr>
       <td>North/South</td>
       <td>Simon Crowther</td>
       <td>UK</td>
     </tr>
     <tr class="alt">
       <td>Paris spécialités</td>
       <td>Marie Bertrand</td>
       <td>France</td>
     </tr>
   </table>
   </div>
</div>

<!-- input and collapse -->
<div class="row">
  <div class="col-md-5">
  </div><!-- /.col-md-5 -->
  <div class="col-md-7">
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
  </div><!-- /.col-md-7 -->
</div><!-- /.row -->



</div>

<!-- End of file calorie_counter.php -->
<!-- Location: ./application/views/welcome/calorie_counter.php -->