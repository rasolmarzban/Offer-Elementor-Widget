<?php

namespace Elementor;

class Offer_Title_Controls
{
    public function register_controls($widget)
    {

        // Title Products Style Section
        $widget->start_controls_section(
            'title_offer_style_section', // Unique ID for widget section
            [
                'label' => __('Title Product Style', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Product Title Color
        $widget->add_control(
            'title_offer_color',
            [
                'label' => __('Product Title Color', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .offer-product-title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Product Title Color On Hover
        $widget->add_control(
            'title_offer_color_Hover',
            [
                'label' => __('Product Title Color', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .offer-product-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Product Title Size
        $widget->add_control(
            'title_size',
            [
                'label' => __('Product Title Size', 'woocommerce_offer_product'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0.5,
                        'max' => 6,
                    ],
                    'rem' => [
                        'min' => 0.5,
                        'max' => 6,
                    ],
                ],
                'default' => [
                    'size' => 16,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .offer-product-title a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Title Alignment
        $widget->add_control(
            'title_offer_alignment',
            [
                'label' => __('Title Alignment', 'woocommerce_offer_product'),
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
                    '{{WRAPPER}} .offer-product-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $widget->end_controls_section();
    }
}
