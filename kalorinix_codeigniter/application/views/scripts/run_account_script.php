<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
/**
 * Startar login och konto modal.
 * @link http://stackoverflow.com/questions/13183630/how-to-open-a-bootstrap-modal-window-using-jquery
 */
$(document).ready(function(){

	//Om fel finns i fältet epost.
	if ( $("#helpBlockEmail").text() ) {
		$( "#formGroupEmail" ).addClass( "has-error has-feedback" );
		$( "#glyphiconEmail" ).removeClass( "hidden" );
		$( "#helpBlockEmail" ).removeClass( "hidden" );
	}
	

	//Visa modalerna
	$('#loginModal').modal('show');
	$('#accountModal').modal('show');
});
</script>


<!-- End of file run_account_script.php -->
<!-- Location: ./application/views/scripts/run_account_script.php -->