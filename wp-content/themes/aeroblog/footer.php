<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aeroblog
 */

?>
    <?php aeroblog_content_bottom(); ?>
    </div><!-- #content -->
    <?php aeroblog_content_after(); ?>

    <?php aeroblog_footer_before(); ?>
    <footer id="colophon" class="site-footer" role="contentinfo">
    <?php aeroblog_footer_top(); ?>

        <div class="site-info">
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'aeroblog')); ?>">
                <?php printf(esc_html__('Powered by %s', 'aeroblog'), 'WordPress'); ?>
            </a>
            <span class="sep"> <?php _e('|', 'aeroblog'); ?> </span>
            <?php printf(esc_html__('Theme: %1$s', 'aeroblog'), '<a href="https://profiles.wordpress.org/jitendrabanjara1991" rel="designer">Aeroblog</a>'); ?>
        </div><!-- .site-info -->

    <?php aeroblog_footer_bottom(); ?>
    </footer><!-- #colophon -->
    <?php aeroblog_footer_after(); ?>

</div><!-- #page -->

<?php aeroblog_body_bottom(); ?>
<?php wp_footer(); ?>

</body>
</html>
