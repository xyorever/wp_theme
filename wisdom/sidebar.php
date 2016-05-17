<div id="sidebar">
<h2 ><?php _e('Projects'); ?></h2>
<ul >
	<li>
		<a href="<?php echo get_post_type_archive_link( 'project' );  ?>"> Projects </a> 
	</li>
</ul>

<h2><?php _e('Résumés') ?> </h2>
<ul>
	<li>
		<a href="<?php echo get_post_type_archive_link( 'resume' );  ?>"> Résumés </a> 
	</li>
</ul>
</div>