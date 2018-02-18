<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$preloader = get_theme_mod('preloader_set', 'circle');
if($preloader){
?>
<?php get_template_part( 'layouts/hanson', 'preloader' ); ?>
<?php } ?>

    <div class="main-container">

        <?php get_template_part( 'layouts/hanson', 'topheader' ); ?>
        <?php get_template_part( 'layouts/hanson', 'header' ); ?>

	    <div id="content" class="site-content">
