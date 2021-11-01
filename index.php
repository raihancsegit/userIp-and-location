<?php
/**
* Plugin Name: User IP And Location
* Plugin URI: 
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Raihan Islam
* Author URI: http://raihan.com/
**/


function userip_location_func($atts){
    $a = shortcode_atts(array(
            "country" => "",
            "city"   => ""
    ),$atts);

    $ip = wp_remote_get("http://ip-api.com/json/");
    $ip_data = wp_remote_retrieve_body($ip);
    $decodeData = json_decode($ip_data);

   // print_r($decodeData);

    $result = '';
    if($a['country']){
        $result = $decodeData->country;
    }
    if($a['city']){
        $result = $decodeData->city;
    }

    return "<span>".$result."</span>";
}
add_shortcode('userip_location','userip_location_func');