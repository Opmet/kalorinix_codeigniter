<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-- 
     Om användaren är inloggad.
-->
<li<?php echo $header_nav_link4; ?>>
   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mitt konto <span class="caret"></span></a>
   <ul class="dropdown-menu" role="menu">
      <li><a href="<?php echo site_url('welcome/settings'); ?>"><span class="glyphicon glyphicon-wrench">&nbsp;</span>Inställningar</a></li>
      <li><a href="<?php echo site_url('welcome/logout'); ?>"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Logga ut</a></li>
   </ul>
</li>