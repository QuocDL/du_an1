<?php
session_start();
ob_start();
require "./global.php";
require ".$MODEL_URL/pdo.php";
require ".$MODEL_URL/product.php";
require ".$MODEL_URL/banner.php";
require ".$MODEL_URL/comment.php";

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
// echo $action;
switch ($action) {
  case 'index';
    require ".$VIEW_URL/main.php";
    break;
    // ----------San Pham---------------
  case 'male-fashion':
    require ".$VIEW_URL/male-fashion.php";
    break;
  case 'product_detail':
    require ".$VIEW_URL/product_detail.php";
    break;
  case 'female-fashion':
    require ".$VIEW_URL/female-fashion.php";
    break;
  case 'news-fashion':
    require ".$VIEW_URL/news-fashion.php";
    break;



  // Bổ sung product DETAIL và CART
  case 'check-quanity':
    require ".$CONTROLLER_URL/check_product_quantity.php";
    break;
  case 'add_to_cart':
    require ".$CONTROLLER_URL/add_to_cart.php";
    break;
   case 'product_add_quantity_to_cart':
    require ".$CONTROLLER_URL/product_add_quantity_to_cart.php";
    break;
  case 'get_product_info':
    require ".$CONTROLLER_URL/get_product_info.php";
    break;



     // ------------Bộ lọc----------
  case 'ao_new':
    require ".$VIEW_URL/boloc/ao-new.php";
    break;
  case 'vay_new':
    require ".$VIEW_URL/boloc/vay-new.php";
    break;
  case 'quan_new':
    require ".$VIEW_URL/boloc/quan-new.php";
    break;
  case 'ao_sale':
    require ".$VIEW_URL/boloc/ao-sale.php";
    break;
  case 'vay_sale':
    require ".$VIEW_URL/boloc/vay-sale.php";
    break;
  case 'quan_sale':
    require ".$VIEW_URL/boloc/quan-sale.php";
    break;
  case 'aosomi':
    require ".$VIEW_URL/boloc/ao-so-mi.php";
    break;
  case 'aothun':
    require ".$VIEW_URL/boloc/ao-thun.php";
    break;
  case 'hoodie':
    require ".$VIEW_URL/boloc/hoodie.php";
    break;
  case 'quannam':
    require ".$VIEW_URL/boloc/quannam.php";
    break;
  case 'aonam':
    require ".$VIEW_URL/boloc/ao-nam.php";
    break;
  case 'polo':
    require ".$VIEW_URL/boloc/polo.php";
    break;
  case 'aonu':
    require ".$VIEW_URL/boloc/ao-nu.php";
    break;
  case 'quannu':
    require ".$VIEW_URL/boloc/quan-nu.php";
    break;
  case 'vaynu':
    require ".$VIEW_URL/boloc/vay-nu.php";
    break;
  case 'price_filter':
    require ".$VIEW_URL/boloc/loc-giatien-all.php";
    break;
  case 'price_filter_new':
    require ".$VIEW_URL/boloc/loc-giatien-new.php";
    break;
  case 'price_filter_sale':
    require ".$VIEW_URL/boloc/loc-giatien-sale.php";
    break;
  case 'price_filter_nam':
    require ".$VIEW_URL/boloc/loc-giatien-nam.php";
    break;
  case 'price_filter_nu':
    require ".$VIEW_URL/boloc/loc-giatien-nu.php";
    break;
  case 'size_filter':
    require ".$VIEW_URL/boloc/loc-size-all.php";
    break;
  case 'size_filter_sale':
    require ".$VIEW_URL/boloc/loc-size-sale.php";
    break;
  case 'size_filter_new':
    require ".$VIEW_URL/boloc/loc-size-new.php";
    break;
  case 'size_filter_nam':
    require ".$VIEW_URL/boloc/loc-size-nam.php";
    break;
  case 'size_filter_nu':
    require ".$VIEW_URL/boloc/loc-size-nu.php";
    break;
  case 'color_filter_nam':
    require ".$VIEW_URL/boloc/mau-sac-nam.php";
    break;
  case 'color_filter_nu':
    require ".$VIEW_URL/boloc/mau-sac-nu.php";
    break;
  case 'color_filter':
    require ".$VIEW_URL/boloc/mau-sac-all.php";
    break;
  case 'color_filter_new':
    require ".$VIEW_URL/boloc/mau-sac-new.php";
    break;
  case 'color_filter_sale':
    require ".$VIEW_URL/boloc/mau-sac-sale.php";
    break;
  default:
    echo "Không có gì";
    break;
}

// require "./includes/footer2.php";
