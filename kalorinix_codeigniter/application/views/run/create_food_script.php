<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
/**
 * Hanterar formuläret som finns i modal create_food_item.
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

	//Skriver ut meddelande om matvaran har sparats i databasen
	printMessage();
	
	//Visa modalen
	$('#createFoodModal').modal('show');
});

/**
 * Skriver ut meddelande om matvaran har sparats i databasen
 */
function printMessage() {
	
	//Conditional php, Om matvaran har sparats i databasen, true annars false.
	var message = '<?php echo ($message === true ) ? true : false; ?>';

	//Conditional php, Om satt skriv ut annars tom sträng.
	var food_item = '<?php echo ( isset($food_item) ) ? $food_item : ''; ?>';

	//Om matvaran har sparats i databasen, Skriv ut ett meddelande och tömm fälten.
	if ( message == true ){

		//Töm fälten
		$("#foodInputFoodItem").val("");
		$("#foodInputKcal").val("");
		$("#foodInputProtein").val("");
		$("#foodInputKolhydrat").val("");
		$("#foodInputFett").val("");
		$("#foodInputOther").val("");
		
		//Skriv ut meddelande.
		$("#foodMessage").html( food_item + " har skapats! Och är nu sökbar." );
		$("#successMessageFood").removeClass("hidden");
	}
}
</script>

<!-- End of file create_food_script.php -->
<!-- Location: ./application/views/run/create_food_script.php -->