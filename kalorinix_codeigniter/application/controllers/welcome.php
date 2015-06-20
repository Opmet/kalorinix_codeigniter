<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
	
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('my_session');
		$this->load->library('my_validation');
	
		// Används för att visa vilken navigations länk som ska vara aktiv i vyn.
		$this->m_headlab['header_nav_link1'] = '';
		$this->m_headlab['header_nav_link2'] = ' class="active"';
		$this->m_headlab['header_nav_link3'] = '';
		$this->m_headlab['header_nav_link4'] = '';
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/welcome/calorie_counter.php'))
		{
			show_404();
		}
		
		//Ladda vyn
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('modals/login');
		$this->load->view('modals/create_new_account');
		$this->load->view('welcome/calorie_counter.php', null);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function test()
	{
		
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/welcome/calorie_counter.php'))
		{
			show_404();
		}
		
		//Ladda vyn
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('modals/login');
		$this->load->view('modals/create_new_account');
		$this->load->view('welcome/calorie_counter.php', null);
		$this->load->view('templates/footer');
		
		//$this->_view('welcome/', 'calorie_counter', null);
	}
	
	/**
	 * Användaren vill skapa ett nytt konto.
	 */
	public function create_new_account()
	{
		// Om post är aktiv.
		// Annars skicka ut formulär.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//1.Validera inmatning
			   $pass = _validate_account_form();
			//2.skapa ett konto
			   if($pass){ create_account(); }
			   
			//3.Skicka ut vy.
		}else {
			//Skicka ut formuläret.
		}
	}
	
	/**
	 * Hitta matvara.
	 *
	 */
	public function find_comestible()
	{
		$this->_view('welcome_message');
	}
	
	/**
	 * Validera inmatning
	 */
	private function _validate_account_form()
	{
		$pass = False;
		
		//Validera
		$this->form_validation->set_rules('name', 'Konto namn', 'trim|required|min_length[5]|max_length[45]|xss_clean');
		$this->form_validation->set_rules('email', 'Epost', 'trim|required|min_length[5]|max_length[45]|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Lösenord', 'trim|required|min_length[5]|max_length[45]|xss_clean');
		
		//Sätt eventuellt felmeddelande
		$this->form_validation->set_message('required', 'Fyll i fältet: %s!');
		$this->form_validation->set_message('min_length', 'Minst 5 tecken lång!');
		$this->form_validation->set_message('max_length', 'Max 45 tecken lång!');
		$this->form_validation->set_message('valid_email', 'Fyll i en epost adress!');
		
		//Om det finns fel återsänd formulär.
		//Annars försök skapa ett konto.
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			$pass = True;
		}
		
		return $pass;
	}
	
	/**
	 * Skapa konto
	 */
	private function _create_account()
	{
		//Hämtar variabel
		$name = $this->my_validation->test_input($_POST["name"]);
		$email = $this->my_validation->test_input($_POST["email"]);
		$password = $this->my_validation->test_input($_POST["password"]);
		
		//Modell
		$this->load->model('account'); // Laddar modell.
		$data = $this->account->set_account($name, $email, $password); // Kör modell
	}
	
	/**
	 * Kör vyn.
	 * @param string $p_path Sökväg.
	 * @param string $p_page Webbsidan som vyn ska rendera.
	 * @param array $p_data Vy märken.
	 */
	private function _view($p_path, $p_page, $p_data)
	{
		$data = $p_data; 
		
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/' . $p_path . $p_page . '.php'))
		{
			show_404();
		}
		
	
		//Ladda vyn
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view($p_path . $p_page , $data);
		$this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */