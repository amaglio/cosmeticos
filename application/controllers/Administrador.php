<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Administrador_model');
		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}



	public function productos()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('producto');
			$crud->columns('id','nombre','descripcion','precio_costo','precio_venta','stock' );
			$crud->display_as('precio_costo','Precio de costo')
				 ->display_as('precio_venta','Precio de venta');
			$crud->set_subject('Productos'); 

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function ventas()
	{		
			$ventas = $this->Administrador_model->get_ventas();

      $array_ventas = array();

      foreach ($ventas as $key => $venta) 
      {
          $datos['venta'] = $venta;
          $datos['venta_productos'] = $this->Administrador_model->get_venta_productos($venta['id']);
          array_push($array_ventas, $datos);
      }

      $data['ventas'] = $array_ventas;

      

			$this->load->view('./templates/header.php');
			$this->load->view('./ventas.php',$data);
			$this->load->view('./templates/footer.php');
	}
 

}
