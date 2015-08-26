<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Modal select_a_entity-->
<div class="modal fade" id="send_to_table" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Skicka till tabell</h4>
      </div>
      <div class="modal-body">
      
         <!-- Form inside modal -->
         <div class="container-fluid">
            <div class="row">
               <p id="send_to_table_item"></p>
            </div>
            <div class="row">
               <div class="col-md-7">
                  <div>
                     <input type="text" class="aline left" placeholder="Mängd/Antal">
                  </div>
                  <div>
                  <select id="selectTableOptions" class="aline left">
                     </select>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
        <button type="submit" form="entity_form" class="btn btn-primary">
           <span class="glyphicon glyphicon-paste"></span> Skicka
        </button>
      </div>
    </div>
  </div>
</div>

<!-- End of file select_a_entity.php -->
<!-- Location: ./application/views/modals/select_a_entity.php -->