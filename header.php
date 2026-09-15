<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="dmz-topbar"><div class="dmz-container"><span>Portable Fire Pumps • Parts • Water Transfer Equipment</span><span>Built for fire, field & emergency response</span></div></div>
<header class="dmz-header"><div class="dmz-container dmz-header-inner">
<a class="dmz-brand dmz-brand-graphic" href="<?php echo esc_url(home_url('/')); ?>" aria-label="DMZ Pumps home"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/dmz-logo.svg'); ?>" alt="DMZ Pumps — Fire & Water Systems"></a>
<nav class="dmz-nav" aria-label="Primary Navigation"><?php if(has_nav_menu('primary')){wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'menu','fallback_cb'=>false]);}else:?><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><a href="<?php echo esc_url(dmz_shop_url()); ?>">Shop</a><a href="<?php echo esc_url(dmz_product_category_url('portable-fire-pumps')); ?>">Fire Pumps</a><?php if(get_page_by_path('contact')):?><a href="<?php echo esc_url(dmz_page_url('contact')); ?>">Contact</a><?php endif;?><?php endif;?></nav>
<div class="dmz-header-actions"><?php if(class_exists('WooCommerce')):?><a class="dmz-mini-btn" href="<?php echo esc_url(dmz_cart_url()); ?>">Cart <?php echo WC()->cart?'('.intval(WC()->cart->get_cart_contents_count()).')':''; ?></a><?php endif;?><?php if(get_page_by_path('contact')):?><a class="dmz-mini-btn primary" href="<?php echo esc_url(dmz_page_url('contact')); ?>">Request Quote</a><?php else:?><a class="dmz-mini-btn primary" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Pumps</a><?php endif;?></div>
</div></header>
