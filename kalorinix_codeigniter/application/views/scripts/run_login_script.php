<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
/**
 * Felhantering av formuläret som finns i tillhörande modal.
 * Modal: application/views/modal/login.php
 */
$(document).ready(function(){

	//Om fel finns i fältet epost.
	if ( $("#loginBlockEmail").text() ) {
		$( "#loginGroupEmail" ).addClass( "has-error has-feedback" );
		$( "#loginGlyphEmail" ).removeClass( "hidden" );
		$( "#loginBlockEmail" ).removeClass( "hidden" );
	}

	//Om fel finns i fältet lösenord.
	if ( $("#loginBlockPassword").text() ) {
		$( "#loginGroupPassword" ).addClass( "has-error has-feedback" );
		$( "#loginGlyphPassword" ).removeClass( "hidden" );
		$( "#loginBlockPassword" ).removeClass( "hidden" );
	}
	
	//Stäng och visa modal
	$('#accountModal').modal('hide')
	$('#loginModal').modal('show');
});
</script>


<!-- End of file run_login_script.php -->
<!-- Location: ./application/views/scripts/run_login_script.php -->