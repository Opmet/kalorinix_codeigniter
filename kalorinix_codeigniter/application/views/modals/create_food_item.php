<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Modal food-->
<div class="modal fade" id="createFoodModal" tabindex="-1" role="dialog" aria-labelledby="foodModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="foodModalLabel">Skapa ny matvara</h4>
      </div>
      <div class="modal-body">
      
      <!-- Form inside modal -->
      <div class="container">
         <form action="<?php echo htmlspecialchars(site_url('welcome/create_food')); ?>" id="food_form" method="post" class="form-horizontal">
            <div id="foodGroupFoodItem" class="form-group">
               <label for="foodItem" class="col-md-1 control-label">Matvara:</label>
               <div class="col-md-3">
                  <input type="text" name="foodItem" class="form-control" aria-describedby="foodBlockFoodItem" placeholder="Matvara" value="<?php echo set_value('foodItem'); ?>">
                  <span id="foodGlyphFoodItem" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="foodBlockFoodItem" class="help-block hidden"><?php echo form_error('foodItem'); ?></span>
               </div>
            </div>
            <div id="foodGroupKcal" class="form-group">
               <label for="kcal" class="col-md-1 control-label">Kcal:</label>
               <div class="col-md-3">
                  <input type="number" name="kcal" class="form-control" aria-describedby="foofBlockKcal" placeholder="Kcal" value="<?php echo set_value('kcal'); ?>">
                  <span id="foodGlyphKcal" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="foodBlockKcal" class="help-block hidden"><?php echo form_error('kcal'); ?></span>
               </div>
            </div>
            <div id="foodGroupProtein" class="form-group">
               <label for="protein" class="col-md-1 control-label">Protein:</label>
               <div class="col-md-3">
                  <input type="number" name="protein" class="form-control" aria-describedby="foodBlockProtein" placeholder="Protein" value="<?php echo set_value('protein'); ?>">
                  <span id="foodGlyphProtein" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="foodBlockProtein" class="help-block hidden"><?php echo form_error('protein'); ?></span>
               </div>
            </div>
            <div id="foodGroupKolhydrat" class="form-group">
               <label for="kolhydrat" class="col-md-1 control-label">Kolhydrat:</label>
               <div class="col-md-3">
                  <input type="number" name="kolhydrat" class="form-control" aria-describedby="foodBlockKolhydrat" placeholder="Kolhydrat" value="<?php echo set_value('kolhydrat'); ?>">
                  <span id="foodGlyphKolhydrat" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="foodBlockKolhydrat" class="help-block hidden"><?php echo form_error('kolhydrat'); ?></span>
               </div>
            </div>
            <div id="foodGroupFett" class="form-group">
               <label for="fett" class="col-md-1 control-label">Fett:</label>
               <div class="col-md-3">
                  <input type="number" name="fett" class="form-control" aria-describedby="foodBlockFett" placeholder="Fett" value="<?php echo set_value('fett'); ?>">
                  <span id="foodGlyphFett" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="foodBlockFett" class="help-block hidden"><?php echo form_error('fett'); ?></span>
               </div>
            </div>
            <div id="foodGroupOther" class="form-group">
               <label for="other" class="col-md-1 control-label">Övrigt:</label>
               <div class="col-md-3">
                  <input type="text" name="other" class="form-control" aria-describedby="foodBlockOther" placeholder="Övrigt" value="<?php echo set_value('other'); ?>">
                  <span id="foodGlyphOther" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="foodBlockOther" class="help-block hidden"><?php echo form_error('other'); ?></span>
               </div>
            </div>
            <br />
            <br />
            <br />
         </form>
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
        <button type="submit" form="food_form" class="btn btn-primary">
           <span style="font-size:0.5em;position:relative;top:-11px;" class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-floppy-disk"></span> Skapa
        </button>
      </div>
    </div>
  </div>
</div>

<!-- End of file create_food_item.php -->
<!-- Location: ./application/views/modals/create_food_item.php -->