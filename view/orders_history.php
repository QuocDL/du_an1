<?php require "./includes/header.php" ?>
<div id="register-modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="close-button" class="close">&times;</span>
        <h2>Đăng ký</h2>
        <?php
        if (isset($_GET['error'])) {
            echo $_GET['error'];
        }
        ?>
        <form action="../../du_an1/view/progess-signup.php" method="POST" id="register-form">
            <div class="form-group">
                <label for="full_name">Full Name*</label>
                <input type="text" name="full_name" id="full_name" plac eholder="Full name" required />
            </div>
            <div class="form-group">
                <label for="username">UserName*</label>
                <input type="text" name="username" id="full_name" placeholder="Username" required />
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" placeholder="Your email" required />
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" name="password" id="password" placeholder="Enter a password" required />
            </div>
            <div class="form-group">
                <label for="address">Address *</label>
                <input type="text" name="address" id="address" placeholder="Your address" required />
            </div>
            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text" name="phone" id="phone" placeholder="Your phone" required />
            </div>

            <button type="submit" class="buttonregister" name="dangky">Đăng ký</button>
        </form>
    </div>
</div>
<div id="quen-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close_quen">&times;</span>
        <h2>Quên mật khẩu</h2>
        <form id="forgotPasswordForm" method="post" action="index.php?action=quenmk">
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" placeholder="Your email" required />
            </div>
            <button type="submit" class="buttonregister" name="btnsubmit">Gửi</button>
        </form>
    </div>
</div>
<!-- ĐĂNG NHẬP -->

<div id="my-modal" class="modal1">
    <div class="modal-content">
        <span class="sign-in-close">&times;</span>
        <h2 style="text-align: center">Đăng nhập</h2>
        <form action="../../du_an1/view/progess-login.php" method="POST">
            <div class="form-group">
                <label for="username">Tài khoản:</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password3" name="password" required />
                <a href=""><span class="quenmk">Quên mật khẩu?</span></a>
            </div>
            <br />
            <button type="submit" class="buttonregister" name="login" id="submit-btn">
                Đăng nhập <style></style>
            </button>

            <br />

        </form>
        <p id="message"></p>
    </div>
</div>
<!--  favoriteProduct-->
<?php require ".$INCLUDES_URL/favorite_product.php" ?>
<!-- end -->
<?php require ".$INCLUDES_URL/cart_modal.php" ?>

<?php require ".$INCLUDES_URL/delete_cart_confirm.php" ?>

<?php require ".$INCLUDES_URL/header_nav.php" ?>
<ul class="breadcrumbs">
    <li>Trang chủ /</li>
    <li>Chi tiết đơn hàng</li>
