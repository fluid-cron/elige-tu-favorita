<?php
/**
* Plugin Name: Formulario Elije tu favorita
* Plugin URI: http://www.cronstudio.com
* Description: Mostrar/Exportar datos Formulario
* Version: 1.0 
* Author: Manuel Meriño
*/

function register_formularios()
{
	add_menu_page( 'Formulario Elije tu favorita', 'Formulario Elije tu favorita', 'manage_options', 'manager-formularios/inicio.php', '', 'dashicons-media-text', 7 ); 
}
add_action( 'admin_menu', 'register_formularios' );

add_action( 'init', 'my_plugin_admin_init' );
function my_plugin_admin_init() 
{
  
   wp_register_script('script-formularios', plugins_url( '/js/script.js', __FILE__ ) , array( 'jquery' ) );
   wp_enqueue_script('script-formularios' );  

   wp_register_script('jquery-ui', plugins_url( '/js/jquery-ui.js', __FILE__ ) );
   wp_enqueue_script('jquery-ui' );     

   wp_register_style( 'jquery-ui-css', plugins_url('css/jquery-ui.css', __FILE__) );
   wp_enqueue_style( 'jquery-ui-css' ); 

   wp_register_style( 'myPluginStylesheet', plugins_url('css/stylesheet.css', __FILE__) );
   wp_enqueue_style( 'myPluginStylesheet' ); 

}

function export()
{

	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=exportar-elije-tu-favorita.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	global $wpdb;

	$desde   = isset( $_POST['desde'] ) ? $_POST['desde'] : "";
	$hasta   = isset( $_POST['hasta'] ) ? $_POST['hasta'] : "";

	if( $desde!="" && $hasta!="" )
	{

		$where = ' WHERE left(fecha,10) BETWEEN "'.$desde.'" AND "'.$hasta.'" ';

	}	

	$entries = $wpdb->get_results( "SELECT * 
								    FROM registros_elijetufavorita
								    $where 
								    order by id desc" );	

	?>
		<table border="1" >
		<tr>
			<td>ID</td>
			<td>Producto</td>
			<td>Nombre</td>
			<td>Email</td>
			<td>Teléfono</td>
			<td>Fecha</td>
		</tr>
		<?php foreach($entries as $key){ ?>
			<tr>
				<td><?php echo $key->id; ?></td>
				<td><?php echo utf8_decode($key->producto); ?></td>				
				<td><?php echo utf8_decode($key->nombre); ?></td>				
				<td><?php echo utf8_decode($key->email); ?></td>				
				<td><?php echo utf8_decode($key->telefono); ?></td>				
				<td><?php echo $key->fecha; ?></td>
			</tr>   
		<?php } ?> 
		</table>
	<?php	

	wp_die();
}
add_action( 'wp_ajax_my_action', 'export' );








