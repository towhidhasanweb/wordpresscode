<?php
/**
 * Plugin Name: My QR Code
 * Description: Create QR code on the page.
 * Version: 1.0.0
 * Author: Towhid Hasan
 * Author URI: https://web-towhid.com
 * PLugin URI: https://web-towhid.com
 */

 class My_qr_code{
  public function __construct(){
    add_action('init', array($this, 'init'));
  }
  public function init(){
    add_filter('the_content', array($this, 'add_qr_code'));
  }
  public function add_qr_code($content){
    $current_link = get_permalink();
    $title = get_the_title();
    $custom_content = '<div style="border: 1px solid #ddd; padding: 10px;">';
    $custom_content .= "<img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$current_link}' alt={$title} />";
    $custom_content .= '</div>';
    $content .= $custom_content;
    return $content;
  }
 }
 new My_qr_code();