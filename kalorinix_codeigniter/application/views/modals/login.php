<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="loginModalLabel">Logga in</h4>
      </div>
      <div class="modal-body">

      
      
      
      
      
      
      
<div class="container">
   <form action="<?php echo htmlspecialchars(site_url('account/login')); ?>" method="post" class="form-horizontal">
            <div class="form-group">
               <label for="name" class="col-md-1 control-label">Namn:</label>
               <div class="col-md-3">
                  <input type="name" name="name" class="form-control" placeholder="Namn">
               </div>
            </div>
            <div class="form-group">
               <label for="password" class="col-md-1 control-label">Lösenord:</label>
               <div class="col-md-3">
                  <input type="password" name="password" class="form-control" placeholder="Lösenord">
                  <br />
                  <p style="float:right;" data-toggle="modal" data-target="#accountModal"><a href="#">Registrera nytt konto.</a></p>
               </div>
            </div>
         </form>
</div>
      
      
      
      
      
      
      
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
        <button type="button" class="btn btn-primary">
           <span class="glyphicon glyphicon-log-in"></span> Logga in
        </button>
      </div>
    </div>
  </div>
</div>