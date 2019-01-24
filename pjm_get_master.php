<?php

/*
Plugin Name: Get Master
Plugin URI: http://pjeremymalouf.com
Description: For setting get data to pick up and save to a get.
Author: Paul Jeremy Malouf
Version: 1.0
Author URI: http://pjeremymalouf.com
*/

function pjm_get_master_install()
{
    add_option('pjm_get_master_find_1');
    add_option('pjm_get_master_replace_1');
    add_option('pjm_get_master_fallback_1');
    add_option('pjm_get_master_find_2');
    add_option('pjm_get_master_replace_2');
    add_option('pjm_get_master_fallback_2');
    add_option('pjm_get_master_find_3');
    add_option('pjm_get_master_replace_3');
    add_option('pjm_get_master_fallback_3');
}

add_action('activate_pjm_get_master/pjm_get_master.php', 'pjm_get_master_install');

function pjm_get_master_filter($content)
{
	for($i = 0; $i < 3; $i++){
	
        $find_option = "pjm_get_master_find_" . $i;

        $find_optionValue = get_option($find_option);
        
        $replace_option = "pjm_get_master_replace_" . $i;

        $replace_optionValue = get_option($replace_option);
        
        if (isset($_POST[$find_optionValue])){
            
            $content = str_replace($replace_optionValue, $_POST[$find_optionValue], $content);
        
        }else if (isset($_GET[$find_optionValue])){
            
            $content = str_replace($replace_optionValue, $_GET[$find_optionValue], $content);
            
        }else{
            
            $fallback_option = "pjm_get_master_fallback_" . $i;
            
             $content = str_replace($replace_optionValue, get_option($fallback_option), $content);
        }
    }
    
    return $content;
}
add_filter('emodal_modal_content', 'pjm_get_master_filter');

add_filter('the_content', 'pjm_get_master_filter');

add_filter('pjm_lformm_form', 'pjm_get_master_filter');

function get_master_menu()
{
    global $wpdb;
    include 'pjm_get_master-admin.php';
}
 
function pjm_get_master_admin_actions()
{
    add_options_page("Get Master", "Get Master", 1,
"Get-Master", "get_master_menu");
}
 
add_action('admin_menu', 'pjm_get_master_admin_actions');


?>
