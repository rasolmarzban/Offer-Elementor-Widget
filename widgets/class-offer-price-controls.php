<?php

namespace Elementor;

class price_Offer_Controls
{
    public function register_controls($widget)
    {

        // Price Products Style Section
        $widget->start_controls_section(
            'price_offer_style_section', // Unique ID for widget section
            [
                'label' => __('Price Style', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Price Offer Controls 
        $widget->add_control(
            'price_offer_alignment',
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
                    '{{WRAPPER}} .offer-price' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Offer Regular Price Color
        $widget->add_control(
            'offer_regular_price_color',
            [
                'label' => __('Regular Price Color', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000', // Default color
                'selectors' => [
                    '{{WRAPPER}} .offer-regular-price' => 'color: {{VALUE}};', // Note the space at the end removed
                ],
            ]
        );

        //Offer Regular Price Size
        $widget->add_control(
            'regular_price_size',
            [
                'label' => __('Regular price Size', 'woocommerce_offer_product'),
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
                    '{{WRAPPER}} .offer-regular-price' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Offer Regular Price Strikethrough Color
        $widget->add_control(
            'offer_regular_price_strikethrough_color',
            [
                'label' => __('Regular Price Strikethrough Color', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#888888', // Default strikethrough color
                'selectors' => [
                    '{{WRAPPER}} .offer-discount-price' => 'text-decoration: line-through; color: {{VALUE}};', // Apply strikethrough effect
                ],
            ]
        );

        //Offer sale Price Size
        $widget->add_control(
            'sale_price_size',
            [
                'label' => __('Sale Price Size', 'woocommerce_offer_product'),
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
                    '{{WRAPPER}} .offer-discount-price' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $widget->end_controls_section();
    }
}
