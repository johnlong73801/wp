<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aeroblog
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php aeroblog_content_while_before(); ?>

            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();

                get_template_part('template-parts/content', get_post_format());

                /**
                     * Pagination
                     */
                aeroblog_pagination_before();

                the_post_navigation(
                    array(
                    'prev_text' => ( ( AEROBLOG_SUPPORT_FONTAWESOME ) ? '<span class="link-icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>' : '' ) . __('<span class="link-wrap"><span class="link-caption">Previous Article</span><span class="link-title">%title</span></span>', 'aeroblog'),
                    'next_text' => __('<span class="link-wrap"><span class="link-caption">Next Article</span><span class="link-title">%title</span></span>', 'aeroblog') . ( ( AEROBLOG_SUPPORT_FONTAWESOME ) ? '<span class="link-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>' : '' ),
                    )
                );

                   aeroblog_pagination_after();

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number() ) :
                        aeroblog_comments_template_before();
                        comments_template();
                        aeroblog_comments_template_after();
                endif;

            endwhile; // End of the loop.
            ?>

            <?php aeroblog_content_while_after(); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php

aeroblog_get_sidebar_single();

get_footer();
