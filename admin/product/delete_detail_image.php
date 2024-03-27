<?php
if (isset($_POST['colorNameId'])) {
    $colorNameId = $_POST['colorNameId'];
    $product_id = $_POST['productId'];
    $image_result = select_images_by_color_name_id($colorNameId);
    foreach ($image_result as $key => $value) {
        $file_name = '../..du_an1' . $value['image_url'];
        if (file_exists($file_name)) {
            unlink('../..du_an1' . $value['image_url']);
        }
    }
    delete_images_by_color_name_id($colorNameId);
}