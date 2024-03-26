<?php
if (isset($_POST['orderId'])) {
    $order_id = $_POST['orderId'];
    $order_product_result = select_all_order_product_by_id($order_id);
    foreach ($order_product_result as $key => $value) {
        if ($value['status_id'] == 1) {
            quantity_update($value['quantity'], $value['product_id'], $value['color_name_id'], $value['size_id']);
        }
    }
    $total_price = 0;
    $orders_result = select_order_by_id($order_id);
    if ($orders_result['status_id'] == 1) {
        foreach ($order_product_result as $key => $value) {
            $now = date('Y-m-d H:i:s');
            add_purchased_orders(
                $value['customer_id'],
                $value['product_id'],
                $value['size_id'],
                $value['color_name_id'],
                $value['quantity'],
                $value['created_at'],
                $now,
                $value['receiver_email'],
                $value['receiver_number_phone'],
                $total_price
            );
        }
        delete_order_product_by_order_id($order_id);
        delete_orders_by_order_id($order_id);
    } else {
        echo 0;
    }
}
