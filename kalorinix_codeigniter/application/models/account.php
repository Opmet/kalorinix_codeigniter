<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Account modell. En användare skapar eller hämtar ett konto.
*/
class Account extends CI_Model {

	/**
	 *  Konstruktor.
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * En användare skapar ett nytt konto.
	 * Användaren loggas in automatiskt om kontot kunde skapas. 
	 *  
	 * @param string $p_email Användarens epost.
	 * @param string $p_password Användarens lösenord.
	 */
	public function set_account($p_email,$p_password)
	{
		$message = '';
		
		$sql = "INSERT INTO account (email, password)
        VALUES (".$this->db->escape($p_email).", ".$this->db->escape($p_password).")";
		
		// Om kontot inte kunde skapas skicka felmeddelande.
		// Annars kunde kontot skapas. Logga in.
		if (!$this->db->query($sql))
		{
			log_message( 'error', "Kunde inte registrera konto! Användarens Epost:$p_email och Lösenord:$p_password -> " . current_url() );
			show_error('Internt databas fel: Kunde inte registrera konto!', 500);
		}else{
			get_login($p_email,$p_password); //Loggar in
		}
	}
	
	/**
	 * En användare loggar in på sitt konto.
	 * 
	 * @param string $p_email Användarens epost.
	 * @param string $p_password Användarens lösenord.
	 */
	public function get_login($p_email,$p_password)
	{
		$error = 'Felaktigt användarnamn och/eller felaktigt lösenord!';
		
		// Hämtar lösenordet från databasen om kontot finns.
		$db_password = $this->_fetch_db_password($p_email, $p_password); 	
		
		// Om lösenordet finns.
		if ($db_password !== false) {
			
			// Om versaler och gemener stämmer i lösenordet.
			if (strpos($db_password,$p_password) !== FALSE) {
				
				// Skapa session.
				$this->session->set_userdata('session', '1');
				
			}else{ show_error($error, 404);}
				
		}else{ show_error($error, 404); }
	}
	
	/**
	 *  Hämtar lösenordet från databasen om kontot finns.
	 *
	 *  @param string $p_name Namn.
	 *  @param string $p_password Lösenord.
	 *
	 *  @return string boolean Om kontot finns retuneras lösenordet annars false.
	 */
	private function _fetch_db_password($p_name,$p_password)
	{
		$account = false;
	
		$sql = "SELECT password FROM account WHERE email=" . $this->db->escape($p_name);
		$query = $this->db->query($sql);
	
		foreach ($query->result() as $row)
		{
			$account = $row->password;
		}
	
		return $account;
	}

	
}

/* End of file account.php */
/* Location: ./application/models/account.php */