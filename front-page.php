<?php get_header(); ?>
<main>
<section class="dmz-hero"><div class="dmz-container dmz-hero-grid"><div><div class="dmz-eyebrow">DMZ Pumps • Fire & Water Systems</div><h1>Move water. Hold pressure. Get the job done.</h1><p class="dmz-hero-copy">Portable fire pumps and water-moving equipment for wildland response, municipal use, industrial operations, tank filling, relay pumping, and remote water supply.</p><div class="dmz-actions"><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Fire Pumps</a><?php if (get_page_by_path('contact')): ?><a class="dmz-btn ghost" href="<?php echo esc_url(dmz_page_url('contact')); ?>">Request a Quote</a><?php endif; ?></div></div><div class="dmz-hero-spec"><div class="dmz-spec-card"><strong>01</strong><span>Portable Pump Systems</span></div><div class="dmz-spec-card"><strong>02</strong><span>High-Pressure Equipment</span></div><div class="dmz-spec-card"><strong>03</strong><span>Replacement Parts</span></div><div class="dmz-spec-card"><strong>04</strong><span>Hose & Accessories</span></div></div></div></section>
<section class="dmz-section"><div class="dmz-container"><div class="dmz-section-head"><div><div class="dmz-eyebrow">Equipment Categories</div><h2>Built around the application.</h2></div><p>Shop equipment by function — from rapid-deployment fire pumps to replacement components, suction hardware, adapters, and water-transfer accessories.</p></div><div class="dmz-category-grid"><a class="dmz-category-card" href="<?php echo esc_url(dmz_product_category_url('portable-fire-pumps')); ?>"><span class="num">01</span><h3>Portable Fire Pumps</h3><p>Compact pump packages for wildfire, structure protection, and mobile response.</p></a><a class="dmz-category-card" href="<?php echo esc_url(dmz_product_category_url('high-pressure-pumps')); ?>"><span class="num">02</span><h3>High-Pressure Pumps</h3><p>Pressure-focused systems for long hose lays, elevation gain, and demanding field use.</p></a><a class="dmz-category-card" href="<?php echo esc_url(dmz_product_category_url('parts')); ?>"><span class="num">03</span><h3>Parts & Components</h3><p>Pump ends, seals, fittings, controls, service parts, and replacement hardware.</p></a><a class="dmz-category-card" href="<?php echo esc_url(dmz_product_category_url('accessories')); ?>"><span class="num">04</span><h3>Hose & Accessories</h3><p>Strainers, adapters, nozzles, valves, suction hardware, and deployment accessories.</p></a></div></div></section>
<section class="dmz-section alt"><div class="dmz-container"><div class="dmz-section-head"><div><div class="dmz-eyebrow">Featured Equipment</div><h2>Shop DMZ Pumps.</h2></div><p>Newest equipment from the DMZ Pumps catalog.</p></div>
<?php if (class_exists('WooCommerce')):
  $featured_products = wc_get_products([
    'limit'   => 6,
    'status'  => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
  ]);
  if ($featured_products): ?>
    <div class="dmz-featured-grid">
      <?php foreach ($featured_products as $product): ?>
        <article class="dmz-product-card">
          <a class="dmz-product-image" href="<?php echo esc_url($product->get_permalink()); ?>">
            <?php echo $product->get_image('woocommerce_single'); ?>
            <?php if ($product->is_on_sale()): ?><span class="dmz-sale-badge">Sale</span><?php endif; ?>
          </a>
          <div class="dmz-product-info">
            <div class="dmz-product-kicker">Portable Fire Pump</div>
            <h3><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
            <div class="dmz-product-price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
            <div class="dmz-product-actions">
              <a class="dmz-btn red" href="<?php echo esc_url($product->get_permalink()); ?>">View Product</a>
              <?php if ($product->is_purchasable() && $product->is_in_stock()): ?>
                <a class="dmz-btn ghost" href="<?php echo esc_url($product->add_to_cart_url()); ?>">Add to Cart</a>
              <?php endif; ?>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  <?php else: ?><p>No products found.</p><?php endif; ?>
<?php else: ?><p>Install and activate WooCommerce to display products here.</p><?php endif; ?>
</div></section>
<section class="dmz-section"><div class="dmz-container"><div class="dmz-section-head"><div><div class="dmz-eyebrow">Applications</div><h2>For real field conditions.</h2></div></div><div class="dmz-industries"><div class="dmz-industry"><h3>Wildland Fire</h3><p>Portable systems for drafting, hose lays, structure defense, and remote water access.</p></div><div class="dmz-industry"><h3>Municipal & Emergency</h3><p>Backup pumping, tank transfer, dewatering, and response equipment for fire departments and agencies.</p></div><div class="dmz-industry"><h3>Industrial & Utility</h3><p>Water movement for sites where portability, durability, and straightforward service matter.</p></div></div></div></section>
<section class="dmz-section dmz-band"><div class="dmz-container dmz-band-grid"><div><div class="dmz-eyebrow">DMZ Pumps</div><h2>Simple equipment. Serious performance.</h2></div><div class="dmz-checks"><div class="dmz-check">Portable configurations</div><div class="dmz-check">High-pressure capability</div><div class="dmz-check">Field-serviceable components</div><div class="dmz-check">Parts & accessory support</div><div class="dmz-check">Quote-based equipment sales</div><div class="dmz-check">WooCommerce checkout ready</div></div></div></section>
<section class="dmz-section"><div class="dmz-container"><div class="dmz-section-head"><div><div class="dmz-eyebrow">Need Help Choosing?</div><h2>Tell us the flow, pressure, lift, and application.</h2></div><div><?php if (get_page_by_path('contact')): ?><a class="dmz-btn red" href="<?php echo esc_url(dmz_page_url('contact')); ?>">Talk to DMZ Pumps</a><?php else: ?><a class="dmz-btn red" href="<?php echo esc_url(dmz_shop_url()); ?>">Shop Pumps</a><?php endif; ?></div></div></div></section>
</main>
<?php get_footer(); ?>
