<?php

namespace Elementor;

class Review_Offer_Controls
{
    public function register_controls($widget)
    {

        // Title Products Style Section
        $widget->start_controls_section(
            'review_offer_style_section', // Unique ID for widget section
            [
                'label' => __('استایل بازدید', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Review Offer Controls 
        $widget->add_control(
            'review_offer_alignment',
            [
                'label' => __('مرتبسازی', 'woocommerce_offer_product'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'woocommerce_offer_product'),
                        'icon' => 'eicon-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'woocommerce_offer_product'),
                        'icon' => 'eicon-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'woocommerce_offer_product'),
                        'icon' => 'eicon-align-right',
                    ],
                ],
                'default' => 'left', // Default Alignment
                'selectors' => [
                    '{{WRAPPER}} .offer-review' => 'text-align: {{VALUE}};',
                ],
            ]
        );


        $widget->end_controls_section();
    }
}
