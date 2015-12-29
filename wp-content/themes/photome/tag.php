<?php
//Get tag page layout setting
$tg_blog_tag_layout = kirki_get_option('tg_blog_tag_layout');

$located = locate_template($tg_blog_tag_layout.'.php');
if (!empty($located))
{
	get_template_part($tg_blog_tag_layout);
}
else
{
	echo 'Error can\'t find page template you selected';
}
?>