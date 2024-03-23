<?php require ".$INCLUDES_URL/header.php"?>
<?php require ".$INCLUDES_URL/header_nav.php"?>
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