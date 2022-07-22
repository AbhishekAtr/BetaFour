<!-- Header -->

<?php include 'include/header.php';


function make_query($conn)
{
  $query = "SELECT * FROM `home-slider` ORDER BY Id ASC";
  $result = mysqli_query($conn, $query);
  return $result;
}

function make_slide_indicators($conn)
{
  $output = '';
  $count = 0;
  $result = make_query($conn);
  while ($row = mysqli_fetch_array($result)) {
    if ($count == 0) {
      $output .= '
   <li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '" class="active"></li>
   ';
    } else {
      $output .= '
   <li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '"></li>
   ';
    }
    $count = $count + 1;
  }
  return $output;
}


?>
<!-- slider Start -->


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php echo make_slide_indicators($conn); ?>
  </ol>
  <div class="carousel-inner">
    <?php

    $sql = "SELECT * FROM `home-slider`";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    for ($i = 1; $i <= $num; $i++) {
      $row = mysqli_fetch_array($result);

    ?>

      <?php
      if ($i == 1) {
      ?>
        <div class="carousel-item active image-margin">
          <img class="d-block w-100" src="<?php echo $url . $row['image_url'] ?>" />
        </div>
      <?php
      } else {
      ?>
        <div class="carousel-item image-margin">
          <img class="d-block w-100" src="<?php echo $url . $row['image_url'] ?>" />
        </div>

    <?php
      }
    }
    ?>
  </div>
  <a class="carousel-control-prev" id="carouselArrow" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" id="carouselArrow" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end -->

<!-- section New Release products start -->

<!-- <div class="container-fluid">
  <div class="row">
    <div class="container release_section">
      <div class="row d-flex justify-content-center release_inner">
        <div class="col-lg-4">
          <h4 class="text-danger text-center text-uppercase">New Released</h4>
          <h2 class="text-center text-uppercase">Products</h2>
        </div>
        <div class="col-lg-8">
          <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 mb-4 mb-lg-0">
                      <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="images/Products/portable-speaker-sys-thumbnail-300x169-1.jpg" class="w-100" />
                        <a href="#!">
                          <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                      <h5 class="text-uppercase">Portable Speaker Systems</h5>
                      <p class=" mb-4 mb-md-0">
                        There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour, or
                        randomised words which don't look even slightly believable.
                      </p>
                      <button class="btn btn-danger my-3">View all</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 mb-4 mb-lg-0">
                      <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="images/Products/amp-thumbnail-300x169-2.jpg" class="w-100" />
                        <a href="#!">
                          <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                      <h5 class="text-uppercase">Amplifiers</h5>
                      <p class=" mb-4 mb-md-0">
                        There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour, or
                        randomised words which don't look even slightly believable.
                      </p>
                      <button class="btn btn-danger my-3">View all</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-12 col-xl-10">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 mb-4 mb-lg-0">
                      <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="images/Products/Microphone-thumbnail-300x169-1.jpg" class="w-100" />
                        <a href="#!">
                          <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                      <h5 class="text-uppercase">Microphones</h5>
                      <p class=" mb-4 mb-md-0">
                        There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour, or
                        randomised words which don't look even slightly believable.
                      </p>
                      <button class="btn btn-danger my-3">View all</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-12 col-xl-10">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 mb-4 mb-lg-0">
                      <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="images/Products/Mixer-thumbnail-300x169-1.jpg" class="w-100" />
                        <a href="#!">
                          <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                      <h5 class="text-uppercase">Mixing Consoles</h5>
                      <p class=" mb-4 mb-md-0">
                        There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour, or
                        randomised words which don't look even slightly believable.
                      </p>
                      <button class="btn btn-danger my-3">View all</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- <section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading">
          <h2 class="text-center text-uppercase">NEW <span>R</span>ELEASED Products</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <section class="news-slider d-flex justify-content-center  my-5">
          <div class="row">
            <div class="col-md-4 col-sm-3 col-xm-3">
              <div class="card news_card">
                <img class="card-img-top" src="images/Products/portable-speaker-sys-thumbnail-300x169-1.jpg" alt="Card image cap">
                <div class="card-body text-center">
                  <h5 class="card-title">PORTABLE SPEAKER SYSTEMS</h5>
                  <p class="card-text">Class D power amplifiers with its total power upto 500W provide tremendous sound pressure and incredible low-frequency impact.</p>
                  <a href="#" class="btn btn-danger">View</a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card news_card">
                <img class="card-img-top" src="images/products/amp-thumbnail-300x169-2.jpg" alt="Card image cap">
                <div class="card-body text-center">
                  <h5 class="card-title">AMPLIFIERS</h5>
                  <p class="card-text">Standard width 19”inch (48.3cm) rack mounting. Housed in rugged, all steel 3u chassis.</p>
                  <a href="#" class="btn btn-danger">View</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card news_card">
                <img class="card-img-top" src="images/products/Microphone-thumbnail-300x169-1.jpg" alt="Card image cap">
                <div class="card-body text-center">
                  <h5 class="card-title">MICROPHONES</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-danger">View</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</section> -->

