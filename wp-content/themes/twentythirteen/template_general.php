<?php
/**
 * 
 * Template Name: General
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<!--<h1 class="entry-title"><?php// the_title(); ?></h1>-->
					</header><!-- .entry-header -->

					<!--<div class="entry-content">-->
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					<!--</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->


 <div class="cuadro15">
<?php 
$key="imagenfooter"; 
?>
            <img src="../<?php echo get_post_meta($post->ID, $key, true); ?>" class="img-responsive image" alt="Imagen responsive" align="left" style="margin-bottom:15px; margin-top:15px;"/>

<?php 
$key="textofooter"; 
echo get_post_meta($post->ID, $key, true); 

?>

 </div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>