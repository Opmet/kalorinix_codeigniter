<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

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
	 *  En användare hämtar sitt konto från databasen
	 */
	public function get_account()
	{
		echo "Test!";
	}
	
	/**
	 * En användare lagrar ett nytt konto i databasen
	 */
	public function set_account()
	{
		
	}

	
}

/* End of file account.php */
/* Location: ./application/models/account.php */