<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Modal login-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="loginModalLabel">Logga in</h4>
      </div>
      <div class="modal-body">
      
      <!-- Form inside modal -->
      <div class="container">
         <form action="<?php echo htmlspecialchars(site_url('welcome/login')); ?>" id="login_form" method="post" class="form-horizontal">
            <div id="loginGroupEmail" class="form-group">
               <label for="name" class="col-md-1 control-label">Epost:</label>
               <div class="col-md-3">
                  <input type="email" name="email" class="form-control" aria-describedby="loginBlockEmail" placeholder="Epost" value="<?php echo set_value('email'); ?>">
                  <span id="loginGlyphEmail" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="loginBlockEmail" class="help-block hidden"><?php echo form_error('email'); ?></span>
               </div>
            </div>
            <div id="loginGroupPassword" class="form-group">
               <label for="password" class="col-md-1 control-label">Lösenord:</label>
               <div class="col-md-3">
                  <input type="password" name="password" class="form-control" aria-describedby="loginBlockPassword" placeholder="Lösenord" value="<?php echo set_value('password'); ?>">
                  <span id="loginGlyphPassword" class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                  <span id="loginBlockPassword" class="help-block hidden"><?php echo form_error('password'); ?></span>
                  <br />
                  <p style="float:right;" data-toggle="modal" data-target="#accountModal"><a href="#">Registrera nytt konto.</a></p>
               </div>
            </div>
         </form>
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
        <button type="submit" form="login_form" class="btn btn-primary">
           <span class="glyphicon glyphicon-log-in"></span> Logga in
        </button>
      </div>
    </div>
  </div>
</div>

<!-- End of file login.php -->
<!-- Location: ./application/views/modals/login.php -->