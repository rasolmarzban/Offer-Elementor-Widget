<?php

namespace Elementor;

class description_Offer_Controls
{
    public function register_controls($widget)
    {

        // Description Offer Style Section
        $widget->start_controls_section(
            'description_offer_style_section', // Unique ID for widget section
            [
                'label' => __('استایل توضیحات', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Review Offer Controls 
        $widget->add_control(
            'Description_offer_alignment',
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
                    '{{WRAPPER}} .offer-description' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Offer Description Color
        $widget->add_control(
            'offer_description_color',
            [
                'label' => __('رنگ توضیحات', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .offer-description' => ' color: {{VALUE}};',
                ],
            ]
        );

        //Offer Description Size
        $widget->add_control(
            'offer_description_size',
            [
                'label' => __('اندازه متن توضیحات', 'woocommerce_offer_product'),
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
                    '{{WRAPPER}} .offer-description' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $widget->end_controls_section();
    }
}
