<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Aeroblog
 */

get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if (have_posts() ) : ?>

                <?php aeroblog_page_header_before(); ?>
                <header class="page-header">
                    <h1 class="page-title">
                        <?php if (AEROBLOG_SUPPORT_FONTAWESOME ) : ?>
                            <i class="fa fa-search" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php printf(__('Search Results for: %s', 'aeroblog'), '<span>' . get_search_query() . '</span>'); ?>
                    </h1>
                </header><!-- .page-header -->
                <?php aeroblog_page_header_after(); ?>

                <?php aeroblog_content_while_before(); ?>

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                    get_template_part('template-parts/content', 'search');

                endwhile;
                ?>

                <?php aeroblog_content_while_after(); ?>

                <?php

                /**
                 * Pagination
                 */
                aeroblog_pagination_before();

                the_posts_pagination(
                    array(
                            'mid_size'  => 4,
                            'prev_text' => ( ( AEROBLOG_SUPPORT_FONTAWESOME ) ? '<i class="fa fa-angle-left" aria-hidden="true"></i>' : '' ) . __(' Previous', 'aeroblog'),
                            'next_text' => __('Next', 'aeroblog') . ( ( AEROBLOG_SUPPORT_FONTAWESOME ) ? '<i class="fa fa-angle-right" aria-hidden="true"></i>' : '' ),
                    )
                );

                aeroblog_pagination_after();

            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php

aeroblog_get_sidebar_archive();

get_footer();
