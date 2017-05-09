<?php
$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
$desde   = isset( $_GET['desde'] ) ? $_GET['desde'] : "";
$hasta   = isset( $_GET['hasta'] ) ? $_GET['hasta'] : "";

$where       = "";
$where_count = "";

if( $desde!="" && $hasta!="" )
{

	$partes_desde = explode("/",$desde);
	$partes_hasta = explode("/",$hasta);

	$new_desde = $partes_desde[2]."-".$partes_desde[0]."-".$partes_desde[1];
	$new_hasta = $partes_hasta[2]."-".$partes_hasta[0]."-".$partes_hasta[1];

	$where       = ' WHERE left(fecha,10) BETWEEN "'.$new_desde.'" AND "'.$new_hasta.'" ';
	$where_count = ' WHERE left(fecha,10) BETWEEN "'.$new_desde.'" AND "'.$new_hasta.'" ';

}

$limit = 10;
$offset = ( $pagenum - 1 ) * $limit;
$total  = $wpdb->get_var( "SELECT COUNT('id') 
		                  FROM registros_elijetufavorita $where_count" );

$num_of_pages = ceil( $total / $limit );

$entries = $wpdb->get_results( "SELECT * 
							    FROM registros_elijetufavorita
							    $where 
							    ORDER BY id DESC
							    LIMIT $offset, $limit" );

$page_links = paginate_links( array(
    'base' => add_query_arg( array( 'pagenum' => '%#%' ) ),
    'format' => '',
    'prev_text' => __( '&laquo;', 'text-domain' ),
    'next_text' => __( '&raquo;', 'text-domain' ),
    'total' => $num_of_pages,
    'current' => $pagenum,
    'add_args' => array( 'q' => $q )
));

?>

<div class="wrap">

	<h1>Formulario Elije tu favorita</h1>

	<div id="datepicker"></div>

	<ul class="subsubsub">
		<li class="all">Total Registrados : <span class="count" id="publicados_count" ><?php echo $total; ?></span></li>
	</ul>

	<div class="tablenav top">
		<br class="clear">
	</div>

	<div class="tablenav">

		<div class="alignleft actions">
			<form action="<?php echo admin_url('admin.php'); ?>" method="get" >
				<input type="hidden" name="page" value="manager-formularios/inicio.php">			    			    
			    <input type="text" size="15" name="desde" id="desde" placeholder="Fecha desde" value="<?php echo $desde;?>" >
			    <input type="text" size="15" name="hasta" id="hasta" placeholder="fecha hasta" value="<?php echo $hasta;?>" >
			    <input type="submit" class="button-secondary" value="Filter" >			    
			</form>		 
		</div>	

		<div class="alignleft actions">
			<form id="form_export" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" >
				<input type="hidden" name="action" value="my_action" >
				<input type="hidden" name="desde" value="<?php echo @$new_desde; ?>" >
				<input type="hidden" name="hasta" value="<?php echo @$new_hasta; ?>" >
				<input type="button" onclick="getConfirmation();" class="button-primary" value="Exportar Resultados" style="width:150px !important;" >	   
			</form>
		</div>		

	</div>

	<table class="wp-list-table widefat fixed striped posts">

		<thead>
		<tr>
			<th class="manage-column column-date">ID</th>				
			<th class="manage-column column-date">Producto</th>				
			<th class="manage-column column-date">Nombre</th>				
			<th class="manage-column column-date">Email</th>				
			<th class="manage-column column-date">Teléfono</th>				
			<th class="manage-column column-date">Fecha</th>	
		</tr>
		</thead>
		<tbody id="the-list">
		<?php foreach ($entries as $key): ?>
			<tr class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-sin-categoria" >
				<td class="title column-title has-row-actions column-primary page-title" ><?php echo $key->id; ?></td>
				<td class="title column-title has-row-actions column-primary page-title" ><?php echo $key->producto; ?></td>
				<td class="title column-title has-row-actions column-primary page-title" ><?php echo $key->nombre; ?></td>
				<td class="title column-title has-row-actions column-primary page-title" ><?php echo $key->email; ?></td>
				<td class="title column-title has-row-actions column-primary page-title" ><?php echo $key->telefono; ?>
				<td class="title column-title has-row-actions column-primary page-title" ><?php echo $key->fecha; ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>

	</table>

	<?php  
	if ( $page_links )
	{
	    echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
	}
	?>	

	<div id="ajax-response"></div>
</div>





