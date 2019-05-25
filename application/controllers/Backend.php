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


	 /*home traslados*/
	public function trasladosRoo()
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

	/*home traslados*/
	public function trasladosCuernavaca()
	{
		if(!@$this->session->userdata('datos_admin')) redirect ('login');

		$data['title']= "Listado de traslados por zona";
		$data['traslados']= $this->traslados_model->get_trasladosCuernavaca();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('trasladoscuernavaca', $data);
		$this->load->view('footer');
	}
	 /*home traslados*/
	public function excursionesCuernavaca()
	{
		if(!@$this->session->userdata('datos_admin')) redirect ('login');

		$data['title']= "Listado de excursiones por zona";
		$data['traslados']= $this->traslados_model->get_excursionesCuernavaca();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('excursionescuernavaca', $data);
		$this->load->view('footer');
	}


	



	/* funcion generica del home agrega nueva tarifa al excursion o traslado*/
	public function nuevoDestino ()
	{	
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$this->traslados_model->set_destino();
	}
	
	/* funcion generica del home elimina excursion o traslado*/
	public function delDestino(){
	if(!@$this->session->userdata('datos_admin')) redirect ('login');
	$this->traslados_model->delDestino();
	}
	

	/*pantalla editar tarifas traslados */
	public function editarTrasladoRoo(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');	
		$data['traslados']= $this->traslados_model->get_tarifasTraslados();
		$data['title']= "Agregar o editar tarifas para el traslado";
		$data['destino']= $this->traslados_model->get_destino();
		$data['pax']= $this->traslados_model->get_catalogopax();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('editartrasladosroo', $data);
		$this->load->view('footer');
	}
	/*pantalla editar tarifas excursiones */
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

	/*pantalla editar tarifas traslados */
	public function editarTrasladoCuernavaca(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');	
		$data['traslados']= $this->traslados_model->get_tarifasTraslados();
		$data['title']= "Agregar o editar tarifas para el traslado";
		$data['destino']= $this->traslados_model->get_destino();
		$data['pax']= $this->traslados_model->get_catalogopax();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('editartrasladoscuernavaca', $data);
		$this->load->view('footer');
	}
	/*pantalla editar tarifas excursiones */
	public function editarExcursionCuernavaca(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');	
		$data['traslados']= $this->traslados_model->get_tarifasTraslados();
		$data['title']= "Agregar o editar tarifas para la excursion";
		$data['destino']= $this->traslados_model->get_destino();
		$data['pax']= $this->traslados_model->get_catalogopax();
		$this->load->view('header',$data);
		$this->load->view('menu');
		$this->load->view('editarexcursionescuernavaca', $data);
		$this->load->view('footer');
	}

	/*funciones para editar taridas de la excursion o traslado*/
	public function nuevaTarifa ()
	{
		/* funcion generica solo necesita el id y la nueva tarifa enviada con js*/
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$this->traslados_model->set_tarifa();

	}

	public function editaTarifaAjax ()
	{
	if(!@$this->session->userdata('datos_admin')) redirect ('login');
	$this->traslados_model->edita_tarifa();
	}

	
	

	

	public function delTarifa(){
		if(!@$this->session->userdata('datos_admin')) redirect ('login');
		$this->traslados_model->delTarifa();
	}
	


	/*funciones generales de la interface*/

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
