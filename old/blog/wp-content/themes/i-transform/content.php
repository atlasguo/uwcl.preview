<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage i-transform
 * @since i-transform 1.0
 */
 
 $full_content = get_theme_mod('full_content', 1);
 ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    	<div class="meta-img">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <div class="entry-thumbnail">
            	<?php if ( ! is_single() && ! is_sticky() ) : ?>
                    <div class="dateonimg">
                        <span class="pdate"><?php the_time('d') ?></span><span class="pmonth"><?php the_time('M') ?>/<?php the_time('y') ?></span>
                    </div>
                <?php elseif ( ! is_single() && is_sticky() ) : ?>
                	<div class="stickyonimg">
                    	<span class="featured-post"></span>
                    </div>
                <?php endif; ?>
                <?php the_post_thumbnail(); ?>
            </div>
        <?php else : ?>
        	<div class="entry-nothumb">
            	<?php if ( ! is_single() && ! is_sticky() ) : ?>
                	<div class="noimg-bg"></div>
                    <div class="dateonimg">
                        <span class="pdate"><?php the_time('d') ?></span><span class="pmonth"><?php the_time('M') ?>/<?php the_time('y') ?></span>
                    </div>
                <?php elseif ( ! is_single() && is_sticky() ) : ?>
                	<div class="noimg-bg"></div>
                	<div class="stickyonimg">
                    	<span class="featured-post"></span>
                    </div>
                <?php endif; ?>
            </div>         
        <?php endif; ?>
        </div>
        
        <div class="post-mainpart">    
            <header class="entry-header">
                <?php if ( is_single() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php else : ?>
                <h1 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h1>
                <?php endif; // is_single() ?>
        
                <div class="entry-meta">
                    <?php itransform_entry_meta(); ?>
                    <?php edit_post_link( __( 'Edit', 'i-transform' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->
        
            <?php if ( is_search() || $full_content == 0 ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'i-transform' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'i-transform' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div><!-- .entry-content -->
            <?php endif; ?>
        
            <footer class="entry-meta">
                <?php if ( comments_open() && ! is_single() ) : ?>
                    <div class="comments-link">
                        <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'i-transform' ) . '</span>', __( 'One comment so far', 'i-transform' ), __( 'View all % comments', 'i-transform' ) ); ?>
                    </div><!-- .comments-link -->
                <?php endif; // comments_open() ?>
        
                <?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
                    <?php get_template_part( 'author-bio' ); ?>
                <?php endif; ?>
            </footer><!-- .entry-meta -->
        </div>
    </article><!-- #post -->    

        

