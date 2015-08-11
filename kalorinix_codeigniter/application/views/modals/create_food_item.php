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
      <div class="container-fluid">
         <form action="<?php echo htmlspecialchars(site_url('welcome/create_food')); ?>" id="food_form" method="post" class="form-horizontal">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default">
                     <div class="panel-body">  
                        <legend>Inställningar (100 g):</legend>
                        <p class="blueColor">Beräkna från 100 gram.</p>
                        <div id="foodGroupFoodItem" class="form-group">
                           <label for="foodItem" class="col-md-2 control-label">Matvara:</label>
                           <div class="col-md-5">
                              <input type="text" id="foodInputFoodItem" name="food_item" class="form-control" aria-describedby="foodBlockFoodItem" placeholder="Ex: MinaKöttbullar" value="<?php echo set_value('food_item'); ?>">
                              <span id="foodGlyphFoodItem" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                              <span id="foodBlockFoodItem" class="help-block hidden"><?php echo form_error('food_item'); ?></span>
                           </div>
                        </div>
                        <div id="foodGroupKcal" class="form-group">
                           <label for="kcal" class="col-md-2 control-label">Kcal:</label>
                           <div class="col-md-3">
                              <input type="number" id="foodInputKcal" min="0" name="kcal" class="form-control" aria-describedby="foodBlockKcal" placeholder="0" value="<?php echo set_value('kcal'); ?>">
                              <span id="foodGlyphKcal" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                              <span id="foodBlockKcal" class="help-block hidden"><?php echo form_error('kcal'); ?></span>
                           </div>
                        </div>
                        <div id="foodGroupProtein" class="form-group">
                           <label for="protein" class="col-md-2 control-label">Protein:</label>
                           <div class="col-md-3">
                              <input type="number" id="foodInputProtein" min="0" name="protein" class="form-control" aria-describedby="foodBlockProtein" placeholder="0" value="<?php echo set_value('protein'); ?>">
                              <span id="foodGlyphProtein" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                              <span id="foodBlockProtein" class="help-block hidden"><?php echo form_error('protein'); ?></span>
                           </div>
                        </div>
                        <div id="foodGroupKolhydrat" class="form-group">
                           <label for="kolhydrat" class="col-md-2 control-label">Kolhydrat:</label>
                           <div class="col-md-3">
                              <input type="number" id="foodInputKolhydrat" min="0" name="kolhydrat" class="form-control" aria-describedby="foodBlockKolhydrat" placeholder="0" value="<?php echo set_value('kolhydrat'); ?>">
                              <span id="foodGlyphKolhydrat" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                              <span id="foodBlockKolhydrat" class="help-block hidden"><?php echo form_error('kolhydrat'); ?></span>
                           </div>
                        </div>
                        <div id="foodGroupFett" class="form-group">
                           <label for="fett" class="col-md-2 control-label">Fett:</label>
                           <div class="col-md-3">
                              <input type="number" id="foodInputFett" min="0" name="fett" class="form-control" aria-describedby="foodBlockFett" placeholder="0" value="<?php echo set_value('fett'); ?>">
                              <span id="foodGlyphFett" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                              <span id="foodBlockFett" class="help-block hidden"><?php echo form_error('fett'); ?></span>
                           </div>
                        </div>
                        <div id="foodGroupOther" class="form-group">
                           <label for="other" class="col-md-2 control-label">Övrigt:</label>
                           <div class="col-md-3">
                              <input type="text" id="foodInputOther" name="other" class="form-control" aria-describedby="foodBlockOther" placeholder="Övrigt" value="<?php echo set_value('other'); ?>">
                              <span id="foodGlyphOther" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                              <span id="foodBlockOther" class="help-block hidden"><?php echo form_error('other'); ?></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default">
                     <div class="panel-body">
                        <legend>Extra enheter:</legend>
                        <p class="blueColor">Väg och ange dess vikt i gram.</p>
                        <div class="form-group">
                           <label for="other" class="col-md-4 control-label">1 stycken (st):</label>
                           <div class="col-md-3">
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="other" class="col-md-4 control-label">1 Liter (l):</label>
                           <div class="col-md-3">
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="other" class="col-md-4 control-label">1 Deciliter (dl):</label>
                           <div class="col-md-3">
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="other" class="col-md-4 control-label">1 Matsked (msk):</label>
                           <div class="col-md-3">
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="other" class="col-md-4 control-label">1 Tesked (tsk):</label>
                           <div class="col-md-3">
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="other" class="col-md-4 control-label">1 Kryddmått (krm):</label>
                           <div class="col-md-3">
                              <input type="text" class="form-control">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
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