<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aeroblog
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="error-404 not-found">

                <?php aeroblog_page_header_before(); ?>
                <header class="page-header">
                    <h1 class="page-title">
                        
                        <?php if (AEROBLOG_SUPPORT_FONTAWESOME ) : ?>
                            <i class="fa fa-window-close-o" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'aeroblog'); ?>
                    </h1>
                </header><!-- .page-header -->
                <?php aeroblog_page_header_after(); ?>

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'aeroblog'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->

            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php

aeroblog_get_sidebar_page();

get_footer();
