<?php 

get_header(); 

?>
<div id="main">
<div id="content">
<?php if($_REQUEST):if(isset($_GET['post_type'])&&$_GET['post_type']=="resume"):?>
<h1 class="center_text">Résumés</h1>
<?php elseif(isset($_GET['post_type'])&&$_GET['post_type']=="project"): ?>
<h1 class="center_text">Projects</h1>
<?php endif;else: ?>
<h1 class="center_text">Posts</h1>
<?php endif; ?>
<?php  
$argsResume = array('post_type' => 'resume');
$argsproject = array('post_type' => 'project');
//Define the loop based on arguments
 
$loopR = new WP_Query( $argsResume );
$loopP = new WP_Query( $argsproject );
//Display the contents
?>

<?php	
 if (have_posts()) : while (have_posts()) : the_post();
?>

<!-- Blog Post -->
<?php if( !isset($_GET['post_type']) ):  ?>
<h1> Website Info</h1>
<div id="general">	
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span>
</div>
<?php endif; ?>
<!-- Tutorials -->
<?php if($_REQUEST){if(isset($_GET['post_type'])&&$_GET['post_type']=="resume"):?>
<div id="general">
<span id="ttitle" > <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
 </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> </span> 
</div>

<!-- Projects -->
<?php elseif(isset($_GET['post_type'])&&$_GET['post_type']=="project"): ?>
<div id="projects">
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<img src="<?php echo $url; ?>">
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>
<?php endif;} ?>

<?php 
/*
 *content from both resumes and projects for homepage
 */
 ?>

<?php endwhile; endif; if( !isset($_GET['post_type']) ): ?>
<div class='homepage-block'>
<h2> Projects </h2> 
<?php

// echo contents in projects
 while ( $loopP->have_posts() ) : $loopP->the_post(); ?>
<div id="general">	
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>
<?php endwhile;?>
</div>
<div class='homepage-block'>

<h2> Résumés </h2>
<?php
// echo contents in tutorial
while ( $loopR->have_posts() ) : $loopR->the_post();
?>

<div id="general">	
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>


</div>

<?php get_sidebar(); ?>
</div>
<div id="delimiter">
</div>
<?php get_footer(); 

?>
