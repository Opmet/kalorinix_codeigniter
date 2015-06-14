<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
	
		$this->load->helper('url');
		$this->load->library('MySession');
	
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
		$this->_view('welcome/', 'calorie_counter', null);
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
		
		//Ladda modellen
		if ( ! file_exists(APPPATH.'/views/' . $p_path . $p_page . '.php'))
		{
			$data += $this->load->model('blog_model'); // Kör modell.
		}
		//$this->load->model('blog_model'); // Laddar modell.
		//$data = $this->blog_model->fetch_post(); // Kör modell
		//$data += $this->blog_model->fetch_new_bloggers(); // Kör modell
	
		//Ladda vyn
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view($p_path . $p_page , $data);
		$this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */