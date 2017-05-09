<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('App_model','model');
	}    
    
        public function index() {
            
            $data['title'] = "Home";
            $this->load->template('home',$data);		                       
            
        }
        
	public function saveFormulario() {

            $nombre   = trim(@$this->input->post("nombre"));
            $producto = trim(@$this->input->post("producto"));
            $email    = trim(@$this->input->post("email"));
            $telefono = trim(@$this->input->post("telefono"));
            $edad     = trim(@$this->input->post("edad"));

            if( $nombre!="" && $producto!="" && $email!="" && $telefono!="" && $edad!="" ) {
                    echo $this->model->register($_POST);
            }else{
                    echo 0;
            }

	}
        
}