</ul>
<?php if (!empty($_SESSION['anonymous_customer'])) : ?>
    <?php //var_dump($_SESSION['anonymous_customer']); 
    ?>
    <div class="wrapper">
        <div class="order_body">
            <h3>THÔNG TIN LỊCH SỬ SẢN PHẨM MUA HÀNG</h3>
            <?php
            $receiver_email = $_SESSION['anonymous_customer']['receiver_email'];
            $receiver_number_phone = $_SESSION['anonymous_customer']['receiver_number_phone'];
            $order_result = select_all_order_product_by_email_and_phone_number($receiver_email, $receiver_number_phone);
            echo $order_result
            ?>
            <?php if (!empty($order_result)) : ?>
                <div class="show_orders">
                    <div class="orders_product">
                        <?php foreach ($order_result as $key => $value) : ?>
                            <?php $color_result = select_color_name_by_id($value['color_name_id']); ?>
                            <div class="favoriteProduct-info order">
                                <a href="/du_an1/product_detail&product_id=<?= $value['product_id'] ?>" class="favoriteProduct-img">
                                    <div class="favoriteProduct-img-first" style="width: 104px;">
                                        <img src="..<?= $ROOT_URL . $color_result['color_image'] ?>" alt="" />
                                    </div>
                                </a>
                                <div class="favoriteProduct-details" style="width: 100%;">
                                    <a href="/du_an1/product_detail&product_id=<?= $value['product_id'] ?>" class="favoriteProduct-link"><?= $value['product_name'] ?></a>
                                    <div class="favoriteProduct-option">
                                        <div class="favoriteProduct-choose">
                                            <div class="favoriteProduct-choose-color cart">
                                                MÀU:
                                                <span>
                                                    <?= $color_result['color_name'] ?>
                                                </span>
                                            </div>
                                            <div class="favoriteProduct-choose-size">
                                                SIZE:
                                                <?php $get_size = select_size_by_id($value['size_id']); ?>
                                                <span><?= $get_size['size_name'] ?></span>
                                            </div>
                                        </div>
                                        <div class="order_detail_quantity">
                                            <span style="margin-right:4px">Số lượng</span>
                                            <strong><?= $value['quantity'] ?></strong>
                                        </div>
                                    </div>
                                    <a href="/du_an1/product_detail&product_id=<?= $value['product_id'] ?>" class="btn_view_product">
                                        <button type="button" class="view_product">Xem Sản Phẩm</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="orders_detail">
                        <?php $total_quantity = 0;
                        $status_id = 0;
                        ?>
                        <div class="bill_container">
                            <?php $order_result_by_id = select_orders_by_email_and_phone_number($receiver_email, $receiver_number_phone)  ?>
                            <?php foreach ($order_result_by_id as $key => $value) : ?>
                                <?php $quantity_result = select_quantity_order_product($value['order_id']);
                                ?>
                                <div class="bill_container_detail">
                                    <?php //$total_quantity += $value['quantity'];
                                    $status_id = $value['status_id'];
                                    ?>
                                    <span class="receiver_name"> Người Nhận: <?= $value['receiver_name']; ?></span>
                                    <span class="receiver_address">Địa chỉ: <?= $value['receiver_address']; ?></span>
                                    <?php $product_name_result = select_product_order_product($value['order_id']); ?>
                                    <span style="margin: 8px 0;display: block;">Sản Phẩm: </span>
                                    <?php foreach ($product_name_result as $key => $product) : ?>
                                        <span class="product_name"><?= $product['product_name'] ?> </span>
                                    <?php endforeach ?>
                                    <span class="product_total__quantity">Tổng số lượng: <span><?= $quantity_result ?></span></span>
                                    <span class="payment_methods">Phương thức thanh toán: <span class="payment_method">
                                            <?php if ($value['pay_methods'] == 1) {
                                                echo "Thanh toán khi nhận hàng";
                                            } else if ($value['pay_methods'] == 2) {
                                                echo "Thanh toán Bằng cách chuyển khoản";
                                            } else {
                                                echo "Thanh toán online";
                                            }
                                            ?>
                                        </span>
                                    </span>
                                    <div class="bill_status_and_total_price">
                                        <span class="product_total__price">Tổng tiền: <strong><?= formatMoney($value['total_price']); ?></strong></span>
                                        <div class="bill_status">
                                            <?php $status_result = select_status_by_id($status_id); ?>
                                            Trạng thái:
                                            <span class="status_name" status="<?= $status_id ?>" style="color: <?= $status_id == 1 || $status_id == 6 ? "#e03033;" : "#26820b;"; ?>"> <?= $status_result['status'] ?></span>
                                        </div>
                                    </div>
                                    <?php if ($status_id == 1) : ?>
                                        <button type="button" order_id="<?= $value['order_id'] ?>" class="cancel_order">Hủy đơn hàng</button>
                                    <?php endif ?>
                                    <?php if ($status_id == 3 || $status_id == 4 || $status_id == 5) : ?>
                                        <button type="button" order_id="<?= $value['order_id'] ?>" class="receive">Đã nhận được hàng</button>
                                    <?php endif ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="empty_product__notifi">
                    Bạn chưa có đơn hàng nào
                </div>
            <?php endif ?>
        </div>
    </div>