<section class="mt-5">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-8 col-lg-6">
        <div class="header heading">
          <h6 class="text-uppercase text-danger">Products</h6>
          <h2 class="text-uppercase"><span>C</span>ategories</h2>
        </div>
      </div>
    </div>
</section>
<section class="section-products">
  <div class="container">
    <div class="row">
      <!-- Single Product -->

      <?php


      $sql = "SELECT * from `categories`";
      if (mysqli_query($conn, $sql)) {
      } else {
      }
      $count = 1;
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) { ?>
          <div class="col-md-4">
            <a href="products.php?cat_name=<?php echo $row['cat_title']; ?>">
              <div id="product-1" class="single-product">

                <div class="part-1 hover-zoom text-center">
                  <img src="<?php echo $url . $row['cat_img']; ?>" alt="">
                </div>
                <div class="part-2">
                  <h3 class="product-title text-danger text-uppercase text-center"><?php echo $row['cat_title']; ?></h3>
                  <p class="text-center text-dark"><?php echo $row['cat_desc']; ?></p>
                </div>
              </div>
            </a>
          </div>

      <?php
          $count++;
        }
      } else {
        echo '0 results';
      }
      ?>

    </div>
  </div>
  </div>
</section>
<!-- end -->




<!-- Why Us Section -->
<section class="why-us">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 heading">
        <h2 class="mt-5 text-center text-uppercase">Credi<span>b</span>ility</h2>

      </div>
    </div>
</section>
<div class="container why-us">
  <div class="row mt-5">
    <div class="col-sm-4 col-lg-4">
      <div class="box">
        <i class="fa fa-coffee" aria-hidden="true"></i>
        <h4 class="text-uppercase">Experience</h4>
        <p>We have experience of more than 25 years in the Music System Industry.</p>
        <a href="about.php">Read More...</a>
      </div>
    </div>
    <div class="col-sm-4 col-lg-4">
      <div class="box">
        <i class="fa fa-life-ring" aria-hidden="true"></i>
        <h4 class="text-uppercase">Expertise</h4>
        <p>We have well educated and expert engineers from the industry</p>
        <a href="about.php">Read More...</a>
      </div>
    </div>
    <div class="col-sm-4 col-lg-4">
      <div class="box">
        <i class="fa fa-expand" aria-hidden="true"></i>
        <h4 class="text-uppercase">Engineering</h4>
        <p>We have world-class engineering and research lab for the PA systems.</p>
        <a href="about.php">Read More...</a>
      </div>
    </div>

  </div>
</div>
</div>
<!-- End Why Us Section -->


<!-- section Video -->

<div class="container-fluid my-5">
  <div class="row">
    <div class="col-lg-12">
      <iframe width="100%" height="800" src="https://www.youtube.com/embed/f-nUl94jDsg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      <video class="wp-video-shortcode" id="video-5-1_from_mejs" preload="metadata" src="https://www.youtube.com/watch?v=f-nUl94jDsg&amp;_=1" style="width: 100%; height: 100%; display: none;">
        <source type="video/youtube" src="https://www.youtube.com/watch?v=f-nUl94jDsg&amp;_=1"><a href="https://www.youtube.com/watch?v=f-nUl94jDsg">https://www.youtube.com/watch?v=f-nUl94jDsg</a>
      </video>
    </div>
  </div>

</div>

<!-- end -->

<!-- News Section start -->

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading">
          <h5 class="text-center text-uppercase"><span>L</span>atest News & Events</h5>
        </div>
      </div>
    </div>
</section>
<section class="news-slider d-flex justify-content-center  my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-3 col-xm-3">
        <div class="card news_card">
          <img class="card-img-top" src="images/20190720_141453-370x270 (1).jpg" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="newsdetails.php" class="btn btn-danger">View</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card news_card">
          <img class="card-img-top" src="images/IMG-0816-370x270 (1).jpg" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="newsdetails.php" class="btn btn-danger">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card news_card">
          <img class="card-img-top" src="images/IMG_20180720_145302015-370x270 (1).jpg" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="newsdetails.php" class="btn btn-danger">View</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- end -->


<!-- clients Section start-->

<div class="container heading my-5">
  <h4 class="text-uppercase">Our Others <span>B</span>rands</h4>
</div>
<div class="container my-5 ">
  <div class="row text-center">
    <div class="customer-logos">
      <div class="col-md-4 col-lg-4 text-center">
        <img src="images/brands/1.png" alt="">
      </div>
      <div class="col-md-4 col-lg-4 text-center">
        <img src="images/brands/SM-LOGO-png-1536x585.png" alt="" >
      </div>
      <div class="col-md-4 col-lg-4 text-center">
        <img src="images/brands/SMK-circle-logo-png-150x150.png" alt="" >
      </div>
    </div>
  </div>
</div>

<!-- end -->





<!-- footer  -->
<?php include 'include/footer.php'; ?>



<a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
  <i class="fa fa-whatsapp whatsapp-icon"></i>
</a>