<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
/**
 * Felhantering av formuläret som finns i tillhörande modal.
 * Modal: application/views/modal/create_new_account.php
 */
$(document).ready(function(){

	//Om fel finns i fältet epost.
	if ( $("#accountBlockEmail").text() ) {
		$( "#accountGroupEmail" ).addClass( "has-error has-feedback" );
		$( "#accountGlyphEmail" ).removeClass( "hidden" );
		$( "#accountBlockEmail" ).removeClass( "hidden" );
	}

	//Om fel finns i fältet lösenord.
	if ( $("#accountBlockPassword").text() ) {
		$( "#accountGroupPassword" ).addClass( "has-error has-feedback" );
		$( "#accountGlyphPassword" ).removeClass( "hidden" );
		$( "#accountBlockPassword" ).removeClass( "hidden" );
	}
	
	//Visa modalerna
	$('#loginModal').modal('show');
	$('#accountModal').modal('show');
});
</script>


<!-- End of file run_account_script.php -->
<!-- Location: ./application/views/templates/run_account_script.php -->