<?php elseif (isset($_SESSION['username'])) : ?>
    <?php //var_dump($_SESSION['username']); 
    ?>
    <div class="wrapper">
        <div class="order_body">
            <h3>THÔNG TIN LỊCH SỬ ĐƠN HÀNG</h3>
            <?php
            $receiver_email = $_SESSION['username']['email'];
            $receiver_number_phone = $_SESSION['username']['phone'];
            $order_result = select_order_purchased($receiver_email, $receiver_number_phone);
            ?>
            <?php if (!empty($order_result)) : ?>
                <div class="show_orders">
                    <div class="orders_product">
                        <?php foreach ($order_result as $key => $value) : ?>
                            <?php $color_result = select_color_name_by_id($value['color_name_id']); ?>
                            <div class="favoriteProduct-info order">
                                <a href="/du_an1/product_detail&product_id=<?= $value['product_id'] ?>" class="favoriteProduct-img">
                                    <div class="favoriteProduct-img-first" style="width: 104px;">
                                        <img src="..<?= $ROOT_URL . $color_result['color_image'] ?>" alt="" />
                                    </div>
                                </a>
                                <div class="favoriteProduct-details" style="width: 100%;">
                                    <a href="/du_an1/product_detail&product_id=<?= $value['product_id'] ?>" class="favoriteProduct-link"><?= $value['product_name'] ?></a>
                                    <div class="favoriteProduct-option">
                                        <div class="favoriteProduct-choose">
                                            <div class="favoriteProduct-choose-color cart">
                                                MÀU:
                                                <span>
                                                    <?= $color_result['color_name'] ?>
                                                </span>
                                            </div>
                                            <div class="favoriteProduct-choose-size">
                                                SIZE:
                                                <?php $get_size = select_size_by_id($value['size_id']); ?>
                                                <span><?= $get_size['size_name'] ?></span>
                                            </div>
                                        </div>
                                        <div class="order_detail_quantity">
                                            <span style="margin-right:4px">Số lượng</span>
                                            <strong><?= $value['quantity'] ?></strong>
                                        </div>
                                    </div>
                                    <a href="/du_an1/product_detail&product_id=<?= $value['product_id'] ?>" class="btn_view_product">
                                        <button type="button" class="view_product">Xem Sản Phẩm</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="orders_detail">
                        <?php $total_quantity = 0;
                        $status_id = 0;
                        ?>
                        <div class="bill_container">
                            <?php $order_result_by_id = select_orders_by_email_and_phone_number($receiver_email, $receiver_number_phone)  ?>
                            <?php foreach ($order_result_by_id as $key => $value) : ?>
                                <?php $quantity_result = select_quantity_order_product($value['order_id']);
                                ?>
                                <div class="bill_container_detail">
                                    <?php //$total_quantity += $value['quantity'];
                                    $status_id = $value['status_id'];
                                    ?>
                                    <span class="receiver_name"> Người Nhận: <?= $value['receiver_name']; ?></span>
                                    <span class="receiver_address">Địa chỉ: <?= $value['receiver_address']; ?></span>
                                    <?php $product_name_result = select_product_order_product($value['order_id']); ?>
                                    <span style="margin: 8px 0;display: block;">Sản Phẩm: </span>
                                    <?php foreach ($product_name_result as $key => $product) : ?>
                                        <div class="product_info">
                                            <span class="product_name"><?= $product['product_name'] ?> </span>
                                            <div style="margin-top:8px;">
                                                <?php $color_result = select_color_name_by_id($product['color_name_id']); ?>
                                                <?php $size_result = select_size_by_id($product['size_id']); ?>
                                                <span class="size_name">MÀU: <?= $color_result['color_name']; ?></span>
                                                <span class="color_name">SIZE: <?= $size_result['size_name'] ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <span class="product_total__quantity">Tổng số lượng: <span><?= $quantity_result ?></span></span>
                                    <span class="payment_methods">Phương thức thanh toán: <span class="payment_method">
                                            <?php if ($value['pay_methods'] == 1) {
                                                echo "Thanh toán khi nhận hàng";
                                            } else {
                                                echo "Thanh toán MOMO";
                                            }
                                            ?>
                                        </span>
                                    </span>
                                    <div class="bill_status_and_total_price">
                                        <span class="product_total__price">Tổng tiền: <strong><?= formatMoney($value['total_price']); ?></strong></span>
                                        <div class="bill_status">
                                            <?php $status_result = select_status_by_id($status_id); ?>

                                            Trạng thái:
                                            <span class="status_name" status="<?= $status_id ?>" style="color: <?= $status_id == 1 || $status_id == 6 ? "#e03033;" : "#26820b;"; ?>"> <?= $status_result['status'] ?></span>
                                        </div>
                                    </div>
                                    <?php if ($status_id == 1) : ?>
                                        <button type="button" order_id="<?= $value['order_id'] ?>" class="cancel_order">Hủy đơn hàng</button>
                                    <?php endif ?>
                                    <?php if ($status_id == 3 || $status_id == 4 || $status_id == 5) : ?>
                                        <button type="button" order_id="<?= $value['order_id'] ?>" class="receive">Đã nhận được hàng</button>
                                    <?php endif ?>

                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="empty_product__notifi">
                Bạn chưa có đơn hàng nào

                </div>
            <?php endif ?>
        </div>
    </div>

<?php else : ?>
    <div class="empty_session">
        <span class="<?= isset($_COOKIE['notification']) ? "noti-success" : "" ?> ">
            <?= $notification = isset($_COOKIE['notification']) ? $_COOKIE['notification'] : ""; ?>
        </span>
        <div class="empty_notifi">
            Đăng nhập hoặc nhập email và số điện thoại để hiển thị lịch sử đơn hàng
        </div>

        <div style="display: flex;justify-content: center;margin-top:18px">
            <button type="button" id="getCustomerInfo" style="cursor: pointer;display:block;">Nhập email và số điện thoại</button>
        </div>
        <div class="get_anomyous_customer_info" style="width: 400px;margin: 0 auto;border: 1px solid #dedede;padding: 16px;display: none;margin-top: 12px;">
            <form action="/du_an1/get_anomyous_customer_info" method="post">
                <label for="receiver_email">Email:</label> <br>
                <input type="email" name="receiver_email" id="receiver_email" required style="display: block;width: 100%;padding: 10px;margin-bottom: 20px;border-radius: 5px;border: 1px solid #ccc;font-size: 16px;">
                <label for="receiver_numberPhone">Số điện thoại:</label> <br>
                <input type="text" name="receiver_number_phone" id="receiver_numberPhone" style="display: block;width: 100%;padding: 10px;margin-bottom: 20px;border-radius: 5px;border: 1px solid #ccc;font-size: 16px;" required>
                <button type="submit">Hiển thị thanh toán</button>
            </form>
        </div>
    </div>
    <!-- <div class="empty-space">
        Bạn chưa có đơn hàng nào cảs
    </div> -->
<?php endif ?>
<?php require "./includes/footer.php" ?>