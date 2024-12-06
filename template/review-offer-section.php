<div class="offer-review">
    <ul class="review">
        <?php
        // Make sure the 'average_rating' key exists and is numeric
        $average_rating = isset($product['average_rating']) ? floatval($product['average_rating']) : 0;

        // Display filled stars based on the average rating
        $filled_stars = round($average_rating); // Round the average rating to nearest whole number (1-5)

        for ($i = 0; $i < 5; $i++) : ?>
            <li>
                <?php if ($i < $filled_stars) : ?>
                    <i class="lni lni-star-filled"></i>
                <?php else : ?>
                    <i class="lni lni-star"></i> <!-- This represents an empty star -->
                <?php endif; ?>
            </li>
        <?php endfor; ?>
        <li><span><?php echo esc_html($average_rating); ?> امتیاز</span></li>
    </ul>
</div>