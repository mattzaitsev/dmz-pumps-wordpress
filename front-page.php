<?php get_header(); ?>
<main class="dmz-home-shell">
<section class="dmz-home-intro">
  <div class="dmz-container">
    <div class="dmz-home-hero-grid">
      <div class="dmz-slider" data-dmz-slider>
        <article class="dmz-slide is-active" style="background-image:url('https://images.pexels.com/photos/5964982/pexels-photo-5964982.jpeg?auto=compress&dpr=1&w=1800');">
          <div class="dmz-slide-inner">
            <div class="dmz-slide-kicker">Portable Fire Pump Systems</div>
            <h1>Water where you need it.</h1>
            <p>Field-ready portable pump systems for wildfire response, property protection, remote water supply, and emergency transfer.</p>
            <div class="dmz-actions"><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Fire Pumps</a></div>
          </div>
        </article>
        <article class="dmz-slide" style="background-image:url('https://images.pexels.com/photos/5964752/pexels-photo-5964752.jpeg?auto=compress&dpr=1&w=1800');">
          <div class="dmz-slide-inner"><div class="dmz-slide-kicker">Hose • Valves • Connections</div><h2>Build the complete system.</h2><p>Pair pumps with the hose, fittings, strainers, valves, and accessories needed for a dependable field setup.</p><div class="dmz-actions"><a class="dmz-btn red" href="<?php echo esc_url(dmz_product_category_url('accessories')); ?>">Shop Accessories</a></div></div>
        </article>
        <article class="dmz-slide" style="background-image:url('https://images.pexels.com/photos/12274593/pexels-photo-12274593.jpeg?auto=compress&dpr=1&w=1800');">
          <div class="dmz-slide-inner"><div class="dmz-slide-kicker">Emergency Water Movement</div><h2>Simple equipment. Serious work.</h2><p>DMZ Pumps is built around straightforward, serviceable equipment for crews that need water moved quickly and reliably.</p><div class="dmz-actions"><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">View Equipment</a></div></div>
        </article>
        <button class="dmz-slide-arrow dmz-slide-prev" type="button" aria-label="Previous slide">‹</button><button class="dmz-slide-arrow dmz-slide-next" type="button" aria-label="Next slide">›</button>
        <div class="dmz-slide-controls" role="tablist" aria-label="Homepage slides"><button class="dmz-slide-dot is-active" type="button" aria-label="Show slide 1" aria-selected="true"></button><button class="dmz-slide-dot" type="button" aria-label="Show slide 2" aria-selected="false"></button><button class="dmz-slide-dot" type="button" aria-label="Show slide 3" aria-selected="false"></button></div>
      </div>
      <div class="dmz-promo-stack">
        <a class="dmz-promo-card" href="<?php echo esc_url(dmz_product_category_url('portable-fire-pumps')); ?>" style="background-image:url('https://images.pexels.com/photos/5964982/pexels-photo-5964982.jpeg?auto=compress&dpr=1&w=900');"><span>Portable Fire Pumps</span></a>
        <a class="dmz-promo-card" href="<?php echo esc_url(dmz_product_category_url('parts')); ?>" style="background-image:url('https://images.pexels.com/photos/12274593/pexels-photo-12274593.jpeg?auto=compress&dpr=1&w=900');"><span>Pump Parts</span></a>
        <a class="dmz-promo-card" href="<?php echo esc_url(dmz_product_category_url('accessories')); ?>" style="background-image:url('https://images.pexels.com/photos/5964752/pexels-photo-5964752.jpeg?auto=compress&dpr=1&w=900');"><span>Hose & Accessories</span></a>
      </div>
    </div>
    <div class="dmz-application-strip"><a class="dmz-app-link" href="<?php echo esc_url(dmz_shop_url()); ?>"><span class="dmz-app-icon">🔥</span><span>Fire Protection</span></a><a class="dmz-app-link" href="<?php echo esc_url(dmz_shop_url()); ?>"><span class="dmz-app-icon">💧</span><span>Water Transfer</span></a><a class="dmz-app-link" href="<?php echo esc_url(dmz_shop_url()); ?>"><span class="dmz-app-icon">⚙</span><span>Industrial & Utility</span></a></div>
  </div>
</section>

<section class="dmz-section compact"><div class="dmz-container"><div class="dmz-section-titlebar"><div><div class="dmz-eyebrow">Featured Equipment</div><h2>Shop DMZ Pumps.</h2></div><p>Start with the complete portable fire pump system, then add the hose, protection, and coverage you need.</p></div>
<?php
if (class_exists('WooCommerce')):
  $featured_products = wc_get_products(['limit'=>20,'status'=>'publish','orderby'=>'date','order'=>'DESC']);
  if ($featured_products):
    usort($featured_products, function($a,$b){
      $rank = function($p){
        $n = strtolower($p->get_name());
        if (strpos($n,'portable fire pump system') !== false || strpos($n,'honda gx200') !== false) return 0;
        if (strpos($n,'50') !== false && (strpos($n,'hose') !== false || strpos($n,'double') !== false)) return 1;
        if (strpos($n,'rain') !== false && strpos($n,'cover') !== false) return 2;
        if (strpos($n,'warranty') !== false) return 3;
        return 10;
      };
      return $rank($a) <=> $rank($b);
    });
    $featured_products = array_slice($featured_products,0,4);
