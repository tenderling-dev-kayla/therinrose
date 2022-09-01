<?php 
/**
 * 
 * Admin Dashboard Fields
 * 
 **/

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_62e96405e61f7',
    'title' => 'Tenderling Dashboard',
    'fields' => array(
        array(
            'key' => 'field_62e9641483202',
            'label' => 'Admin Style',
            'name' => 'admin_style',
            'type' => 'button_group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'wp' => 'Wordpress',
                'tenderling' => 'Tenderling',
            ),
            'allow_null' => 0,
            'default_value' => 'tenderling',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),
        array(
            'key' => 'field_62e98f594000c',
            'label' => 'User Profile Style',
            'name' => 'user_style',
            'type' => 'button_group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'wp' => 'Wordpress',
                'tenderling' => 'Tenderling',
            ),
            'allow_null' => 0,
            'default_value' => 'tenderling',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'user_role',
                'operator' => '==',
                'value' => 'administrator',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));

endif;      