<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}

$module_files = glob( __DIR__ . '/modules/*/*.php' );

$divi_modules = get_option( 'dsm_modules', array() );

if ( empty( $divi_modules ) ) {
	// Load custom Divi Builder modules.
	foreach ( (array) $module_files as $module_file ) {
		if ( $module_file && preg_match( "/\/modules\/\b([^\/]+)\/\\1\.php$/", $module_file ) ) {
			require_once $module_file;
		}
	}
} else {
	foreach ( $divi_modules as $module => $toggle ) {
		if ( 'on' === $toggle ) {
			require_once plugin_dir_path( __FILE__ ) . 'modules/' . $module . '/' . $module . '.php';

			if ( 'AdvancedTabs' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/AdvancedTabsChild/AdvancedTabsChild.php';
			}
			if ( 'BusinessHours' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/BusinessHoursChild/BusinessHoursChild.php';
			}
			if ( 'CardCarousel' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/CardCarouselChild/CardCarouselChild.php';
			}
			if ( 'CircleInfo' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/CircleInfoChild/CircleInfoChild.php';
			}
			if ( 'ContentTimeLine' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/ContentTimeLineChild/ContentTimeLineChild.php';
			}
			if ( 'Faq' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/FaqChild/FaqChild.php';
			}
			if ( 'FlipBoxPerk' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/FlipBoxPerkChild/FlipBoxPerkChild.php';
			}
			if ( 'FloatingMultiImages' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/FloatingMultiImagesChild/FloatingMultiImagesChild.php';
			}
			if ( 'IconList' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/IconListChild/IconListChild.php';
			}
			if ( 'ImageAccordion' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/ImageAccordionChild/ImageAccordionChild.php';
			}
			if ( 'ImageHotSpots' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/ImageHotSpotsChild/ImageHotSpotsChild.php';
			}
			if ( 'PriceList' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/PriceListChild/PriceListChild.php';
			}
			if ( 'SocialShareButtons' === $module ) {
				require_once plugin_dir_path( __FILE__ ) . 'modules/SocialShareButtonsChild/SocialShareButtonsChild.php';
			}
		}
	}
}
