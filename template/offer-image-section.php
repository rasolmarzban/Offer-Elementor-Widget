<div class="image">
    <?php echo $product['image']; ?>
    <?php
    // Calculate discount percentage
    $discount_percentage = $product['regular_price'] && $product['sale_price'] ? round((($product['regular_price'] - $product['sale_price']) / $product['regular_price']) * 100) : 0;
    ?>
    <span class="sale-tag">-<?php echo esc_html($discount_percentage); ?>%</span>
</div>