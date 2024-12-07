<?php

namespace Elementor;

class End_Offer_Controls
{
    public function register_controls($widget)
    {
        // Content End Style Section
        $widget->start_controls_section(
            'end_offer_content_section', // Unique ID for widget section
            [
                'label' => __('متن پیغام اتمام', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Edit Content for Alert Message
        $widget->add_control(
            'end_offer_alert_message',
            [
                'label' => __('متن پیغام اتمام رویداد', 'woocommerce_offer_product'),
                'type' => Controls_Manager::TEXT,
                'default' => __('We are sorry, Event ended!', 'woocommerce_offer_product'),
                'placeholder' => __('Enter the alert message', 'woocommerce_offer_product'),
            ]
        );

        $widget->end_controls_section();

        // Title End Style Section
        $widget->start_controls_section(
            'end_offer_style_section', // Unique ID for widget section
            [
                'label' => __('استایل پیغام', 'woocommerce_offer_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // End Offer Controls 
        $widget->add_control(
            'end_offer_alignment',
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
                'default' => 'right', // Default Alignment
                'selectors' => [
                    '{{WRAPPER}} .end-offer-alert' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Offer End Title Color
        $widget->add_control(
            'end_offer_color',
            [
                'label' => __('رنگ عنوان', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff', // Default color
                'selectors' => [
                    '{{WRAPPER}} .end-offer-alert' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Offer End Title Background
        $widget->add_control(
            'end_offer_background',
            [
                'label' => __('رنگ پس زمینه', 'woocommerce_offer_product'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgb(204, 24, 24)', // Default color
                'selectors' => [
                    '{{WRAPPER}} .end-offer-alert' => 'background: {{VALUE}};',
                ],
            ]
        );



        $widget->end_controls_section();
    }
}
