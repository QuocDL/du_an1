<?php
session_start();
ob_start();
require "./global.php";
require ".$MODEL_URL/pdo.php";
require ".$MODEL_URL/banner.php";
require ".$MODEL_URL/product.php";
$action = isset($_GET['action']) ? $_GET['action'] : 'homepage';
echo $action;
switch ($action) {
  case 'homepage':
    require ".$VIEW_URL/main.php";
    break;
  case 'male-fashion':
    require ".$VIEW_URL/male-fashion.php";
    break;
      case 'female-fashion':
    require ".$VIEW_URL/female-fashion.php";
    break;
}