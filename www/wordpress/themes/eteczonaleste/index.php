<!doctype html>
<html <?php language_attributes(); ?> class="font-level--1">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <meta name="author" content="ETEC Zona Leste">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class('overflow-x-hidden'); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
