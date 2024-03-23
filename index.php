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
  // echo $action;
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



  // Bổ sung product DETAIL và chức năng add vào cart
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
  default:
    echo 'Đang làm thêm trang 404';
    break;
}

