<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/global/html-header', 'parts/global/header' ) ); ?>
<?php Section_Builder::sec_Begins(); ?>

<h2>Page not found</h2>

<?php Section_Builder::sec_Ends(); ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/global/footer','parts/global/html-footer' ) ); ?>