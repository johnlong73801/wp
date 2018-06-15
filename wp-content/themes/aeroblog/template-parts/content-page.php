<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aeroblog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php aeroblog_entry_header_before(); ?>
    <header class="entry-header">
    <?php aeroblog_entry_header_top(); ?>

    <?php if (has_post_thumbnail(get_the_ID()) ) : ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .entry-thumbnail -->    
    <?php endif; ?>

    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

    <?php aeroblog_entry_header_bottom(); ?>
    </header><!-- .entry-header -->
    <?php aeroblog_entry_header_after(); ?>

    <?php aeroblog_entry_content_before(); ?>
    <div class="entry-content">
    <?php aeroblog_entry_content_top(); ?>

    <?php
    /* translators: %s: Name of current post */
    the_content(
        sprintf(
            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'aeroblog'),
            get_the_title()
        )
    );

    wp_link_pages(
        array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'aeroblog'),
                'after'  => '</div>',
        )
    );
    ?>

    <?php aeroblog_entry_content_bottom(); ?>
    </div><!-- .entry-content -->
    <?php aeroblog_entry_content_after(); ?>

    <?php if (get_edit_post_link() ) : ?>

    <?php aeroblog_entry_footer_before(); ?>
        <footer class="entry-footer">
    <?php aeroblog_entry_footer_top(); ?>

    <?php aeroblog_entry_footer(); ?>

    <?php aeroblog_entry_footer_bottom(); ?>
        </footer><!-- .entry-footer -->
    <?php aeroblog_entry_footer_after(); ?>

    <?php endif; ?>
</article><!-- #post-## -->
