<?php require ".$INCLUDES_URL/header.php"?>
<?php require ".$INCLUDES_URL/header_nav.php"?>


<style>

  .mySlides {
    display: none;
  }

  /* img {
      vertical-align: middle;
    } */
  /* Slideshow container */
  .slideshow-container {
    max-width: 100%;
    position: relative;
    margin: auto;
  }

  .to_dot {
    position: absolute;
    bottom: 5%;
    text-align: center;
    right: 48%;
  }

  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active {
    background-color: #717171;
  }

  /* Fading animation */
  /* .fade {
    animation-name: fade;
    animation-duration: 3s;
  } */

  @keyframes fade {
    from {
      opacity: 0.8;
    }

    to {
      opacity: 1;
    }
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .text {
      font-size: 11px;
    }
  }
</style>

<div class="x font">
  <div class="showimg">
    <div class="slideshow-container">

      <!-- --------- Xử Li Banner--------- -->
      <?php
      $dsBanner = selectAll_banner();
      foreach ($dsBanner as $bn) {
        extract($bn);
        echo '<div class="mySlides">
                        <img  src=".' . $bn['banner_image'] . '" alt="" style="width: 100%">
        </div>';
      }
      ?>

      <div style="text-align: center" class="to_dot">
      <?php 
      foreach ($dsBanner as $bn) { ?>
        <span class="dot"></span>
      <?php }?>
      </div>
    </div>



    <nav>
      <div class="div1">
        <div class="div1_1 div1_1_cart">
          <img src="../<?= $ROOTt_URL ?>/asset/images/ECOM_600x950_2.jpg" alt="" />
          <div class="xemngay">
            <button><a href="/du_an1/sale-fashion">xem ngay</a></button>
          </div>
        </div>

        <div class="div1_1 div1_1_cart">
          <img src="../<?= $ROOTt_URL ?>/asset/images/bannerrow2.jpg" alt="" />
          <div class="xemngay">
            <button><a href="/du_an1/news-fashion">xem ngay</a></button>
          </div>
        </div>

        <div class="div1_1 div1_1_cart">
          <img src="../<?= $ROOTt_URL ?>/asset/images/ECOM_600x950_copy_2.jpg" alt="" />
          <div class="xemngay">
            <button><a href="/du_an1/sale-fashion">xem ngay</a></button>
          </div>
        </div>
      </div>
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
      <!-- Nav -->
      <div></div>
      <!-- Nav -->
      <!-- end sign-up -->
      <!--  favoriteProduct-->
      <?php require "./includes/favorite_product.php" ?>
      <!-- end -->
      <!-- Start Cart -->
      <?php require "./includes/cart_modal.php" ?>
      <?php require ".$INCLUDES_URL/delete_cart_confirm.php" ?>
      <!-- sign in -->

      <!-- Nav -->
      <!-- end sign in -->

<div class="x font">
  <div class="showimg">
    <div class="slideshow-container">

      <!-- --------- Xử Li Banner--------- -->
      <?php
      $dsBanner = selectAll_banner();
      foreach ($dsBanner as $bn) {
        extract($bn);
        echo '<div class="mySlides">
                        <img  src=".' . $bn['banner_image'] . '" alt="" style="width: 100%">
        </div>';
      }
      ?>

      <div style="text-align: center" class="to_dot">
      <?php 
      foreach ($dsBanner as $bn) { ?>
        <span class="dot"></span>
      <?php }?>
      </div>
    </div>
      <div class="div1_2 div1_2_cart">
        <img src="../<?= $ROOTt_URL ?>/asset/images/banneryoutube.jpg" alt="" />
        <div class="" style="
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 150px;
    right: 100px;
    border: 5px solid white; 
    border-radius: 15px;">
          <iframe style="border-radius: 10px;" width="380" height="280" src="https://www.youtube.com/embed/L7qbjrmQ728" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>

      <div class="div_bottomrowgird">
        <div class="div1_1 div1_1_cart">
          <img src="../<?= $ROOTt_URL ?>/asset/images/banner_dm.png" alt="" />
          <div class="xemngay">
            <button><a href="/du_an1/male-fashion">Xem ngay</a></button>
          </div>
        </div>

        <div class="div1_1 div1_1_cart">
          <img src="../<?= $ROOTt_URL ?>/asset/images/banner_dm2.png" alt="" />
          <div class="xemngay">
            <button><a href="/du_an1/female-fashion">Xem ngay</a></button>
          </div>
        </div>
      </div>
  </div>

  <div class="title_rowgird font_roboto">
    <h1 style="font-size: 40px;">TIN THỜI TRANG</h1>
  </div>

  <div class="row_girdx" style="gap: 20px;">
    <div class="col column font_roboto">
      <div class="column_img">
        <img src="../<?= $ROOTt_URL ?>/asset/images/tintuc1.jpg" style="width: 100%; height: 100%" alt="" />
      </div>
      <div class="column_info">
        <div class="column_button flexx font_roboto">
          <div class="button__1">
            <button>thành tựu</button>
          </div>
          <div class="button__1">
            <button>sự nghiệp</button>
          </div>
        </div>

        <div class="title_name">
          <span>Tã/bỉm quần HUGGIES SKINCARE MEGA JUMBO size L 96+8
            miếng</span>
        </div>

        <div class="column_time">
          <span>May 4,2028</span>
        </div>

        <div class="name font">
          <span>Tã/bỉm quần HUGGIES SKINCARE MEGA JUMBO size L 96+8
            miếng</span>
        </div>
      </div>
    </div>

    <div class="col column font_roboto">
      <div class="column_img">
        <img src="../<?= $ROOTt_URL ?>/asset/images/tintuc2.jpg" style="width: 100%; height: 100%" alt="" />
      </div>
      <div class="column_info">
        <div class="column_button flexx font_roboto">
          <div class="button__1">
            <button>thành tựu</button>
          </div>
          <div class="button__1">
            <button>sự nghiệp</button>
          </div>
        </div>

        <div class="title_name">
          <span>Tã/bỉm quần HUGGIES SKINCARE MEGA JUMBO size L 96+8
            miếng</span>
        </div>

        <div class="column_time">
          <span>May 4,2028</span>
        </div>

        <div class="name font">
          <span>Tã/bỉm quần HUGGIES SKINCARE MEGA JUMBO size L 96+8
            miếng</span>
        </div>
      </div>
    </div>

    <div class="col column font_roboto">
      <div class="column_img">
        <img src="../<?= $ROOTt_URL ?>/asset/images/tintuc3.jpg" style="width: 100%; height: 100%" alt="" />
      </div>
      <div class="column_info">
        <div class="column_button flexx font_roboto">
          <div class="button__1">
            <button>thành tựu</button>
          </div>
          <div class="button__1">
            <button>sự nghiệp</button>
          </div>
        </div>

        <div class="title_name">
          <span>Tã/bỉm quần HUGGIES SKINCARE MEGA JUMBO size L 96+8
            miếng</span>
        </div>

        <div class="column_time">
          <span>May 4,2028</span>
        </div>

        <div class="name font">
          <span>Tã/bỉm quần HUGGIES SKINCARE MEGA JUMBO size L 96+8
            miếng</span>
        </div>
      </div>
    </div>
  </div>
  </nav>



  <script>
  
    // phần slide show
    let slideIndex = 0;

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
    showSlides();

  </script>

  <?php require ".$INCLUDES_URL/footer.php"?>