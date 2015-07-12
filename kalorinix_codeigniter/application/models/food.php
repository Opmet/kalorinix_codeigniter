<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Account modell hanterar matvaror.
*/
class Food extends CI_Model {

	/**
	 *  Konstruktor.
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Skriver in ny matvara i databasen.
	 *
	 * @uses session Hämtar info om kontot, för eventuell felhantering.
	 * @param string $p_food_item 
	 * @param string $p_kcal 
	 * @param string $p_protein
	 * @param string $p_kolhydrat
	 * @param string $p_fett
	 * @param string $p_other Övrigt.
	 * @return boolean $message true om matvaran kunde skrivas in, annars false.
	 */
	public function set_food($p_food_item, $p_kcal, $p_protein, $p_kolhydrat, $p_fett, $p_other)
	{
		$message = false;
		
		$sql = "INSERT INTO food (food_item, kcal, protein, kolhydrat, fett, other)
        VALUES (".$this->db->escape($p_food_item).", ".$this->db->escape($p_kcal).", ".$this->db->escape($p_protein)."
        		, ".$this->db->escape($p_kolhydrat).", ".$this->db->escape($p_fett).", ".$this->db->escape($p_other).")";
		
		$account = $this->session->userdata('account');
		
		// Om matvaran inte kunde skapas skicka felmeddelande.
		// Annars skapades matvaran.
		if (!$this->db->query($sql))
		{
			log_message( 'error', "Kunde inte skapa en matvara! Användarens konto:$account -> " . current_url() );
			show_error('Internt databas fel: Kunde inte skapa matvara!', 500);
		}else {
			$message = true;
		}
		
		return $message;
	}
	
	/**
	 * 
	 */
	public function get_food()
	{
		
	}
	
}

/* End of file food.php */
/* Location: ./application/models/food.php */