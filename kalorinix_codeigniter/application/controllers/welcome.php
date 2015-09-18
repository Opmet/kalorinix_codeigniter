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
				$this->load->view('run/create_account_script');
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
				$data = $this->account->create_account($email, $password); // Kör modell
				
				//Skriv ut vy.
				$this->load->view('templates/header', $this->m_headlab);
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
				$this->load->view('run/login_script');
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
				$data = $this->account->login($email, $password); // Kör modell
				
				//Skriv ut vy.
				$this->load->view('templates/header', $this->m_headlab);
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
		$this->load->view('welcome/calorie_counter');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Skapa matvara.
	 *
	 */
	public function create_food()
	{
		$data = []; // Tom array.
		$data['message'] = false; //inget medelande.
		
		// Om post är aktiv.
		// Annars visa vy.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			//Sätt validerings regler vara.
			$this->form_validation->set_rules('food_item', 'Matvara', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('kcal', 'Kcal', 'trim|required|numeric|max_length[45]|xss_clean');
			$this->form_validation->set_rules('protein', 'Protein', 'trim|required|numeric|max_length[45]|xss_clean');
			$this->form_validation->set_rules('kolhydrat', 'Kolhydrat', 'trim|required|numeric|max_length[45]|xss_clean');
			$this->form_validation->set_rules('fett', 'Fett', 'trim|required|numeric|max_length[45]|xss_clean');
			$this->form_validation->set_rules('other', 'Övrigt', 'trim|max_length[200]|xss_clean');

			//Sätt validerings regler enhet.
			$this->form_validation->set_rules('st', 'stycken', 'trim|numeric|max_length[10]|xss_clean');
			$this->form_validation->set_rules('l', 'Liter', 'trim|numeric|max_length[10]|xss_clean');
			$this->form_validation->set_rules('dl', 'Deciliter', 'trim|numeric|max_length[10]|xss_clean');
			$this->form_validation->set_rules('msk', 'Matsked', 'trim|numeric|max_length[10]|xss_clean');
			$this->form_validation->set_rules('tsk', 'Tesked', 'trim|numeric|max_length[10]|xss_clean');
			$this->form_validation->set_rules('krm', 'Kryddmått', 'trim|numeric|max_length[10]|xss_clean');
		
			//Sätt eventuellt felmeddelande
			$this->form_validation->set_message('required', 'Fyll i fältet: %s!');
			$this->form_validation->set_message('min_length', '%s: Ange minst %s tecken!');
			$this->form_validation->set_message('max_length', '%s: Ange max %s tecken!');
		
			//Om validering påträffar fel.
			//Annars skapa ny matvara.
			if ($this->form_validation->run() == FALSE)
			{
				
				//Skriv ut vy med felen.
				$this->load->view('templates/header', $this->m_headlab);
				$this->load->view('run/create_food_script', $data);
				$this->load->view('welcome/calorie_counter');
				$this->load->view('templates/footer');
			}else {
				
				//Hämtar variabel
				$form = [];
				$form['food_item'] = $this->my_validation->test_input($_POST["food_item"]);
				$form['kcal'] = $this->my_validation->test_input($_POST["kcal"]);
				$form['protein'] = $this->my_validation->test_input($_POST["protein"]);
				$form['kolhydrat'] = $this->my_validation->test_input($_POST["kolhydrat"]);
				$form['fett'] = $this->my_validation->test_input($_POST["fett"]);
				$form['other'] = $this->my_validation->test_input($_POST["other"]);
				
				//Extra enheter
				$form['st'] = $this->my_validation->test_input($_POST["st"]);
				$form['l'] = $this->my_validation->test_input($_POST["l"]);
				$form['dl'] = $this->my_validation->test_input($_POST["dl"]);
				$form['msk'] = $this->my_validation->test_input($_POST["msk"]);
				$form['tsk'] = $this->my_validation->test_input($_POST["tsk"]);
				$form['krm'] = $this->my_validation->test_input($_POST["krm"]);
				
				
				//Modell
				$this->load->model('food'); // Laddar modell.
				$data['message'] = $this->food->create_food( $form ); // Kör modell
				
				$data['food_item'] = $form['food_item'];
		
				//Skriv ut vy.
				$this->load->view('templates/header', $this->m_headlab);
				$this->load->view('run/create_food_script', $data);
				$this->load->view('welcome/calorie_counter');
				$this->load->view('templates/footer');
			}
		}else{
			//Skriv ut vy.
			$this->load->view('templates/header', $this->m_headlab);
			$this->load->view('run/create_food_script' , $data);
			$this->load->view('welcome/calorie_counter');
			$this->load->view('templates/footer');
		}
	}
	
	/**
	 * AJAX. Hitta matvara. 
	 * @param $p_search En söksträng.
	 * @return Varor enligt söksträngen.
	 *
	 */
	public function find_food($p_search)
	{
		//Validera
		$str = $this->my_validation->test_input($p_search);
		
		//Modell
		$this->load->model('food'); // Laddar modell.
		
		$result = $this->food->find_food($str); // Kör modell
		
		echo json_encode($result);
	}
	
	
	Något fungerade inte!<br />
	Kanske har din dator en äldre webbläsare installerad?<br />
	Isåfall kan det fungera att ladda hem en ny version.
	</p>
	<p>Exempel på webbläsare:
	<br /><a href="https://www.google.se/chrome/browser/">Google chrome</a>
	<br /><a href="https://www.mozilla.org/firefox/">Mozilla firefox</a>
	</p>
	
	
	/**
	 * Något fungerade inte men webbläsaren.
	 * Ex: if(!window.indexedDB) Testar om indexedDB stödjs.
	 */
	public function not_supported()
	{
		//Skriv ut vy.
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('templates/not_supported');
		$this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */