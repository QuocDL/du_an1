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
    <form action="../../du_an1/view/progess-signup.php" method="POST" id="register-form" name= 'register-form'  onsubmit=" return validateForm_dangky()">
      <div class="form-group error">
        <label for="full_name">Full Name*</label>
        <input type="text" name="full_name" id="full_name" placeholder="Full name"/>
        <small></small>
      </div>
      <div class="form-group error">
        <label for="username">UserName*</label>
        <input type="text" name="username" id="username" placeholder="Username"/>
        <small></small>
      </div>
      <div class="form-group error">
        <label for="email">Email *</label>
        <input type="email" name="email" id="email" placeholder="Your email"/>
        <small></small>
      </div>

      <div class="form-group error">
        <label for="password">Password *</label>
        <input type="password" name="password" id="password" placeholder="Enter a password"/>
        <small></small>
      </div>
      <div class="form-group error">
        <label for="address">Address *</label>
        <input type="text" name="address" id="address" placeholder="Your address"/>
        <small></small>
      </div>
      <div class="form-group error">
        <label for="phone">Phone *</label>
        <input type="text" name="phone" id="phone" placeholder="Your phone"/>
        <small></small>
      </div>

      <button type="submit" class="buttonregister" name="dangky">Đăng ký</button>
    </form>
  </div>
</div>
<div id="quen-modal" class="modal">
  <div class="modal-content">
    <span class="close" id="close_quen">&times;</span>
    <h2>Quên mật khẩu</h2>
    <form id="forgotPasswordForm"  name='forgotPasswordForm' method="post" action="index.php?action=quenmk">
      <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" name="email" id="email_pass" placeholder="Your email"/>
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
    <form action="../../du_an1/view/progess-login.php" method="POST" id='login_user' name='login_user' onsubmit=" return validateForm_login()">
      <div class="form-group error">
        <label for="username">Tài khoản:</label>
        <input type="text" id="username_loign" name="username_loign"/>
        <small></small>
      </div>
      <div class="form-group error">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password3" name="password3"/>
        <small></small>
      </div>
      <div class="form-group">
        <a href=""><span class="quenmk">Quên mật khẩu?</span></a>
      </div>
      <br />
      <button type="submit" class="buttonregister" name="login" id="submit-btn">
        Đăng nhập
      </button>

      <br />

    </form>
    <p id="message"></p>
  </div>
</div>
<!-- Nav -->
<div></div>
<!-- Nav -->
<!-- end sign-up -->
<!--  favoriteProduct-->
<!-- end -->
<!-- Start Cart -->

<!-- sign in -->

<!-- Nav -->
<!-- end sign in -->

<?php require "./includes/header_nav.php" ?>

