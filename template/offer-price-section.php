<div class="offer-price">
    <?php
    // Get the currency symbol
    $currency_symbol = get_woocommerce_currency_symbol();

    // Ensure the product array is set properly
    $sale_price = !empty($product['sale_price']) ? esc_html($product['sale_price']) : '';
    $regular_price = !empty($product['regular_price']) ? esc_html($product['regular_price']) : '';

    // Determine the display price
    $display_price = $sale_price ? $sale_price : $regular_price;
    ?>

    <span class="offer-regular-price"><?php echo $display_price . " " . $currency_symbol; ?></span>
    <?php if ($regular_price) : ?>
        <span class="offer-discount-price" style="color: <?php echo esc_attr(isset($settings['offer_regular_price_strikethrough_color']) ? $settings['offer_regular_price_strikethrough_color'] : '#000'); ?>; text-decoration: line-through;"><?php echo $regular_price . " " . $currency_symbol; ?></span>
    <?php endif; ?>
</div>