<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aeroblog
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if (have_posts() ) : ?>

                <?php aeroblog_page_header_before(); ?>

                    <header class="page-header">
                        <?php aeroblog_the_archive_title(); ?>
                        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                    </header><!-- .page-header -->

                <?php aeroblog_page_header_after(); ?>

                <?php aeroblog_content_while_before(); ?>

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
                    get_template_part('template-parts/content', get_post_format());

                endwhile;
                ?>

                <?php aeroblog_content_while_after(); ?>

                <?php aeroblog_pagination_before(); ?>

                <?php
                /* Pagination */
                the_posts_pagination(
                    array(
                        'mid_size'  => 4,
                        'prev_text' => ( ( AEROBLOG_SUPPORT_FONTAWESOME ) ? '<i class="fa fa-angle-left" aria-hidden="true"></i>' : '' ) . __(' Previous', 'aeroblog'),
                        'next_text' => __('Next', 'aeroblog') . ( ( AEROBLOG_SUPPORT_FONTAWESOME ) ? '<i class="fa fa-angle-right" aria-hidden="true"></i>' : '' ),
                    )
                );
                ?>

                <?php aeroblog_pagination_after(); ?>

            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php

aeroblog_get_sidebar_archive();

get_footer();
