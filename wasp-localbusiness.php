<?php
/*
Plugin Name: WASP Local Business
Plugin URI: http://webb.tj/
Description: Use the WASP stack to populate your LocalBusiness schema.org markup
Version: 0.1
Author: TJ Webb
Author URI: http://webb.tj/
License: GPL
Copyright: TJ Webb
*/

require_once('acf.php');
add_action('init', 'wasp_localbusiness_acf');
add_action('wp_head', array('WASP_LocalBusiness', 'output') );

class WASP_LocalBusiness{

    public static function output(){
        if(!function_exists('smarty_get_instance'))
            return;
        if(!is_home() && !is_front_page())
            return;

        $smarty = smarty_get_instance();

        $smarty->assign('Y', date('Y'));
        $smarty  ->setTemplateDir(dirname(__FILE__) . '/templates')
                    ->setCompileDir(get_template_directory() . '/templates_c');
        $smarty->auto_literal = true;

        $address_1 = get_field('wasp_lb_address_1', 'options');
        $address_2 = get_field('wasp_lb_address_2', 'options');
        $street_address = implode(', ', array($address_1, $address_2));

        $smarty->assign('address_1',         $address_1                                     );
        $smarty->assign('address_2',         $address_2                                     );
        $smarty->assign('street_address',    $street_address                                );
        $smarty->assign('city',              get_field('wasp_lb_city',            'options'));
        $smarty->assign('province',          get_field('wasp_lb_province',        'options'));
        $smarty->assign('postal_code',       get_field('wasp_lb_postal_code',     'options'));
        $smarty->assign('country',           get_field('wasp_lb_country',         'options'));
        $smarty->assign('toll_free_phone',   get_field('wasp_lb_toll_free_phone', 'options'));
        $smarty->assign('local_phone',       get_field('wasp_lb_local_phone',     'options'));
        $smarty->assign('fax',               get_field('wasp_lb_fax',             'options'));
        $smarty->assign('connect_sites',     get_field('wasp_lb_connect_sites',   'options'));
        $smarty->assign('type',              get_field('wasp_lb_type',            'options'));
        $smarty->assign('hours',             get_field('wasp_lb_hours',           'options'));
        $smarty->assign('latitude',          get_field('wasp_lb_latitude',        'options'));
        $smarty->assign('longitude',         get_field('wasp_lb_longitude',       'options'));
        $smarty->assign('map_url',           get_field('wasp_lb_map_url',         'options'));
        $smarty->assign('logo',              get_field('wasp_lb_logo',            'options'));
        $smarty->assign('image',             get_field('wasp_lb_image',           'options'));

        $smarty->assign('url',               get_site_url()                                 );
        $smarty->assign('name',              get_bloginfo('name')                           );
        $smarty->assign('description',       get_bloginfo('description')                    );

        $smarty->display('local_business.tpl');
    }

}