<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Modal -->
<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="accountModalLabel">Registrera nytt konto</h4>
      </div>
      <div class="modal-body">
      
      <!-- Form inside modal -->
      <?php echo validation_errors(); ?>
      <div class="container">
         <form action="<?php echo htmlspecialchars(site_url('welcome/create_new_account')); ?>" id="account_form" method="post" class="form-horizontal">
            <div class="form-group">
               <label for="email" class="col-md-1 control-label">Epost:</label>
               <div class="col-md-3">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Epost">
               </div>
            </div>
            <div class="form-group">
               <label for="password" class="col-md-1 control-label">Lösenord:</label>
               <div class="col-md-3">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Lösenord">
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
        <button type="submit" form="account_form" class="btn btn-primary">
           <span style="font-size:0.5em;position:relative;top:-10px;" class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-briefcase"></span> Registrera
        </button>
      </div>
    </div>
  </div>
</div>

<!-- End of file create_new_account.php -->
<!-- Location: ./application/views/modals/create_new_account.php -->