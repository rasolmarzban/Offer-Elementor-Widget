<?php

namespace Elementor;

class WooCommerce_Offer_Products_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'woocommerce-offer-products-widget';
    }

    public function get_title()
    {
        return __('Offer Products', 'woocommerce_offer_product');
    }

    public function get_icon()
    {
        return 'fa fa-tags'; // Default icon
    }

    public function get_categories()
    {
        return ['woocommerce'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'offer_width_size',
            [
                'label' => __('Width Size', 'woocommerce_offer_product'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 1200,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 440,
                ],
                'selectors' => [
                    '{{WRAPPER}} .special-offer' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'products',
            [
                'label' => __('Select Products', 'woocommerce_offer_product'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_the_product(),
                'multiple' => true,
                'default' => [],
            ]
        );

        $this->add_control(
            'countdown_end_date',
            [
                'label' => __('Countdown End Date & Time', 'woocommerce_offer_product'),
                'type' => Controls_Manager::DATE_TIME,
                'picker_options' => [
                    'dateFormat' => 'Y-m-d',
                    'timeFormat' => 'H:i:s',
                    'showButtonPanel' => true,
                ],
                'default' => '',
            ]
        );

        $this->end_controls_section();

        //Discount Controls 
        include_once WPOFF_PATH . 'widgets/class-discount-controls.php';
        $additional_controls = new Offer_Discount_Controls();
        $additional_controls->register_controls($this);

        //Offer Title Controls 
        include_once WPOFF_PATH . 'widgets/class-product-title-controls.php';
        $additional_controls = new Offer_Title_Controls();
        $additional_controls->register_controls($this);

        //Offer Review Controls 
        include_once WPOFF_PATH . 'widgets/class-review-offer-controls.php';
        $additional_controls = new Review_Offer_Controls();
        $additional_controls->register_controls($this);

        //Offer Price Controls 
        include_once WPOFF_PATH . 'widgets/class-offer-price-controls.php';
        $additional_controls = new price_Offer_Controls();
        $additional_controls->register_controls($this);

        //Offer Description Controls 
        include_once WPOFF_PATH . 'widgets/class-offer-description-controls.php';
        $additional_controls = new description_Offer_Controls();
        $additional_controls->register_controls($this);

        //Offer End Controls 
        include_once WPOFF_PATH . 'widgets/class-end-offer-controls.php';
        $additional_controls = new End_Offer_Controls();
        $additional_controls->register_controls($this);
    }


    protected function get_the_product()
    {
        // Get all published products
        $args = [
            'post_type' => 'product',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ];

        $products = new \WP_Query($args);
        $options = [];

        // Check if products exist
        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                $options[get_the_ID()] = get_the_title(); // Use ID as key and title as value
            }
            wp_reset_postdata(); // Reset the query data
        }

        return $options; // Return the array of product options
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $selected_products = $settings['products'];

        // Calculate end time based on selected date and time
        $end_time = strtotime($settings['countdown_end_date']);

        // Prepare product data for the template
        $products_data = [];

        if (!empty($selected_products)) {
            foreach ($selected_products as $product_id) {
                $product = wc_get_product($product_id);
                if ($product) {
                    // Gather necessary product information
                    $products_data[] = [
                        'id' => $product_id,
                        'name' => $product->get_name(),
                        'link' => get_permalink($product_id),
                        'image' => wp_get_attachment_image($product->get_image_id(), 'full'),
                        'regular_price' => $product->get_regular_price(),
                        'sale_price' => $product->get_sale_price(),
                        'average_rating' => $product->get_average_rating(),
                        'description' => $product->get_description(),
                    ];
                }
            }
        }

        // Include your custom HTML template and pass data
        $template_path = WPOFF_PATH . 'template/index.php';
        if (file_exists($template_path)) {
            include $template_path;
        } else {
            echo '<p>' . __('Template file not found.', 'woocommerce_offer_product') . '</p>';
        }

        // Store the end time in localStorage for the countdown
        echo "<script>
        var countdownEndTime = $end_time;
        localStorage.setItem('countdownEndTime', countdownEndTime);
    </script>";
    }
    protected function include_template()
    {
        // Ensure the path is correct based on your file structure
        $template_path = WPOFF_PATH . 'template/index.php';

        if (file_exists($template_path)) {
            include($template_path);
        } else {
            echo '<p>' . __('Template file not found.', 'woocommerce_offer_product') . '</p>';
        }
    }
}
