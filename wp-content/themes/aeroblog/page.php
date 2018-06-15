<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

                get_template_part('template-parts/content', 'page');

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

aeroblog_get_sidebar_page();

get_footer();
