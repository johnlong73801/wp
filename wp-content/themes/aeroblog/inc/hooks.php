<?php
/**
 * Theme Hook Alliance hook stub list.
 *
 * @package Aeroblog
 */

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $aeroblog_supports[] = 'html;
 */
function aeroblog_html_before() 
{
    do_action('aeroblog_html_before');
}

/**
 * HTML <head> hooks
 *
 * $aeroblog_supports[] = 'head';
 */

/**
 * <head> top
 */
function aeroblog_head_top() 
{
    do_action('aeroblog_head_top');
}

/**
 * <head> bottom
 */
function aeroblog_head_bottom() 
{
    do_action('aeroblog_head_bottom');
}

/**
 * HTML <body> hooks
 * $aeroblog_supports[] = 'body';
 */

/**
 * <body> top
 */
function aeroblog_body_top() 
{
    do_action('aeroblog_body_top');
}

/**
 * <body> bottom
 */
function aeroblog_body_bottom() 
{
    do_action('aeroblog_body_bottom');
}

/**
 * Semantic <header> hooks
 *
 * $aeroblog_supports[] = 'header';
 */

/**
 * Header before
 */
function aeroblog_header_before() 
{
    do_action('aeroblog_header_before');
}

/**
 * Header after
 */
function aeroblog_header_after() 
{
    do_action('aeroblog_header_after');
}

/**
 * Header top
 */
function aeroblog_header_top() 
{
    do_action('aeroblog_header_top');
}

/**
 * Header bottom
 */
function aeroblog_header_bottom() 
{
    do_action('aeroblog_header_bottom');
}

/**
 * Semantic <content> hooks
 *
 * $aeroblog_supports[] = 'content';
 */

/**
 * Content before
 */
function aeroblog_content_before() 
{
    do_action('aeroblog_content_before');
}

/**
 * Content after
 */
function aeroblog_content_after() 
{
    do_action('aeroblog_content_after');
}

/**
 * Content top
 */
function aeroblog_content_top() 
{
    do_action('aeroblog_content_top');
}

/**
 * Content bottom
 */
function aeroblog_content_bottom() 
{
    do_action('aeroblog_content_bottom');
}

/**
 * Entry content after
 */
function aeroblog_entry_content_after() 
{
    do_action('aeroblog_entry_content_after');
}

/**
 * Entry content before
 */
function aeroblog_entry_content_before() 
{
    do_action('aeroblog_entry_content_before');
}

/**
 * Entry content top
 */
function aeroblog_entry_content_top() 
{
    do_action('aeroblog_entry_content_top');
}

/**
 * Entry content bottom
 */
function aeroblog_entry_content_bottom() 
{
    do_action('aeroblog_entry_content_bottom');
}

/**
 * Entry header before
 */
function aeroblog_entry_header_before() 
{
    do_action('aeroblog_entry_header_before');
}

/**
 * Entry header top
 */
function aeroblog_entry_header_top() 
{
    do_action('aeroblog_entry_header_top');
}

/**
 * Entry header bottom
 */
function aeroblog_entry_header_bottom() 
{
    do_action('aeroblog_entry_header_bottom');
}

/**
 * Entry header after
 */
function aeroblog_entry_header_after() 
{
    do_action('aeroblog_entry_header_after');
}

/**
 * Aeroblog_entry_footer
 */
function aeroblog_entry_footer() 
{
    do_action('aeroblog_entry_footer');
}

/**
 * Entry footer before
 */
function aeroblog_entry_footer_before() 
{
    do_action('aeroblog_entry_footer_before');
}

/**
 * Entry footer top
 */
function aeroblog_entry_footer_top() 
{
    do_action('aeroblog_entry_footer_top');
}

/**
 * Entry footer bottom
 */
function aeroblog_entry_footer_bottom() 
{
    do_action('aeroblog_entry_footer_bottom');
}

/**
 * Entry footer after
 */
function aeroblog_entry_footer_after() 
{
    do_action('aeroblog_entry_footer_after');
}

/**
 * Content while before
 */
function aeroblog_content_while_before() 
{
    do_action('aeroblog_content_while_before');
}

/**
 * Content while after
 */
function aeroblog_content_while_after() 
{
    do_action('aeroblog_content_while_after');
}

/**
 * Semantic <footer> hooks
 *
 * $aeroblog_supports[] = 'footer';
 */

/**
 * Footer before
 */
function aeroblog_footer_before() 
{
    do_action('aeroblog_footer_before');
}

/**
 * Footer after
 */
function aeroblog_footer_after() 
{
    do_action('aeroblog_footer_after');
}

/**
 * Footer top
 */
function aeroblog_footer_top() 
{
    do_action('aeroblog_footer_top');
}

/**
 * Footer bottom
 */
function aeroblog_footer_bottom() 
{
    do_action('aeroblog_footer_bottom');
}

/**
 * Semantic 'page-header' hooks
 *
 * $aeroblog_supports[] = 'page-header';
 */

/**
 * Page header before
 */
function aeroblog_page_header_before() 
{
    do_action('aeroblog_page_header_before');
}

/**
 * Page header after
 */
function aeroblog_page_header_after() 
{
    do_action('aeroblog_page_header_after');
}

/**
 * Semantic 'pagination' hooks
 *
 * $aeroblog_supports[] = 'pagination';
 */

/**
 * Pagination before
 */
function aeroblog_pagination_before() 
{
    do_action('aeroblog_pagination_before');
}

/**
 * Pagination after
 */
function aeroblog_pagination_after() 
{
    do_action('aeroblog_pagination_after');
}

/**
 * Semantic 'comments_template' hooks
 *
 * $aeroblog_supports[] = 'comments_template';
 */

/**
 * Comments template before
 */
function aeroblog_comments_template_before() 
{
    do_action('aeroblog_comments_template_before');
}

/**
 * Comments template after
 */
function aeroblog_comments_template_after() 
{
    do_action('aeroblog_comments_template_after');
}
