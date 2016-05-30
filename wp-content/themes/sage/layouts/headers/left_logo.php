
<?php
	$hideonmobile = '';
	
	if( class_exists('Mobile_Detect') ){
		$detect = new Mobile_Detect;
		if( $detect->isMobile() || $detect->isTablet() ){
			// IS MOBILE
			$hideonmobile = ' hgrhideonmobile ';
		}
	}
?>


<nav class="navbar navbar-default">
 
 <?php 
	/*
	* Display OR Hide the minicart, depending on woocommerce support enabled or not in Theme Options
	*/
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if( is_plugin_active('woocommerce/woocommerce.php') && !empty($hgr_options['woo_support']) && $hgr_options['woo_support'] == 1 ) :
		
		
	?>
  <!-- woocommerce minicart -->
  <div class="hgr_woo_minicart sage-cart-icon <?php echo esc_attr($hideonmobile);?>">
    <div class="woo_bubble"><a class="hgr_woo_minicart_content" href="<?php global $woocommerce; echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a><?php echo ( class_exists('HGR_QCV') ? do_shortcode( '[hgr_quick_cart]' ) : '' );?></div>
  </div>
  <!-- end woocommerce minicart -->
  <?php
       endif;
  ?>
  
  <div class="navbar-header">
  
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hgr-navbar-collapse-1"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo ( !empty($hgr_options['logo']['url']) 
		? '<img src="'.$hgr_options['logo']['url'].'" width="'.$hgr_options['logo']['width'].'" height="'.$hgr_options['logo']['height'].'" alt="'.get_bloginfo('name').'" class="logo" />' 
		: '<img src="'.esc_url( get_template_directory_uri() ).'/highgrade/images/logo.png"  alt="Initial Logo" class="logo" />' 
		);?></a>
        
  
  
  </div>
    
  <div class="collapse navbar-collapse" id="hgr-navbar-collapse-1">
    <?php
				$defaults = array(
					'theme_location'  => 'header-menu',
					'menu'            => 'header-menu',
					'container'       => false,
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'nav navbar-nav navbar-right',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => '', //sage_menu_fallback OR 'hgr_bootstrap_navwalker::fallback'
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="mainNavUl" class="%2$s">%3$s</ul>',
					'depth'           => 4,
					'walker'          => new hgr_bootstrap_navwalker()
				);
				wp_nav_menu( $defaults );
		?>
  </div>
</nav>
<!-- .navbar-->