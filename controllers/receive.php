<?php
if (isset($_POST['orderId'])) {
    $order_id = $_POST['orderId'];
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
    delete_order_product_by_order_id($order_id);
    delete_orders_by_order_id($order_id);
    echo 0;
}
