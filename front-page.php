<?php get_header(); ?>
<?php
$hero_product = null;
if (class_exists('WooCommerce')) {
    $hero_products = wc_get_products([
        'limit'   => 1,
        'status'  => 'publish',
        'orderby' => 'date',
        'order'   => 'DESC',
    ]);
    if (!empty($hero_products)) $hero_product = $hero_products[0];
}
?>
<main>
<section class="dmz-slider" data-dmz-slider>
  <div class="dmz-slide is-active dmz-slide-product">
    <div class="dmz-container dmz-slide-inner">
      <div class="dmz-slide-copy">
        <div class="dmz-slide-label">DMZ Pumps • Portable Fire Systems</div>
        <h1>Field-ready pumping power.</h1>
        <p>Portable fire and water-transfer equipment built for fast deployment, straightforward service, and demanding conditions.</p>
        <div class="dmz-actions"><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Pumps</a><a class="dmz-btn light" href="<?php echo esc_url(dmz_product_category_url('portable-fire-pumps')); ?>">View Equipment</a></div>
      </div>
      <div class="dmz-slide-product-art">
        <?php if ($hero_product): ?>
          <a href="<?php echo esc_url($hero_product->get_permalink()); ?>"><?php echo $hero_product->get_image('woocommerce_single'); ?></a>
        <?php else: ?>
          <div class="dmz-product-placeholder">DMZ</div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="dmz-slide dmz-slide-photo" style="background-image:linear-gradient(90deg,rgba(0,0,0,.82),rgba(0,0,0,.45) 52%,rgba(0,0,0,.08)),url('https://images.unsplash.com/photo-1561439740-e8863909de77?auto=format&fit=crop&q=85&w=2200');">
    <div class="dmz-container dmz-slide-inner">
      <div class="dmz-slide-copy">
        <div class="dmz-slide-label">Fire Protection</div>
        <h2>Water where the response needs it.</h2>
        <p>Portable pumping systems for property protection, wildland operations, emergency supply, and remote drafting.</p>
        <a class="dmz-btn red" href="<?php echo esc_url(dmz_product_category_url('portable-fire-pumps')); ?>">Explore Fire Pumps</a>
      </div>
    </div>
  </div>

  <div class="dmz-slide dmz-slide-photo" style="background-image:linear-gradient(90deg,rgba(0,0,0,.84),rgba(0,0,0,.38) 58%,rgba(0,0,0,.12)),url('https://images.unsplash.com/photo-1774599730994-79221ac4e74d?auto=format&fit=crop&q=85&w=2200');">
    <div class="dmz-container dmz-slide-inner">
      <div class="dmz-slide-copy">
        <div class="dmz-slide-label">Emergency & Municipal</div>
        <h2>Built for rapid deployment.</h2>
        <p>Move water quickly with equipment designed around practical operation, hose deployment, and field accessibility.</p>
        <a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Equipment</a>
      </div>
    </div>
  </div>

  <button class="dmz-slider-arrow prev" type="button" aria-label="Previous slide" data-dmz-prev>‹</button>
  <button class="dmz-slider-arrow next" type="button" aria-label="Next slide" data-dmz-next>›</button>
  <div class="dmz-slider-dots" aria-label="Hero slider navigation">
    <button class="is-active" type="button" aria-label="Slide 1" data-dmz-dot="0"></button>
    <button type="button" aria-label="Slide 2" data-dmz-dot="1"></button>
    <button type="button" aria-label="Slide 3" data-dmz-dot="2"></button>
  </div>
</section>

<section class="dmz-quickstrip">
  <div class="dmz-container dmz-quickstrip-grid">
    <a href="<?php echo esc_url(dmz_product_category_url('portable-fire-pumps')); ?>"><span class="dmz-quick-icon">↗</span><div><strong>Portable Fire Pumps</strong><small>Rapid-deployment pumping systems</small></div></a>
    <a href="<?php echo esc_url(dmz_product_category_url('parts')); ?>"><span class="dmz-quick-icon">⚙</span><div><strong>Parts & Service</strong><small>Replacement and service components</small></div></a>
    <a href="<?php echo esc_url(dmz_product_category_url('accessories')); ?>"><span class="dmz-quick-icon">◫</span><div><strong>Hose & Accessories</strong><small>Valves, hose, fittings and hardware</small></div></a>
  </div>
</section>

