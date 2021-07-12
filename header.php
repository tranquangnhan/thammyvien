<?php

/**

 * The template for displaying the header

 *

 * Displays all of the head element and everything up until the "site-content" div.

 *

 * @package WordPress

 * @subpackage Abolire

 * @since Abolire 1.0

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">



	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if ( abolire_get_config('preload', true) ) {

	$preload_icon = abolire_get_config('media-preload-icon');

	$preload_icon_image_img = '';

	if ( (isset($preload_icon['url'])) && (trim($preload_icon['url']) != "" ) ) {

        if (is_ssl()) {

            $preload_icon_image_img = str_replace("http://", "https://", $preload_icon['url']);		

        } else {

            $preload_icon_image_img = $preload_icon['url'];

        }

    }

?>

	<div class="apus-page-loading">

        <div class="apus-loader-inner" style="<?php echo esc_attr($preload_icon_image_img ? 'background-image: url(\''.$preload_icon_image_img.'\')' : ''); ?>"></div>

    </div>

<?php } ?>

<div id="wrapper-container" class="wrapper-container">

	

	<?php get_template_part( 'headers/mobile/offcanvas-menu' ); ?>

	<?php get_template_part( 'headers/mobile/header-mobile' ); ?>



	<?php

		$header = apply_filters( 'abolire_get_header_layout', abolire_get_config('header_type') );

		if ( !empty($header) ) {
			abolire_display_header_builder($header);

		} else {
			if ( is_404() ) {

				get_template_part( 'headers/default-404' );

			} else {

				get_template_part( 'headers/default' );

			}

		}

		// get_template_part( 'headers/default' );

	?>

	<div id="apus-main-content">