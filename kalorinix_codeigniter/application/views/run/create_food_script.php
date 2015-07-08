<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
/**
 * Felhantering av formuläret som finns i tillhörande modal.
 */
$(document).ready(function(){
	
	//Om fel finns i fältet matvara.
	if ( $("#foodBlockFoodItem").text() ) {
		$( "#foodGroupFoodItem" ).addClass( "has-error has-feedback" );
		$( "#foodGlyphFoodItem" ).removeClass( "hidden" );
		$( "#foodBlockFoodItem" ).removeClass( "hidden" );
	}

	//Om fel finns i fältet kcal.
	if ( $("#foodBlockKcal").text() ) {
		$( "#foodGroupKcal" ).addClass( "has-error has-feedback" );
		$( "#foodGlyphKcal" ).removeClass( "hidden" );
		$( "#foodBlockKcal" ).removeClass( "hidden" );
	}

	//Om fel finns i fältet protein.
	if ( $("#foodBlockProtein").text() ) {
		$( "#foodGroupProtein" ).addClass( "has-error has-feedback" );
		$( "#foodGlyphProtein" ).removeClass( "hidden" );
		$( "#foodBlockProtein" ).removeClass( "hidden" );
	}

	//Om fel finns i fältet kolhydrat.
	if ( $("#foodBlockKolhydrat").text() ) {
		$( "#foodGroupKolhydrat" ).addClass( "has-error has-feedback" );
		$( "#foodGlyphKolhydrat" ).removeClass( "hidden" );
		$( "#foodBlockKolhydrat" ).removeClass( "hidden" );
	}

	//Om fel finns i fältet fett.
	if ( $("#foodBlockFett").text() ) {
		$( "#foodGroupFett" ).addClass( "has-error has-feedback" );
		$( "#foodGlyphFett" ).removeClass( "hidden" );
		$( "#foodBlockFett" ).removeClass( "hidden" );
	}

	//Om fel finns i fältet other.
	if ( $("#foodBlockOther").text() ) {
		$( "#foodGroupOther" ).addClass( "has-error has-feedback" );
		$( "#foodGlyphOther" ).removeClass( "hidden" );
		$( "#foodBlockOther" ).removeClass( "hidden" );
	}
	
	//Visa modalen
	$('#createFoodModal').modal('show');
});
</script>


<!-- End of file create_food_script.php -->
<!-- Location: ./application/views/run/create_food_script.php -->