<?php
session_start();
require "../global.php";
require "..$MODEL_URL/pdo.php";
require "..$MODEL_URL/product.php";
require "..$MODEL_URL/banner.php";
require "../$MODEL_URL/category.php";
require "../$MODEL_URL/taikhoan.php";
require "../$MODEL_URL/comment.php";
require "../$MODEL_URL/orders.php";

if (isset($_SESSION['username']) && ($_SESSION['username']['role'] == 1)) {
    $act = isset($_GET['act']) ? $_GET['act'] : 'index';
    switch ($act) {
        case 'index':
            require "./view/main.php";
            break;
            // ---------------Xử lí Banner-------------------    
      
          
       

            //--------------------------PHẦN TÀI KHOẢN-----------------------------------------
            // DANH SÁCH TÀI KHOẢN
        case 'user':
            $listtaikhoan = loadall_taikhoan();
            // echo $listtaikhoan; die;
            include "./user/list.php";
            break;


            // XÓA TÀI KHOẢN
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "./user/list.php";
            break;
            // SỬA TÀI KHOẢN
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tk = loadone_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "./user/update.php";
            break;
            // UPDATE TÀI KHOẢN
        case 'updatetk':
            if (isset($_POST['id']) && ($_POST['id'] > 0)) {
                $id = $_POST['id'];
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];

                $listsanpham = update_taikhoan($id, $full_name, $username, $password, $email, $address, $phone, $role,);
                $thongbao = "Cập nhật thành công";
            }
            $listtaikhoan = loadall_taikhoan();
            include "./user/list.php";
            break;
            case 'check-phantrang':
                require "./admin/check-phantrang.php";
                break;
        
        default:
            echo "Không có gì ";
            echo "admin";
            break;
    }
} else {
    require "./404not.php";
}