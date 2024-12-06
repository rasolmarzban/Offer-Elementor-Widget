<!-- Start Special Offer -->
<section class="special-offer section">
    <?php if (!empty($products_data)) : ?>
        <?php foreach ($products_data as $product) : ?>
            <div class="offer-content">
                <?php include(WPOFF_PATH . 'template/offer-image-section.php'); ?>
                <div class="text">
                    <h2 class="offer-product-title"><a href="<?php echo esc_url($product['link']); ?>"><?php echo esc_html($product['name']); ?></a></h2>
                    <?php include(WPOFF_PATH . 'template/review-offer-section.php'); ?>
                    <?php include(WPOFF_PATH . 'template/offer-price-section.php'); ?>
                    <p class="offer-description"><?php echo esc_html($product['description']); ?></p>
                </div>
                <?php include(WPOFF_PATH . 'template/offer-count-down-timer-section.php'); ?>
                <?php include(WPOFF_PATH . 'template/end-offer-section.php'); ?>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p><?php _e('No products selected for the offer.', 'woocommerce_display_product'); ?></p>
    <?php endif; ?>
</section>
<!-- End Special Offer -->