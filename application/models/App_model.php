<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model {

	function __construct() {
		parent::__construct();		
	}

	public function register($data) {

		date_default_timezone_set('America/Santiago');
		$fecha = date("Y-m-d H:i:s");		

		$producto = $data['producto'];
		$nombre   = $data['nombre'];
		$email    = $data['email'];
		$telefono = $data['telefono'];
		$edad     = $data['edad'];
		
        $datos = array( 'producto' => $producto, 
                        'nombre'   => $nombre,
                        'email'    => $email,
                        'telefono' => $telefono,
                        'edad'     => $edad,
                        'fecha'     => $fecha
                       );

        $this->db->insert('registros_elijetufavorita', $datos);
        return 1;		

	}	

}
