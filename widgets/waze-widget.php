<?php

/**
 * waze widget
 */
namespace Elementorcontact\Widgets;


if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}

/**
 * Elementor waze widget.
 *
 * Elementor widget that displays an waze icon.
 *
 * @since 1.0.0
 */
use  Elementor\Group_Control_Text_Stroke ;
use  Elementor\Group_Control_Text_Shadow ;
use  Elementor\Group_Control_Typography ;
use  Elementor\Core\Kits\Documents\Tabs\Global_Colors ;
use  Elementor\Core\Kits\Documents\Tabs\Global_Typography ;
class WEX_Waze_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve waze widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'icon-box waze-widget';
    }
    
    /**
     * Get widget title.
     *
     * Retrieve waze widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __( 'Waze', 'wpex-elementor-contact-widgets' );
    }
    
    /**
     * Get widget icon.
     *
     * Retrieve waze widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'wpex-icon-waze';
    }
    
    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the waze widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return [ 'contact-widgets' ];
    }
    
    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return [
            'link',
            'icon',
            'box',
            'waze'
        ];
    }
    
    /**
     * Register waze widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section( 'section_icon', [
            'label' => __( 'Content', 'wpex-elementor-contact-widgets' ),
        ] );
        $this->add_control( 'selected_icon', [
            'label'            => __( 'Icon', 'elementor' ),
            'type'             => \Elementor\Controls_Manager::ICONS,
            'fa4compatibility' => 'icon',
            'default'          => [
            'value'   => 'wpex-icon-waze',
            'library' => 'wpex_icons',
        ],
            'recommended'      => [
            'wpex_icons' => [ 'wpex-icon-waze' ],
            'fa-brands'  => [ 'waze' ],
        ],
        ] );
        $this->add_control( 'view', [
            'label'        => __( 'View', 'wpex-elementor-contact-widgets' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'options'      => [
            'default' => __( 'Default', 'wpex-elementor-contact-widgets' ),
            'stacked' => __( 'Stacked', 'wpex-elementor-contact-widgets' ),
            'framed'  => __( 'Framed', 'wpex-elementor-contact-widgets' ),
        ],
            'default'      => 'default',
            'prefix_class' => 'elementor-view-',
            'conditions'   => [
            'relation' => 'or',
            'terms'    => [ [
            'name'     => 'selected_icon[value]',
            'operator' => '!=',
            'value'    => '',
        ] ],
        ],
        ] );
        $this->add_control( 'shape', [
            'label'        => __( 'Shape', 'wpex-elementor-contact-widgets' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'options'      => [
            'circle' => __( 'Circle', 'wpex-elementor-contact-widgets' ),
            'square' => __( 'Square', 'wpex-elementor-contact-widgets' ),
        ],
            'default'      => 'circle',
            'condition'    => [
            'view!'                 => 'default',
            'selected_icon[value]!' => '',
        ],
            'prefix_class' => 'elementor-shape-',
        ] );
        $this->add_control( 'position', [
            'label'        => __( 'Icon Position', 'wpex-elementor-contact-widgets' ),
            'type'         => \Elementor\Controls_Manager::CHOOSE,
            'default'      => 'top',
            'options'      => [
            'left'  => [
            'title' => __( 'Left', 'wpex-elementor-contact-widgets' ),
            'icon'  => 'fa fa-align-left',
        ],
            'top'   => [
            'title' => __( 'Top', 'wpex-elementor-contact-widgets' ),
            'icon'  => 'fa fa-align-center',
        ],
            'right' => [
            'title' => __( 'Right', 'wpex-elementor-contact-widgetsr' ),
            'icon'  => 'fa fa-align-right',
        ],
        ],
            'prefix_class' => 'elementor-position-',
            'toggle'       => false,
            'conditions'   => [
            'relation' => 'or',
            'terms'    => [ [
            'name'     => 'selected_icon[value]',
            'operator' => '!=',
            'value'    => '',
        ] ],
        ],
        ] );
        $this->add_control( 'show_title', [
            'label'        => __( 'Show Title', 'wpex-elementor-contact-widgets' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'wpex-elementor-contact-widgets' ),
            'label_off'    => __( 'Hide', 'wpex-elementor-contact-widgets' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $this->add_control( 'title_text', [
            'label'       => __( 'Title', 'wpex-elementor-contact-widgets' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'condition'   => [
            'show_title' => 'yes',
        ],
            'default'     => __( 'This is the heading', 'wpex-elementor-contact-widgets' ),
            'placeholder' => __( 'Enter your title', 'wpex-elementor-contact-widgets' ),
            'label_block' => true,
            'dynamic'     => [
            'active' => true,
        ],
        ] );
        $this->add_control( 'title_size', [
            'label'     => __( 'Title HTML Tag', 'wpex-elementor-contact-widgets' ),
            'type'      => \Elementor\Controls_Manager::SELECT,
            'condition' => [
            'show_title' => 'yes',
        ],
            'options'   => [
            'h1'   => 'H1',
            'h2'   => 'H2',
            'h3'   => 'H3',
            'h4'   => 'H4',
            'h5'   => 'H5',
            'h6'   => 'H6',
            'div'  => 'div',
            'span' => 'span',
            'p'    => 'p',
        ],
            'default'   => 'h3',
        ] );
        $this->add_control( 'show_description', [
            'label'        => __( 'Show Description', 'wpex-elementor-contact-widgets' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'wpex-elementor-contact-widgets' ),
            'label_off'    => __( 'Hide', 'wpex-elementor-contact-widgets' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $this->add_control( 'description_text', [
            'label'       => '',
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'condition'   => [
            'show_description' => 'yes',
        ],
            'default'     => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
            'placeholder' => __( 'Enter your description', 'elementor' ),
            'rows'        => 10,
            'separator'   => 'none',
            'show_label'  => false,
            'dynamic'     => [
            'active' => true,
        ],
        ] );
        $this->end_controls_section();
        $this->start_controls_section( 'link_settings', [
            'label' => __( 'Waze Settings', 'wpex-elementor-contact-widgets' ),
        ] );
        $this->add_control( 'full_widget_link', [
            'label'        => __( 'Full Widget Link', 'wpex-elementor-contact-widgets' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'wpex-elementor-contact-widgets' ),
            'label_off'    => __( 'Hide', 'wpex-elementor-contact-widgets' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $waze_waze_add = [
            'label'       => __( 'Your Address', 'wpex-elementor-contact-widgets' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( 'Your Address', 'wpex-elementor-contact-widgets' ),
            'separator'   => 'before',
        ];
        $this->add_control( 'waze_add', $waze_waze_add );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_icon', [
            'label'      => __( 'Icon', 'wpex-elementor-contact-widgets' ),
            'tab'        => \Elementor\Controls_Manager::TAB_STYLE,
            'conditions' => [
            'relation' => 'or',
            'terms'    => [ [
            'name'     => 'selected_icon[value]',
            'operator' => '!=',
            'value'    => '',
        ] ],
        ],
        ] );
        $this->start_controls_tabs( 'icon_colors' );
        $this->start_controls_tab( 'icon_colors_normal', [
            'label' => __( 'Normal', 'wpex-elementor-contact-widgets' ),
        ] );
        $this->add_control( 'primary_color', [
            'label'     => __( 'Primary Color', 'wpex-elementor-contact-widgets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'global'    => [
            'default' => Global_Colors::COLOR_PRIMARY,
        ],
            'default'   => '#485659',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon'                                                    => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'secondary_color', [
            'label'     => __( 'Secondary Color', 'wpex-elementor-contact-widgets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
        ],
        ] );
        $this->end_controls_tab();
        $this->start_controls_tab( 'icon_colors_hover', [
            'label' => __( 'Hover', 'wpex-elementor-contact-widgets' ),
        ] );
        $this->add_control( 'hover_primary_color', [
            'label'     => __( 'Primary Color', 'wpex-elementor-contact-widgets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover'                                                          => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_secondary_color', [
            'label'     => __( 'Secondary Color', 'wpex-elementor-contact-widgets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_animation', [
            'label' => __( 'Hover Animation', 'wpex-elementor-contact-widgets' ),
            'type'  => \Elementor\Controls_Manager::HOVER_ANIMATION,
        ] );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control( 'icon_space', [
            'label'     => __( 'Spacing', 'wpex-elementor-contact-widgets' ),
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'default'   => [
            'size' => 15,
        ],
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}}' => '--icon-box-icon-margin: {{SIZE}}{{UNIT}}',
        ],
        ] );
        $this->add_responsive_control( 'icon_size', [
            'label'     => __( 'Size', 'wpex-elementor-contact-widgets' ),
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 6,
            'max' => 300,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_responsive_control( 'icon_padding', [
            'label'     => esc_html__( 'Padding', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
        ],
            'range'     => [
            'em' => [
            'min' => 0,
            'max' => 5,
        ],
        ],
            'condition' => [
            'view!' => 'default',
        ],
        ] );
        $active_breakpoints = \Elementor\Plugin::$instance->breakpoints->get_active_breakpoints();
        $rotate_device_args = [];
        $rotate_device_settings = [
            'default' => [
            'unit' => 'deg',
            'size' => '',
        ],
        ];
        foreach ( $active_breakpoints as $breakpoint_name => $breakpoint ) {
            $rotate_device_args[$breakpoint_name] = $rotate_device_settings;
        }
        $this->add_responsive_control( 'rotate', [
            'label'       => esc_html__( 'Rotate', 'elementor' ),
            'type'        => \Elementor\Controls_Manager::SLIDER,
            'size_units'  => [ 'deg' ],
            'range'       => [
            'deg' => [
            'min'  => 0,
            'max'  => 360,
            'step' => 1,
        ],
        ],
            'default'     => [
            'unit' => 'deg',
            'size' => '',
        ],
            'device_args' => $rotate_device_args,
            'selectors'   => [
            '{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
        ],
        ] );
        $this->add_responsive_control( 'border_width', [
            'label'     => esc_html__( 'Border Width', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition' => [
            'view' => 'framed',
        ],
        ] );
        $this->add_responsive_control( 'border_radius', [
            'label'      => esc_html__( 'Border Radius', 'elementor' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors'  => [
            '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition'  => [
            'view!' => 'default',
        ],
        ] );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_content', [
            'label' => __( 'Content', 'elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_responsive_control( 'text_align', [
            'label'     => esc_html__( 'Alignment', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::CHOOSE,
            'options'   => [
            'left'    => [
            'title' => esc_html__( 'Left', 'elementor' ),
            'icon'  => 'eicon-text-align-left',
        ],
            'center'  => [
            'title' => esc_html__( 'Center', 'elementor' ),
            'icon'  => 'eicon-text-align-center',
        ],
            'right'   => [
            'title' => esc_html__( 'Right', 'elementor' ),
            'icon'  => 'eicon-text-align-right',
        ],
            'justify' => [
            'title' => esc_html__( 'Justified', 'elementor' ),
            'icon'  => 'eicon-text-align-justify',
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-wrapper' => 'text-align: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'content_vertical_alignment', [
            'label'        => __( 'Vertical Alignment', 'elementor' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'options'      => [
            'top'    => __( 'Top', 'elementor' ),
            'middle' => __( 'Middle', 'elementor' ),
            'bottom' => __( 'Bottom', 'elementor' ),
        ],
            'default'      => 'top',
            'prefix_class' => 'elementor-vertical-align-',
        ] );
        $this->add_control( 'heading_title', [
            'label'     => __( 'Title', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
            'show_title' => 'yes',
        ],
        ] );
        $this->add_responsive_control( 'title_bottom_space', [
            'label'     => __( 'Spacing', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
            'condition' => [
            'show_title' => 'yes',
        ],
        ] );
        $this->add_control( 'title_color', [
            'label'     => esc_html__( 'Color', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-title' => 'color: {{VALUE}};',
        ],
            'global'    => [
            'default' => Global_Colors::COLOR_PRIMARY,
        ],
            'condition' => [
            'show_title' => 'yes',
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'      => 'title_typography',
            'selector'  => '{{WRAPPER}} .elementor-icon-box-title, {{WRAPPER}} .elementor-icon-box-title a',
            'global'    => [
            'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
        ],
            'condition' => [
            'show_title' => 'yes',
        ],
        ] );
        $this->add_group_control( Group_Control_Text_Stroke::get_type(), [
            'name'     => 'text_stroke',
            'selector' => '{{WRAPPER}} .elementor-icon-box-title',
        ] );
        $this->add_group_control( Group_Control_Text_Shadow::get_type(), [
            'name'     => 'title_shadow',
            'selector' => '{{WRAPPER}} .elementor-icon-box-title',
        ] );
        $this->add_control( 'heading_description', [
            'label'     => __( 'Description', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
            'show_description' => 'yes',
        ],
        ] );
        $this->add_control( 'description_color', [
            'label'     => __( 'Color', 'elementor' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description' => 'color: {{VALUE}};',
        ],
            'global'    => [
            'default' => Global_Colors::COLOR_TEXT,
        ],
            'condition' => [
            'show_description' => 'yes',
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'description_typography',
            'selector' => '{{WRAPPER}} .elementor-icon-box-description',
            'global'   => [
            'default' => Global_Typography::TYPOGRAPHY_TEXT,
        ],
        ] );
        $this->add_group_control( Group_Control_Text_Shadow::get_type(), [
            'name'      => 'description_shadow',
            'selector'  => '{{WRAPPER}} .elementor-icon-box-description',
            'condition' => [
            'show_description' => 'yes',
        ],
        ] );
        $this->end_controls_section();
    }
    
    /**
     *Build link
     *
     */
    private function build_waze_link( $settings )
    {
        $link = 'https://waze.com/ul?';
        $build_parts = [
            'q'        => $settings['waze_add'],
            'z'        => 10,
            'navigate' => 'yes',
        ];
        return add_query_arg( $build_parts, $link );
    }
    
    /**
     * Render phone widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'icon', 'class', [ 'elementor-icon', 'elementor-animation-' . $settings['hover_animation'] ] );
        $icon_tag = 'span';
        if ( !isset( $settings['icon'] ) && !\Elementor\Icons_Manager::is_migration_allowed() ) {
            // add old default
            $settings['icon'] = 'wpex-icon-waze';
        }
        $has_icon = !empty($settings['icon']);
        
        if ( !empty($settings['link']['url']) ) {
            $icon_tag = 'a';
            $this->add_link_attributes( 'link', $settings['link'] );
        }
        
        $value = $this->build_waze_link( $settings );
        $has_svg = !empty($settings['selected_icon']);
        $has_title = !empty($settings['title_text']);
        $has_description = !empty($settings['description_text']);
        $has_full_link = !empty($settings['full_widget_link']);
        $has_link = !empty($value);
        
        if ( $has_icon ) {
            $this->add_render_attribute( 'i', 'class', $settings['icon'] );
            $this->add_render_attribute( 'i', 'aria-hidden', 'true' );
        }
        
        $this->add_render_attribute( 'description_text', 'class', 'elementor-icon-box-description' );
        $this->add_inline_editing_attributes( 'title_text', 'none' );
        $this->add_inline_editing_attributes( 'description_text' );
        if ( !$has_icon && !empty($settings['selected_icon']['value']) ) {
            $has_icon = true;
        }
        $migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
        $is_new = !isset( $settings['icon'] ) && \Elementor\Icons_Manager::is_migration_allowed();
        ?>
        <?php 
        
        if ( !empty($has_full_link) && !empty($has_link) ) {
            ?>
	<a href="<?php 
            echo  esc_url( $value ) ;
            ?>"> <?php 
        }
        
        ?>
		
        <div class="elementor-icon-box-wrapper">
			<div class="elementor-icon-box-icon"><?php 
        
        if ( !$has_full_link && !empty($has_link) ) {
            ?>
	<a href="<?php 
            echo  esc_url( $value ) ;
            ?>"> <?php 
        }
        
        ?>
				<<?php 
        \Elementor\Utils::print_validated_html_tag( $icon_tag );
        ?> <?php 
        $this->print_render_attribute_string( 'icon' );
        ?> <?php 
        $this->print_render_attribute_string( 'link' );
        ?>>
				<?php 
        
        if ( $is_new || $migrated ) {
            \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [
                'aria-hidden' => 'true',
            ] );
        } elseif ( !empty($settings['icon']) ) {
            ?><i <?php 
            $this->print_render_attribute_string( 'i' );
            ?>></i><?php 
        }
        
        ?>
				</<?php 
        \Elementor\Utils::print_validated_html_tag( $icon_tag );
        ?>>
			<?php 
        if ( !$has_full_link && !empty($has_link) ) {
            ?></a> <?php 
        }
        ?>
            </div>
			<?php 
        // endif;
        ?>


			<div class="elementor-icon-box-content">
			<?php 
        
        if ( $has_title ) {
            ?>  <?php 
            
            if ( !$has_full_link && !empty($has_link) ) {
                ?>
	<a href="<?php 
                echo  esc_url( $value ) ;
                ?>"> <?php 
            }
            
            ?>
				<<?php 
            echo  esc_html( $settings['title_size'] ) ;
            ?> class="elementor-icon-box-title">
					<<?php 
            echo  esc_html( implode( ' ', [ $icon_tag ] ) ) ;
            echo  esc_html( $this->get_render_attribute_string( 'title_text' ) ) ;
            ?>><?php 
            echo  esc_html( $settings['title_text'] ) ;
            ?></<?php 
            echo  esc_html( $icon_tag ) ;
            ?>>
				</<?php 
            echo  esc_html( $settings['title_size'] ) ;
            ?>><?php 
        }
        
        if ( !$has_full_link && !empty($has_link) ) {
            ?></a> <?php 
        }
        ?>
                <?php 
        
        if ( $has_description ) {
            ?>
								<p <?php 
            echo  esc_attr( $this->get_render_attribute_string( 'description_text' ) ) ;
            ?>><?php 
            echo  esc_html( $settings['description_text'] ) ;
            ?></p>
                <?php 
        }
        
        ?>
			</div>

		</div>  <?php 
        if ( $has_full_link ) {
            ?></a> <?php 
        }
        ?>
		<?php 
    }
    
    /**
     * Render icon box widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _content_template()
    {
        ?>
		<#
		var link = settings.link.url ? 'href="sms:' + settings.link.url + '"' : '',
			iconTag = link ? 'a' : 'span';

		view.addRenderAttribute( 'description_text', 'class', 'elementor-icon-box-description' );

		view.addInlineEditingAttributes( 'title_text', 'none' );
		view.addInlineEditingAttributes( 'description_text' );
		#>
		<div class="elementor-icon-box-wrapper">
        <# if (settings.image ){
        	if ( settings.image.url ) {
			var image = {
				id: settings.image.id,
				url: settings.image.url,
				size: settings.thumbnail_size,
				dimension: settings.thumbnail_custom_dimension,
				model: view.getEditModel()
			};

			var image_url = elementor.imagesManager.getImageUrl( image );

			var imageHtml = '<img src="' + image_url + '" class="elementor-animation-' + settings.hover_animation + '" />';

			if ( settings.link.url ) {
				imageHtml = '<a href="' + settings.link.url + '">' + imageHtml + '</a>';
			}

			html += '<figure class="elementor-image-box-img">' + imageHtml + '</figure>';
		}
			<# if ( settings.icon ) { #>
			<div class="elementor-icon-box-icon">

				<{{{ iconTag + ' ' + link }}} class="elementor-icon elementor-animation-{{ settings.hover_animation }}">
				<i class="{{ settings.icon }}" aria-hidden="true"></i>
			</{{{ iconTag }}}>
		</div>
			<# } #>
			<div class="elementor-icon-box-content">
				<{{{ settings.title_size }}} class="elementor-icon-box-title">
					<{{{ iconTag + ' ' + link }}} {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text }}}</{{{ iconTag }}}>
				</{{{ settings.title_size }}}>
				<p {{{ view.getRenderAttributeString( 'description_text' ) }}}>{{{ settings.description_text }}}</p>
			</div>
		</div>
		<?php 
    }

}