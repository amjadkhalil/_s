<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newname_
 */

if ( ! is_activenewname_idebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamicnewname_idebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
