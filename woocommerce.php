<?php get_header(); ?>
<?php if (is_shop() && class_exists('WooCommerce')) :
    $shop_url = wc_get_page_permalink('shop');
    $active   = isset($_GET['dmz_type']) ? sanitize_key(wp_unslash($_GET['dmz_type'])) : 'all';
    $search   = isset($_GET['dmz_search']) ? sanitize_text_field(wp_unslash($_GET['dmz_search'])) : '';
    $products = wc_get_products([
        'limit'   => -1,
        'status'  => 'publish',
        'orderby' => 'date',
        'order'   => 'DESC',
    ]);

    $groups = [
        'pumps'      => ['label' => 'Fire Pumps', 'terms' => ['pump', 'gx200']],
        'hose'       => ['label' => 'Hose & Accessories', 'terms' => ['hose', 'extension', 'accessor']],
        'protection' => ['label' => 'Covers & Warranty', 'terms' => ['cover', 'warranty']],
    ];

    $matches_group = function($product, $group) use ($groups) {
        if (!isset($groups[$group])) return true;
        $haystack = strtolower($product->get_name() . ' ' . wp_strip_all_tags($product->get_short_description()));
        foreach ($groups[$group]['terms'] as $term) {
            if (strpos($haystack, $term) !== false) return true;
        }
        return false;
    };

    $visible = array_values(array_filter($products, function($product) use ($active, $search, $matches_group) {
        if ($active !== 'all' && !$matches_group($product, $active)) return false;
        if ($search !== '') {
            $haystack = strtolower($product->get_name() . ' ' . wp_strip_all_tags($product->get_short_description()));
            if (strpos($haystack, strtolower($search)) === false) return false;
        }
        return true;
    }));

    usort($visible, function($a, $b) {
        $a_pump = (stripos($a->get_name(), 'pump system') !== false || stripos($a->get_name(), 'gx200') !== false) ? 1 : 0;
        $b_pump = (stripos($b->get_name(), 'pump system') !== false || stripos($b->get_name(), 'gx200') !== false) ? 1 : 0;
        return $b_pump <=> $a_pump;
    });
?>
<main class="dmz-shop-page">
  <section class="dmz-shop-hero">
    <div class="dmz-container">
      <div class="dmz-eyebrow">DMZ Equipment</div>
      <h1>Shop</h1>
      <p>Portable fire pump systems, hose, protection, and field-ready accessories.</p>
    </div>
  </section>

  <section class="dmz-shop-body">
    <div class="dmz-container">
      <div class="dmz-shop-toolbar" aria-label="Shop filters">
        <nav class="dmz-shop-filters" aria-label="Product types">
          <a class="<?php echo $active === 'all' ? 'is-active' : ''; ?>" href="<?php echo esc_url($shop_url); ?>">All Products</a>
          <?php foreach ($groups as $key => $group) : ?>
            <a class="<?php echo $active === $key ? 'is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('dmz_type', $key, $shop_url)); ?>"><?php echo esc_html($group['label']); ?></a>
          <?php endforeach; ?>
        </nav>
        <form class="dmz-shop-search" method="get" action="<?php echo esc_url($shop_url); ?>" role="search">
          <?php if ($active !== 'all') : ?><input type="hidden" name="dmz_type" value="<?php echo esc_attr($active); ?>"><?php endif; ?>
          <label class="screen-reader-text" for="dmz-product-search">Search products</label>
          <input id="dmz-product-search" type="search" name="dmz_search" value="<?php echo esc_attr($search); ?>" placeholder="Search equipment…">
          <button type="submit">Search</button>
        </form>
      </div>

      <div class="dmz-shop-meta"><strong><?php echo esc_html(count($visible)); ?></strong> <?php echo count($visible) === 1 ? 'product' : 'products'; ?></div>

      <?php if ($visible) : ?>
        <div class="dmz-shop-grid">
          <?php foreach ($visible as $product) : ?>
            <article class="dmz-shop-card<?php echo (stripos($product->get_name(), 'pump system') !== false || stripos($product->get_name(), 'gx200') !== false) ? ' is-primary' : ''; ?>">
              <a class="dmz-shop-card-image" href="<?php echo esc_url($product->get_permalink()); ?>">
                <?php echo $product->get_image('woocommerce_single'); ?>
                <?php if ($product->is_on_sale()) : ?><span class="dmz-sale-badge">Sale</span><?php endif; ?>
              </a>
              <div class="dmz-shop-card-body">
                <div class="dmz-product-kicker"><?php echo (stripos($product->get_name(), 'pump system') !== false || stripos($product->get_name(), 'gx200') !== false) ? 'Featured Pump System' : 'DMZ Equipment'; ?></div>
                <h2><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a></h2>
                <div class="dmz-shop-card-price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                <div class="dmz-shop-card-actions">
                  <a class="dmz-btn red" href="<?php echo esc_url($product->get_permalink()); ?>">View Details</a>
                  <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?><a class="dmz-btn ghost" href="<?php echo esc_url($product->add_to_cart_url()); ?>">Add to Cart</a><?php endif; ?>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php else : ?>
        <div class="dmz-shop-empty"><h2>No equipment found.</h2><p>Try another product type or search term.</p><a class="dmz-btn red" href="<?php echo esc_url($shop_url); ?>">View All Products</a></div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php else : ?>
<main class="dmz-content">
  <?php woocommerce_content(); ?>
</main>
<?php endif; ?>
<?php get_footer(); ?>
