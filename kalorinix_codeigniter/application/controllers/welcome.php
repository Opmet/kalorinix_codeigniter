<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
	
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('form_validation');
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
		
		//Skriv ut vy.
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('modals/login');
		$this->load->view('modals/create_new_account');
		$this->load->view('welcome/calorie_counter');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Användaren vill skapa ett nytt konto.
	 * Kallas från modal: ./application/views/modals/create_new_account.php
	 */
	public function create_new_account()
	{
		// Om post är aktiv.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			//Sätt validerings regler
			$this->form_validation->set_rules('email', 'Epost', 'trim|required|min_length[5]|max_length[45]|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Lösenord', 'trim|required|min_length[5]|max_length[45]|xss_clean');
			
			//Sätt eventuellt felmeddelande
			$this->form_validation->set_message('required', 'Fyll i fältet: %s!');
			$this->form_validation->set_message('min_length', 'Ange minst 5 tecken!');
			$this->form_validation->set_message('max_length', 'Ange max 45 tecken!');
			$this->form_validation->set_message('valid_email', 'Fyll i epost adress!');
			
			//Om validering påträffar fel.
			//Annars skapa nytt konto och logga in.
			if ($this->form_validation->run() == FALSE)
			{
				//Skriv ut vy med felen.
				$this->load->view('templates/header', $this->m_headlab);
				$this->load->view('modals/login');
				$this->load->view('modals/create_new_account');
				$this->load->view('templates/run_account_script');
				$this->load->view('welcome/calorie_counter');
				$this->load->view('templates/footer');
			}
			else
			{
				//Hämtar variabel
				$email = $this->my_validation->test_input($_POST["email"]);
				$password = $this->my_validation->test_input($_POST["password"]);
				
				//Modell
				$this->load->model('account'); // Laddar modell.
				$data = $this->account->set_account($email, $password); // Kör modell
				
				//Skriv ut vy.
				$this->load->view('templates/header', $this->m_headlab);
				$this->load->view('modals/login');
				$this->load->view('modals/create_new_account');
				$this->load->view('welcome/calorie_counter');
				$this->load->view('templates/footer');
			}
		}
	}
	
	/**
	 * Användaren vill logga in.
	 * Kallas från modal: ./application/views/modals/login.php
	 */
	public function login()
	{
		// Om post är aktiv.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
			//Sätt validerings regler
			$this->form_validation->set_rules('email', 'Epost', 'trim|required|min_length[5]|max_length[45]|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Lösenord', 'trim|required|min_length[5]|max_length[45]|xss_clean');
				
			//Sätt eventuellt felmeddelande
			$this->form_validation->set_message('required', 'Fyll i fältet: %s!');
			$this->form_validation->set_message('min_length', 'Ange minst 5 tecken!');
			$this->form_validation->set_message('max_length', 'Ange max 45 tecken!');
			$this->form_validation->set_message('valid_email', 'Fyll i epost adress!');
				
			//Om validering påträffar fel.
			//Annars skapa ett konto.
			if ($this->form_validation->run() == FALSE)
			{
				//Skriv ut vy med felen.
				$this->load->view('templates/header', $this->m_headlab);
				$this->load->view('modals/login');
				$this->load->view('modals/create_new_account');
				$this->load->view('templates/run_login_script');
				$this->load->view('welcome/calorie_counter');
				$this->load->view('templates/footer');
			}
			else
			{
				//Hämtar variabel
				$email = $this->my_validation->test_input($_POST["email"]);
				$password = $this->my_validation->test_input($_POST["password"]);
				
				//Modell
				$this->load->model('account'); // Laddar modell.
				$data = $this->account->get_login($email, $password); // Kör modell
				
				//Skriv ut vy.
				$this->load->view('templates/header', $this->m_headlab);
				$this->load->view('modals/login');
				$this->load->view('modals/create_new_account');
				$this->load->view('welcome/calorie_counter');
				$this->load->view('templates/footer');
			}
		}
	}
	
	/**
	 * Användaren vill logga ut.
	 */
	public function logout()
	{
		//Tar bort session.
		$this->session->unset_userdata('session');
		
		//Skriv ut vy.
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('modals/login');
		$this->load->view('modals/create_new_account');
		$this->load->view('welcome/calorie_counter');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Skapa matvara.
	 *
	 */
	public function create_food()
	{
		
	}
	
	/**
	 * Hitta matvara.
	 *
	 */
	public function find_food()
	{
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */