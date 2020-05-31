<?php
/**
 * The template for displaying search content.
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
$extension_settings = extension_get_theme_options(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
	<?php  
		$extension_entry_meta_blog = $extension_settings['extension_entry_meta_blog'];
		$extension_blog_content_layout = $extension_settings['extension_blog_content_layout'];
		$extension_blog_post_image = $extension_settings['extension_blog_post_image'];
		$extension_tag_list = get_the_tag_list();
		$extension_format = get_post_format();
		$extension_post_category = $extension_settings['extension_post_category'];
		$extension_post_author = $extension_settings['extension_post_author'];
		$extension_post_date = $extension_settings['extension_post_date'];
		$extension_post_comments = $extension_settings['extension_post_comments'];

	if( has_post_thumbnail() && $extension_blog_post_image == 'on') { ?>

		<div class="post-image-content">
			<figure class="post-featured-image">
					<a title="<?php the_title_attribute(); ?>" href="<?php echo esc_url(get_permalink()); ?>" >
						<?php the_post_thumbnail(); ?>
					</a>
			</figure><!-- end.post-featured-image -->	
		</div><!-- end.post-image-content -->

	<?php } ?>
	<header class="entry-header">
		<?php if($extension_entry_meta_blog != 'hide-meta' ){ ?>
			<div class="entry-meta">
				<?php if ( current_theme_supports( 'post-formats', $extension_format ) ) {

					printf( '<span class="entry-format"><a href="%1$s">%2$s</a></span>', esc_url( get_post_format_link( $extension_format ) ), esc_attr(get_post_format_string( $extension_format )) );

				}

				if($extension_post_category !=1){ ?>

					<span class="cat-links">
						<?php the_category(); ?>
					</span> <!-- end .cat-links -->

				<?php }

				if(!empty($extension_tag_list)){ ?>

					<span class="tag-links">
						<?php echo get_the_tag_list(); ?>
					</span> <!-- end .tag-links -->

				<?php } ?>
			</div> <!-- end .entry-meta -->

		<?php } ?>
		<h2 class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_title();?> </a> </h2> <!-- end.entry-title -->
		<?php if($extension_entry_meta_blog != 'hide-meta' ){ ?>
			<div class="entry-meta">
				<?php 
				if($extension_post_author !=1){
					echo '<span class="author vcard"><a href="'.esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )).'" title="'.the_title_attribute('echo=0').'"><i class="fas fa-user-alt" aria-hidden="true"></i> ' .esc_html(get_the_author()).'</a></span>';
				}
				if($extension_post_date !=1){

					printf( '<span class="posted-on"><a href="%1$s" title="%2$s"><i class="fas fa-calendar-alt" aria-hidden="true"></i> %3$s </a></span>',
									esc_url(get_the_permalink()),
									esc_attr( get_the_time(get_option( 'date_format' )) ),
									esc_attr( get_the_time(get_option( 'date_format' )) )
								);
				}

				if ( comments_open() && $extension_post_comments !=1) { ?>

						<span class="comments">
						<?php comments_popup_link( __( '<i class="far fa-comment-alt" aria-hidden="true"></i> No Comments', 'extension' ), __( '<i class="far fa-comment-alt" aria-hidden="true"></i> 1 Comment', 'extension' ), __( '<i class="far fa-comment-alt" aria-hidden="true"></i> % Comments', 'extension' ), '', __( 'Comments Off', 'extension' ) ); ?> </span>

				<?php } ?>

			</div> <!-- end .entry-meta -->
		<?php } ?>
	</header><!-- end .entry-header -->
	<div class="entry-content">

		<?php the_excerpt();?>

	</div> <!-- end .entry-content -->
</article><!-- end .post -->