<!-- End nav -->
<div class="wrapper">
  <ul class="breadcrumbs">
    <li>Trang chủ /</li>
    <li>Thời trang nữ</li>
  </ul>

  <main id="main-content">
    <div class="main-banner">
      <img src="../../du_an1/asset/images/thoi_trang_nu.jpg" alt="" class="main-banner-img" />
    </div>

    <h3 class="category-title">Thời Trang Nữ</h3>

    <div class="functions">
      <div class="filter-function">
        Bộ lọc
        <i class="fa-solid fa-filter"></i>
      </div>
      <?php  // Lấy tổng số sản phẩm
          $category_id = 2;
          $totalProducts = count_all_products($category_id);?>
      <div class="view-function">
      <strong><?php echo $totalProducts?></strong> sản phẩm 
      </div>
      <div class="sort-function">
        Sắp xếp
        <form action="">
          <select name="" id="" class="sort-function-select">
            <option value="">Mặc định</option>
          </select>
        </form>
      </div>
    </div>

    <div class="main-colums">
      <!-- block filter -->

      <?php require "./includes/filter_product_female.php" ?>

      <div class="product-colum">
        <div class="product-row row-col-4">
          <?php
          $currentpage = isset($_GET['page']) ? intval($_GET['page']) : 1;

          // $itemsPerPage là số sản phẩm hiển thị trên mỗi trang
          $itemsPerPage = 8;

          // Tính toán vị trí bắt đầu của sản phẩm trên trang hiện tại
          $start = ($currentpage - 1) * $itemsPerPage;

          // Lấy dữ liệu sản phẩm cho trang hiện tại

          // Lấy tổng số sản phẩm
          $category_id = 2;
          $totalProducts = count_all_products($category_id);
          // var_dump($totalProducts);

          // Tính tổng số trang dựa trên tổng số sản phẩm và số sản phẩm trên mỗi trang
          $totalPages = ceil($totalProducts / $itemsPerPage);
          $product_result = isset($_GET['page']) ? selectAll_product_phantrang($category_id, false, $start, $itemsPerPage) : select_home_product(true, 2);;
          foreach ($product_result as $key => $value) : ?>
            <!-- start item -->
            <div class="product-item">
              <a href="./product_detail&product_id=<?= $value['product_id'] ?>" class="product-image-item">
                <img src="../<?= $ROOT_URL ?><?= $value['main_image_url'] ?>" alt="" class="product-image" />
                <img src="../<?= $ROOT_URL ?><?= $value['hover_main_image_url'] ?>" alt="" class="product-image-second" />
              </a>
              <div class="product-title">
                <a href="./index.php?action=product_detail&product_id=<?= $value['product_id'] ?>" class="product-name">
                  <?= $value['product_name'] ?>
                </a>
                <i class="fa-regular fa-heart product-icon"></i>
              </div>
              <div class="product-price">
                <!-- format tiền tệ việt nam -->
                <?php
                $locale = 'vi_VN';
                $currency = $value['product_price'];
                $discount = $currency - ($currency * $value['discount'] / 100);
                $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
                $product_vn_price = $formatter->format($currency);
                $discount_price = $formatter->format($discount);
                ?>
                <span class="product-newPrice"><?= $discount_price ?></span>
                <span class="product-oldPrice"><?= $product_vn_price ?></span>
              </div>
              <span class="product-newProduct">
                <?php if ($value['product_status']==1) {?>
                    <img src="../<?= $ROOT_URL ?>/asset/images/Label_New_Arrivals_14T7.png" alt="" />
                <?php }elseif($value['product_status']==2){?>
                    <img src="../<?= $ROOT_URL ?>/asset/images/sale-sinh-nhat-routine-10-tuoi.png" alt="" />
                <?php }?> 
              </span>
              <span class="product-discount"> -<?= $value['discount']; ?>% </span>
              <!-- Select color by product -->
              <?php $product_color_result = select_product_color($value['product_code']); ?>
              <div class="product-color-list">
                <?php foreach ($product_color_result as $value) : ?>
                  <div class="product-color">
                    <div class="product-color-child">
                      <img src="../<?= $ROOT_URL ?><?= $value['color_image'] ?>" alt="" class="product-color-img" />
                    </div>
                    <div class="product-color-hover">
                      <img src="../<?= $ROOT_URL ?><?= $value['color_image'] ?>" alt="" class="product-color-img-hover" />
                      <span class="product-color-name"> <?= $value['color_name'] ?> </span>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
            <!-- end item -->
          <?php endforeach ?>
        </div>
        <ul class="home-pagination">
          <li class="home-pagination-item" <?php echo ($currentpage == 1) ? 'home-pagination-disable' : ''; ?>>
            <a href="?page=<?php echo 1; ?>" class="home-pagination-link" class="home-pagination-link">
              <i class="fa-solid fa-angles-left home-pagination-icon"></i>
            </a>
          </li>
          <li class="home-pagination-item <?php echo ($currentpage == 1) ? 'home-pagination-disable' : ''; ?>">
            <a href="?page=<?php echo $currentpage - 1; ?>" class="home-pagination-link">
              <i class="fa-solid fa-angle-left home-pagination-icon"></i>
            </a>
          </li>
          <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="home-pagination-item <?php echo ($i == $currentpage) ? 'home-pagination-active' : ''; ?>">
              <a href="?page=<?php echo $i; ?>" class="home-pagination-link"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>
          <li class="home-pagination-item <?php echo ($currentpage == $totalPages) ? 'home-pagination-disable' : ''; ?>">
            <a href="?page=<?php echo $currentpage + 1; ?>" class="home-pagination-link">
              <i class="fa-solid fa-angle-right home-pagination-icon"></i>
            </a>
          </li>
          <li class="home-pagination-item <?php echo ($currentpage == $totalPages) ? 'home-pagination-disable' : ''; ?>">
            <a href="?page=<?php echo $totalPages - 1; ?>" class="home-pagination-link">
              <i class="fa-solid fa-angles-right home-pagination-icon"></i>
            </a>
          </li>
        </ul>

      </div>
    </div>
  </main>

  <div class="product-suggest">
    <h3 class="product-suggest-title">
      GỢI Ý CHO BẠN: CÁC SẢN PHẨM ĐƯỢC QUAN TÂM NHẤT
    </h3>
    <div class="my-slickSilder">
      <?php $product_result = select_home_product(true, 2); ?>
      <?php foreach ($product_result as $key => $value) : ?>
        <!-- start item -->
        <div class="product-item" id="product-list">
          <a href="./index.php?action=product_detail&product_id=<?= $value['product_id'] ?>" class="product-image-item">
            <img src="../<?= $ROOT_URL ?><?= $value['main_image_url'] ?>" alt="" class="product-image" />
          </a>
          <div class="product-title">
            <a href="./index.php?action=product_detail&product_id=<?= $value['product_id'] ?>" class="product-name">
              <?= $value['product_name'] ?>
            </a>
          </div>
          <div class="product-price">
            <?php
            $locale = 'vi_VN';
            $currency = $value['product_price'];
            $discount = $currency - ($currency * $value['discount'] / 100);
            $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
            $product_vn_price = $formatter->format($currency);
            $discount_price = $formatter->format($discount);
            ?>
            <span class="product-newPrice"><?= $discount_price ?></span>
            <span class="product-oldPrice"><?= $product_vn_price ?></span>
            <span class="product-discount"> -<?= $value['discount']; ?>% </span>
          </div>
          <?php $product_color_result = select_product_color($value['product_code']); ?>

          <div class="product-color-list">
            <?php foreach ($product_color_result as $value) : ?>
              <a href="#" class="product-color">
                <div class="product-color-child">
                  <img src="../<?= $ROOT_URL ?><?= $value['color_image'] ?>" alt="" class="product-color-img" />
                </div>
              </a>
            <?php endforeach ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php require "./includes/footer.php" ?>