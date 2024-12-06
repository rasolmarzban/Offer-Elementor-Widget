<?php

namespace Elementor;

class Offer_Discount_Controls
{
    public function register_controls($widget)
    {

        // Discount Style Section
        $widget->start_controls_section(
            'discount_offer_style_section', // Unique ID for widget section
            [
                'label' => __('Discount Style', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Discount Tag Color
        $widget->add_control(
            'discount_offer_title_color',
            [
                'label' => __('Discount Title Color', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FF0000', // Example color for discount
                'selectors' => [
                    '{{WRAPPER}} .sale-tag' => 'color: {{VALUE}};',
                ],
            ]
        );
        $widget->add_control(
            'discount_offer_background_color',
            [
                'label' => __('Discount Background Color', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FF0000', // Example color for discount
                'selectors' => [
                    '{{WRAPPER}} .sale-tag' => 'background: {{VALUE}};',
                ],
            ]
        );

        $widget->end_controls_section();
    }
}