?>
<div class="dmz-featured-grid">
<?php foreach($featured_products as $index=>$product): ?>
<article class="dmz-product-card<?php echo $index===0 ? ' dmz-product-card--spotlight' : ''; ?>">
  <a class="dmz-product-image" href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo $product->get_image('woocommerce_single'); ?><?php if($product->is_on_sale()): ?><span class="dmz-sale-badge">Sale</span><?php endif; ?></a>
  <div class="dmz-product-info"><div class="dmz-product-kicker"><?php echo $index===0 ? 'Complete Pump System' : 'DMZ Accessory'; ?></div><h3><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a></h3><div class="dmz-product-price"><?php echo wp_kses_post($product->get_price_html()); ?></div><div class="dmz-product-actions"><a class="dmz-btn red" href="<?php echo esc_url($product->get_permalink()); ?>">View Product</a><?php if($product->is_purchasable()&&$product->is_in_stock()): ?><a class="dmz-btn ghost" href="<?php echo esc_url($product->add_to_cart_url()); ?>">Add to Cart</a><?php endif; ?></div></div>
</article>
<?php endforeach; ?>
</div>
<?php endif; endif; ?>
</div></section>

<section class="dmz-section alt compact"><div class="dmz-container"><div class="dmz-section-titlebar"><div><div class="dmz-eyebrow">Applications</div><h2>Equipment for real field conditions.</h2></div><p>Browse by application with a more visual industrial equipment layout.</p></div><div class="dmz-image-feature-grid"><div class="dmz-image-feature" style="background-image:url('https://images.pexels.com/photos/5964752/pexels-photo-5964752.jpeg?auto=compress&dpr=1&w=1500');"><div class="dmz-image-feature-content"><h3>Fire response & structure protection</h3><p>Build a portable water-moving setup around the pump, hose, nozzle, and fittings your application requires.</p><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Explore Equipment</a></div></div><div class="dmz-image-feature-side"><div class="dmz-image-feature-small" style="background-image:url('https://images.pexels.com/photos/5964982/pexels-photo-5964982.jpeg?auto=compress&dpr=1&w=1000');"><div class="dmz-image-feature-content"><h3>Deployment Ready</h3></div></div><div class="dmz-image-feature-small" style="background-image:url('https://images.pexels.com/photos/12274593/pexels-photo-12274593.jpeg?auto=compress&dpr=1&w=1000');"><div class="dmz-image-feature-content"><h3>Parts & Connections</h3></div></div></div></div></div></section>
<section class="dmz-service-banner" style="background-image:url('https://images.pexels.com/photos/12274593/pexels-photo-12274593.jpeg?auto=compress&dpr=1&w=1800');"><div class="dmz-container"><div class="dmz-eyebrow">DMZ Pumps Support</div><h2>Need help matching a pump to your application?</h2><p>Tell us your water source, hose run, elevation change, desired flow, and pressure requirements and we can help narrow down the right setup.</p><?php if(get_page_by_path('contact')): ?><a class="dmz-btn red" href="<?php echo esc_url(dmz_page_url('contact')); ?>">Contact DMZ Pumps</a><?php else: ?><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Equipment</a><?php endif; ?></div></section>
<section class="dmz-section dmz-band"><div class="dmz-container dmz-band-grid"><div><div class="dmz-eyebrow">DMZ Pumps</div><h2>Built for fire, field, and water transfer.</h2></div><div class="dmz-checks"><div class="dmz-check">Portable configurations</div><div class="dmz-check">High-pressure applications</div><div class="dmz-check">Field-serviceable components</div><div class="dmz-check">Parts & accessory support</div><div class="dmz-check">Commercial equipment sales</div><div class="dmz-check">WooCommerce checkout ready</div></div></div></section>
<section class="dmz-section compact"><div class="dmz-container"><div class="dmz-section-titlebar"><div><div class="dmz-eyebrow">Need Help Choosing?</div><h2>Tell us the flow, pressure, lift, and application.</h2></div><div><?php if(get_page_by_path('contact')): ?><a class="dmz-btn red" href="<?php echo esc_url(dmz_page_url('contact')); ?>">Talk to DMZ Pumps</a><?php else: ?><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Pumps</a><?php endif; ?></div></div><div class="dmz-source-note">Homepage stock photography sourced from Pexels and used under its free-use license.</div></div></section>
</main>
<?php get_footer(); ?>