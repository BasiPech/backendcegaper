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



	


	public function nuevoDestino ()
	{	
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$this->traslados_model->set_destino();

	}

	public function nuevaTarifa ()
	{
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$this->traslados_model->set_tarifa();

	}

	public function editaTarifaAjax ()
	{
	if(!@$this->session->userdata('datos_admin')) redirect ('login');
    $this->traslados_model->edita_tarifa();
	
	}

	 /*home traslados*/
	public function trasladosroo()
	{
		if(!@$this->session->userdata('datos_admin')) redirect ('login');

		$data['title']= "Listado de traslados por zona";
		$data['traslados']= $this->traslados_model->get_trasladosRoo();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('trasladosroo', $data);
		$this->load->view('footer');
	}
	 /*home traslados*/
	public function excursionesRoo()
	{
		if(!@$this->session->userdata('datos_admin')) redirect ('login');

		$data['title']= "Listado de excursiones por zona";
		$data['traslados']= $this->traslados_model->get_excursionesRoo();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('excursionesroo', $data);
		$this->load->view('footer');
	}
	/*boton editar */
	public function editarTrasladoRoo(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');	
		$data['traslados']= $this->traslados_model->get_tarifasTraslados();
		$data['title']= "Agregar o editar tarifas para el traslado";
		$data['destino']= $this->traslados_model->get_destino();
		$data['pax']= $this->traslados_model->get_catalogopax();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('editarexcursionesroo', $data);
		$this->load->view('footer');
	}
	/*boton editar */
	public function editarExcursionRoo(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');	
		$data['traslados']= $this->traslados_model->get_tarifasTraslados();
		$data['title']= "Agregar o editar tarifas para la excursion";
		$data['destino']= $this->traslados_model->get_destino();
		$data['pax']= $this->traslados_model->get_catalogopax();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('editarexcursionesroo', $data);
		$this->load->view('footer');
	}


	




	public function delDestino(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$this->traslados_model->delDestino();
	}

	public function delTarifa(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$this->traslados_model->delTarifa();
	}
	
	public function logout()
	{
		
		$this->session->unset_userdata('datos_admin');
		redirect('login');
		
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
				redirect('excursionesRoo');
				
				}	
			
			}
		
		$this->load->view('login', $data);
	}
}
