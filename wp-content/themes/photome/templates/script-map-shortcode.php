<?php
header("content-type: application/x-javascript"); 
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
?>
<?php
$map_data = unserialize(stripslashes($_GET['data']));

$marker = '{ ';
$marker.= 'MapOptions: { ';

if(!empty($map_data['zoom']))
{
	$marker.= 'zoom: '.$map_data['zoom'].',';
	$marker.= 'scrollwheel: false,';
}

if(!empty($map_data['type']))
{
    $marker.= 'mapTypeId: google.maps.MapTypeId.'.$map_data['type'].',';
}

$pp_googlemap_style = get_option('pp_googlemap_style');
if(!empty($pp_googlemap_style))
{
	$marker.= 'styles: '.stripslashes($pp_googlemap_style).',';
}
$marker.= ' }';
$marker.= ' }';

?>
<?php
if(isset($_GET['fullheight']) && $_GET['fullheight'] == 'true')
{
?>
jQuery(window).ready(function(){ 
	var mapHeight = jQuery("#<?php echo esc_js($map_data['id']); ?>").parent().parent().height();
	if(mapHeight>0)
	{
		jQuery("#<?php echo esc_js($map_data['id']); ?>").css('height', mapHeight+'px');
	}
});
<?php
}
?>
jQuery(document).ready(function(){ 
	jQuery("#<?php echo esc_js($map_data['id']); ?>").simplegmaps(<?php echo $marker; ?>); 
});