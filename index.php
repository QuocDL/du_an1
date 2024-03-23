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
  default:
    echo "Không có gì";
    break;
}

// require "./includes/footer2.php";
