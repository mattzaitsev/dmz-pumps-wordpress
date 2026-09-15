<?php get_header(); ?>
<?php if (is_shop() && class_exists('WooCommerce')) :
$shop_url=wc_get_page_permalink('shop');
$active=isset($_GET['dmz_type'])?sanitize_key(wp_unslash($_GET['dmz_type'])):'all';
$search=isset($_GET['dmz_search'])?sanitize_text_field(wp_unslash($_GET['dmz_search'])):'';
$sort=isset($_GET['dmz_sort'])?sanitize_key(wp_unslash($_GET['dmz_sort'])):'featured';
$products=wc_get_products(['limit'=>-1,'status'=>'publish','orderby'=>'date','order'=>'DESC']);
$groups=['pumps'=>['label'=>'Fire Pump Systems','terms'=>['pump','gx200']],'hose'=>['label'=>'Hose & Accessories','terms'=>['hose','extension','accessor']],'protection'=>['label'=>'Covers & Protection','terms'=>['cover']],'warranty'=>['label'=>'Warranty','terms'=>['warranty']]];
$matches=function($p,$g)use($groups){if(!isset($groups[$g]))return true;$h=strtolower($p->get_name());foreach($groups[$g]['terms'] as $t)if(strpos($h,$t)!==false)return true;return false;};
$visible=array_values(array_filter($products,function($p)use($active,$search,$matches){if(!$p->is_visible())return false;if($active!=='all'&&!$matches($p,$active))return false;if($search!==''){ $h=strtolower($p->get_name().' '.wp_strip_all_tags($p->get_short_description()));if(strpos($h,strtolower($search))===false)return false;}return true;}));
usort($visible,function($a,$b)use($sort){if($sort==='price-low')return(float)$a->get_price()<=>(float)$b->get_price();if($sort==='price-high')return(float)$b->get_price()<=>(float)$a->get_price();if($sort==='name')return strcasecmp($a->get_name(),$b->get_name());$ap=(stripos($a->get_name(),'pump system')!==false||stripos($a->get_name(),'gx200')!==false)?1:0;$bp=(stripos($b->get_name(),'pump system')!==false||stripos($b->get_name(),'gx200')!==false)?1:0;return $bp<=>$ap;});
?>
<main class="dmz-shop-page"><div class="dmz-container">
<div class="dmz-shop-breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> <span>›</span> Shop Equipment</div>
<section class="dmz-catalog-intro"><h1>DMZ Pumps Equipment</h1><div class="dmz-catalog-banner"><div><strong>DMZ PUMPS</strong><small>FIRE &amp; WATER SYSTEMS</small></div><span>Pump Systems<br>&amp; Equipment</span></div><p>Field-ready pump systems, hose, protection and accessories for fire response and water transfer.</p></section>

<div class="dmz-catalog-layout">
<aside class="dmz-catalog-sidebar" aria-label="Product filters">
<h2>Shopping Options</h2>
<details class="dmz-filter-section" open><summary>Product Type</summary>
<?php $filter_args = ['dmz_search'=>$search,'dmz_sort'=>$sort]; ?>
<a class="<?php echo $active==='all'?'active':''; ?>" <?php echo $active==='all'?'aria-current="true"':''; ?> href="<?php echo esc_url(add_query_arg($filter_args,$shop_url)); ?>">All Equipment</a>
<?php foreach($groups as $key=>$group): $group_count=count(array_filter($products,function($p)use($matches,$key){return $p->is_visible() && $matches($p,$key);})); ?>
<a class="<?php echo $active===$key?'active':''; ?>" <?php echo $active===$key?'aria-current="true"':''; ?> href="<?php echo esc_url(add_query_arg(array_merge($filter_args,['dmz_type'=>$key]),$shop_url)); ?>"><?php echo esc_html($group['label']); ?><span><?php echo esc_html($group_count); ?></span></a>
<?php endforeach; ?></details>
<?php if($active!=='all'||$search!==''): ?><p><a class="dmz-catalog-reset" href="<?php echo esc_url($shop_url); ?>">Clear all filters</a></p><?php endif; ?>
<?php if(get_page_by_path('contact')): ?><div class="dmz-sidebar-help"><strong>FIND THE RIGHT<br>PUMP SYSTEM.</strong><p>Need help with your water source, hose run or elevation? Talk to DMZ Pumps.</p><a href="<?php echo esc_url(dmz_page_url('contact')); ?>">CONTACT DMZ PUMPS</a></div><?php endif; ?>
</aside>
<section class="dmz-catalog-products" aria-label="Products">
<?php wc_print_notices(); ?>
<form class="dmz-catalog-toolbar" method="get" action="<?php echo esc_url($shop_url); ?>"><div class="dmz-view-count">Showing <strong><?php echo esc_html(count($visible)); ?></strong> products</div><div class="dmz-toolbar-controls"><input aria-label="Search products" type="search" name="dmz_search" value="<?php echo esc_attr($search); ?>" placeholder="Search products…"><?php if($active!=='all'):?><input type="hidden" name="dmz_type" value="<?php echo esc_attr($active); ?>"><?php endif;?><label for="dmz-sort">Sort by</label><select id="dmz-sort" name="dmz_sort" onchange="this.form.submit()"><option value="featured" <?php selected($sort,'featured');?>>Featured</option><option value="price-low" <?php selected($sort,'price-low');?>>Price: Low to High</option><option value="price-high" <?php selected($sort,'price-high');?>>Price: High to Low</option><option value="name" <?php selected($sort,'name');?>>Product Name</option></select><button type="submit">Search</button></div></form>
<?php if($visible):?><div class="dmz-catalog-grid"><?php foreach($visible as $product):?><article class="dmz-catalog-card"><a class="dmz-catalog-image" href="<?php echo esc_url($product->get_permalink());?>"><?php echo $product->get_image('woocommerce_thumbnail');?><?php if($product->is_on_sale()):?><span class="dmz-catalog-sale">SALE</span><?php endif;?></a><div class="dmz-catalog-info"><div class="dmz-catalog-brand">DMZ PUMPS</div><h2><a href="<?php echo esc_url($product->get_permalink());?>"><?php echo esc_html($product->get_name());?></a></h2><div class="dmz-catalog-price"><?php echo wp_kses_post($product->get_price_html());?></div><?php if(!$product->is_in_stock()): ?><p class="dmz-catalog-stock">Out of stock</p><?php endif; ?><a class="dmz-catalog-cart" aria-label="<?php echo esc_attr(wp_strip_all_tags($product->add_to_cart_description())); ?>" href="<?php echo esc_url($product->add_to_cart_url()); ?>"><?php echo esc_html($product->add_to_cart_text()); ?></a></div></article><?php endforeach;?></div><?php else:?><div class="dmz-shop-empty"><h2>No equipment found.</h2><p>Try another category or search term.</p><a class="dmz-btn red" href="<?php echo esc_url($shop_url);?>">View All Products</a></div><?php endif;?>
</section></div></div></main>
<?php else:?><main class="dmz-content"><?php woocommerce_content();?></main><?php endif;?>
<?php get_footer();?>
