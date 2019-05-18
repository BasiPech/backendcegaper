<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public $administrador;

	public function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library('session');
			$this->load->library('encryption');
			$this->load->helper('url_helper');
			$this->load->model('traslados_model');
			$this->load->model('admin_model');
			$this->session->userdata('datos_admin');
			
	}



	public function login()
	{
			$data=array();
			if($this->session->userdata('datos_admin'))
			{
				redirect('excursionesRoo');
			}
			else
			{
				if(!empty($_POST)) 
				{
				$datosusuario= $this->admin_model->get_admin();
				$this->session->set_userdata('datos_admin', $datosusuario);
				$this->load->view('login', $data);
				}	
			
			}
		
		$this->load->view('login', $data);
	}

	public function test()
	{
		print_r( $this->session->datos_admin->nombre);
		

;	}

	public function trasladosroo()
	{
	
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('excursionesroo');
		$this->load->view('footer');
	}

	public function excursionesroo()
	{
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$data['traslados']= $this->traslados_model->get_excursionesRoo();
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('excursionesroo', $data);
		$this->load->view('footer');
	}
	
	public function logout()
	{
		
		$this->session->unset_userdata('datos_admin');
		
	}
}
