<?php
if (isset($_POST['orderId'])) {
    $status_id = $_POST['orderStatus'];
    $order_id = $_POST['orderId'];
    orders_update($status_id,$order_id);
    $order_product_result = select_all_order_product_by_id($order_id);
    foreach ($order_product_result as $key => $value) {
        add_purchased_orders(
            $value['customer_id'],
            $value['product_id'],
            $value['size_id'],
            $value['color_name_id'],
            $value['quantity'],
            $value['created_at'],
            $value['completed_at'],
            $value['receiver_email'],
            $value['receiver_number_phone'],
            $value['total_price']
        );
    }
    echo 0;
}
