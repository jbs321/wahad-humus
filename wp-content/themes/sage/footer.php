<?php
/**
 * Sage Theme footer file
 * @package WordPress
 * @subpackage Sage Theme
 * @since 1.0
 * TO BE INCLUDED IN ALL OTHER PAGES
 */

 $hgr_options = get_option( 'redux_options' );
 $allowed_html_array = array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
);





@include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( is_plugin_active('hgr_megafooter/hgr_megafooter.php') && isset($hgr_options['hgr_megafooter_select']) && !empty($hgr_options['hgr_megafooter_select']) ) {
	
	// Do we have a custom MegaFooter for this page?
	// Or we use the default MegaFooter
	$hgr_custom_megafooterID	=	get_post_meta( get_the_ID(), '_hgr_megafooterID', true );
	$hgr_megafooterID			=	( !empty($hgr_custom_megafooterID	) ? $hgr_custom_megafooterID : $hgr_options['hgr_megafooter_select'] );
	$hgr_megafooter				=	get_post( $hgr_megafooterID, ARRAY_A );
	$hgr_page_color_scheme		=	get_post_meta( $hgr_megafooterID, '_hgr_page_color_scheme', true );
	wp_reset_postdata();
	echo '<div class="container '.esc_attr($hgr_page_color_scheme).'">';
	echo do_shortcode($hgr_megafooter['post_content']);
	echo '</div>';
}
else

if ( !empty($hgr_options['footer-copyright']) ) : ?>
<div class="row bka_footer <?php echo esc_attr($hgr_options['footer_color_scheme']);?>" style="padding:10px; <?php echo( !empty($hgr_options['footer-bgcolor']) ? ' background-color:' . esc_attr( $hgr_options['footer-bgcolor'] ) . ';' : '');?>">
    <div class="container">
        <div class="col-md-12" style="text-align:center;">
            <?php echo wp_kses( $hgr_options['footer-copyright'], $allowed_html_array );?>
        </div>
    </div>
</div>
<?php endif; ?>

  <script type="text/javascript">
	var home_url					=	'<?php echo esc_url( home_url("/") );?>';
	var template_directory_uri	=	'<?php echo esc_url( get_template_directory_uri() );?>';
	var retina_logo_url			=	'<?php echo( !empty($hgr_options['retina_logo']['url']) ? esc_url($hgr_options['retina_logo']['url']) : "''" );?>';
	var menu_style				=	'<?php echo( !empty($hgr_options['header_floating']) ? esc_attr($hgr_options['header_floating']) : '' );?>';
	var is_front_page			=	'<?php echo( is_front_page() ? 'true' : 'false' );?>';
 	var custom_js 				=	<?php echo( isset($hgr_options['enable_js-code']) && $hgr_options['enable_js-code'] == 'custom_js_on' ? json_encode( $hgr_options['js-code']) : "''" );?>;
  </script>
  
    <div id="hgr_left"></div>
    <div id="hgr_right"></div>
    <div id="hgr_top"></div>
    <div id="hgr_bottom"></div>
 

<?php 
	/*
	*	Custom hook
	*/
	sage_before_footer_open(); 
?>


</div> <!--Website Boxed END-->

	<?php wp_footer();?>
    
 </body>
</html>