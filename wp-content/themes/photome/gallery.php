<?php
/**
 * Template Name: Gallery
 * The main template file for display gallery page
 *
 * @package WordPress
*/

$page_gallery_id = get_post_meta($post->ID, 'page_gallery_id', true);
$gallery_template = get_post_meta($page_gallery_id, 'gallery_template', true);
global $page_gallery_id;

if(!empty($page_gallery_id))
{
	switch($gallery_template)
	{	
	    case 'Gallery Fullscreen Cover':
		default:
		    get_template_part("gallery-fullscreen-cover");
		break;
		
		case 'Gallery Fullscreen':
		    get_template_part("gallery-fullscreen");
		break;
		
		case 'Gallery Kenburns':
		    get_template_part("gallery-kenburns");
		break;
		
		case 'Gallery Horizontal':
		    get_template_part("gallery-horizontal");
		break;
		
		case 'Gallery Flow':
		    get_template_part("gallery-flow");
		break;
		
		case 'Gallery Split Screen':
		    get_template_part("gallery-split-screen");
		break;
		
		case 'Gallery Split Screen Wide':
		    get_template_part("gallery-split-screen-wide");
		break;
		
		case 'Gallery 2 Columns Contained':
		    get_template_part("gallery-2-contained");
		break;
		
		case 'Gallery 3 Columns Contained':
		    get_template_part("gallery-3-contained");
		break;
		
		case 'Gallery 4 Columns Contained':
		    get_template_part("gallery-4-contained");
		break;
		
		case 'Gallery Masonry 2 Columns Contained':
		    get_template_part("gallery-2-contained-masonry");
		break;
		
		case 'Gallery Masonry 3 Columns Contained':
		    get_template_part("gallery-3-contained-masonry");
		break;
		
		case 'Gallery Masonry 4 Columns Contained':
		    get_template_part("gallery-4-contained-masonry");
		break;
		
		case 'Gallery 2 Columns Wide':
		    get_template_part("gallery-2-wide");
		break;
		
		case 'Gallery 3 Columns Wide':
		    get_template_part("gallery-3-wide");
		break;
		
		case 'Gallery 4 Columns Wide':
		    get_template_part("gallery-4-wide");
		break;
		
		case 'Gallery 5 Columns Wide':
		    get_template_part("gallery-5-wide");
		break;
		
		case 'Gallery Masonry 2 Columns Wide':
		    get_template_part("gallery-2-wide-masonry");
		break;
		
		case 'Gallery Masonry 3 Columns Wide':
		    get_template_part("gallery-3-wide-masonry");
		break;
		
		case 'Gallery Masonry 4 Columns Wide':
		    get_template_part("gallery-4-wide-masonry");
		break;
		
		case 'Gallery Masonry 5 Columns Wide':
		    get_template_part("gallery-5-wide-masonry");
		break;
	}
}
else
{
	echo 'Please select gallery you want to display in page options.';
}

exit;
?>