<section class="dmz-section dmz-image-categories">
  <div class="dmz-container">
    <div class="dmz-section-head"><div><div class="dmz-eyebrow">Shop by Application</div><h2>Equipment for the job.</h2></div><p>A more visual way to find the right pump, parts, and accessories for the way the system will actually be used.</p></div>
    <div class="dmz-image-tile-grid">
      <a class="dmz-image-tile large" href="<?php echo esc_url(dmz_product_category_url('portable-fire-pumps')); ?>" style="background-image:linear-gradient(0deg,rgba(0,0,0,.78),rgba(0,0,0,.08)),url('https://images.unsplash.com/photo-1561439740-e8863909de77?auto=format&fit=crop&q=82&w=1400');"><span>Fire Protection</span><strong>Portable Fire Pumps</strong><em>Shop pumps →</em></a>
      <a class="dmz-image-tile" href="<?php echo esc_url(dmz_product_category_url('accessories')); ?>" style="background-image:linear-gradient(0deg,rgba(0,0,0,.78),rgba(0,0,0,.05)),url('https://images.unsplash.com/photo-1690902963605-eb14875288cd?auto=format&fit=crop&q=82&w=1200');"><span>Water Delivery</span><strong>Hose & Accessories</strong><em>View accessories →</em></a>
      <a class="dmz-image-tile" href="<?php echo esc_url(dmz_product_category_url('parts')); ?>" style="background-image:linear-gradient(0deg,rgba(0,0,0,.78),rgba(0,0,0,.05)),url('https://images.unsplash.com/photo-1774599730994-79221ac4e74d?auto=format&fit=crop&q=82&w=1200');"><span>Keep It Running</span><strong>Parts & Components</strong><em>Shop parts →</em></a>
    </div>
  </div>
</section>

<section class="dmz-section alt">
  <div class="dmz-container">
    <div class="dmz-section-head"><div><div class="dmz-eyebrow">Featured Equipment</div><h2>Shop DMZ Pumps.</h2></div><p>Current equipment from the DMZ Pumps catalog.</p></div>
    <?php if (class_exists('WooCommerce')):
      $featured_products = wc_get_products(['limit'=>6,'status'=>'publish','orderby'=>'date','order'=>'DESC']);
      if ($featured_products): ?>
        <div class="dmz-featured-grid">
          <?php foreach ($featured_products as $product): ?>
            <article class="dmz-product-card">
              <a class="dmz-product-image" href="<?php echo esc_url($product->get_permalink()); ?>">
                <?php echo $product->get_image('woocommerce_single'); ?>
                <?php if ($product->is_on_sale()): ?><span class="dmz-sale-badge">Sale</span><?php endif; ?>
              </a>
              <div class="dmz-product-info">
                <div class="dmz-product-kicker">DMZ Equipment</div>
                <h3><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
                <div class="dmz-product-price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                <div class="dmz-product-actions"><a class="dmz-btn red" href="<?php echo esc_url($product->get_permalink()); ?>">View Product</a><?php if ($product->is_purchasable() && $product->is_in_stock()): ?><a class="dmz-btn ghost" href="<?php echo esc_url($product->add_to_cart_url()); ?>">Add to Cart</a><?php endif; ?></div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</section>

<section class="dmz-photo-banner" style="background-image:linear-gradient(90deg,rgba(13,13,13,.9),rgba(13,13,13,.42)),url('https://images.unsplash.com/photo-1774599730994-79221ac4e74d?auto=format&fit=crop&q=85&w=2200');">
  <div class="dmz-container"><div class="dmz-photo-banner-copy"><div class="dmz-eyebrow">Real Field Conditions</div><h2>Simple equipment.<br>Serious performance.</h2><p>Portable configurations, serviceable components, and practical layouts for emergency response, property protection, water transfer, and utility work.</p><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">View All Equipment</a></div></div>
</section>

<section class="dmz-section">
  <div class="dmz-container">
    <div class="dmz-section-head"><div><div class="dmz-eyebrow">Applications</div><h2>One pump platform. Many jobs.</h2></div></div>
    <div class="dmz-industries visual">
      <div class="dmz-industry"><span>01</span><h3>Wildland & Property</h3><p>Drafting, hose lays, structure defense, and remote water access.</p></div>
      <div class="dmz-industry"><span>02</span><h3>Municipal & Emergency</h3><p>Backup pumping, tank transfer, dewatering, and response operations.</p></div>
      <div class="dmz-industry"><span>03</span><h3>Industrial & Utility</h3><p>Portable water movement where durability and straightforward service matter.</p></div>
    </div>
  </div>
</section>

<section class="dmz-section dmz-cta-red"><div class="dmz-container dmz-cta-grid"><div><div class="dmz-eyebrow light">Need Help Choosing?</div><h2>Tell us the flow, pressure, lift, and application.</h2></div><div><a class="dmz-btn dark" href="<?php echo esc_url(get_page_by_path('contact') ? dmz_page_url('contact') : dmz_shop_url()); ?>"><?php echo get_page_by_path('contact') ? 'Talk to DMZ Pumps' : 'Shop Pumps'; ?></a></div></div></section>
</main>
<?php get_footer(); ?>
