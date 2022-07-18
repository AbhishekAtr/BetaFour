<!-- Footer start -->

<!-- <section class="footer_beta">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="footer_beta1">
                    <div class="footer_beta3">
                        <a href="index.php"><img src="./images/logo/final-logo-footer.png" alt=""></a>
                        <div class="footer_beta1">
                            <p><i class="fa fa-location-arrow" aria-hidden="true"></i>F-32, Okhla Industrial Area, Phase-I, New Delhi-110022, INDIA</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel: 011-42575425"> 011-42575425</a> </p>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@www.betafour.in">info@www.betafour.in</a></p>
                            <p>Follow Us :</p>
                            <p>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-twitter" aria-hidden="true"></i></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="footer_beta1">
                    <div class="footer_beta2">
                        <h2>Product Categories</h2>
                    </div>
                    <a href="index.php">Amplifiers</a><br>
                    <a href="about.php">Columns</a><br>
                    <a href="product.php">Digital Echoes</a><br>
                    <a href="certificates.php">HF Drivers/Driver Units</a><br>
                    <a href="track-order.php">Line Array</a>
                </div>
            </div>
            <div class="col-md- col-sm-2">
                <div class="footer_beta1">
                    <div class="footer_beta2">
                        <h2>Product Categories</h2>
                    </div>
                    <a href="pharma-franchise.php">Speakers</a><br>
                    <a href="quality.php">New Release</a><br>
                    <a href="third-party.php">Portable Speaker Systems</a><br>
                    <a href="third-party.php">Digital Echoes</a><br>
                    <a href="third-party.php">Mixing Consoles</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">

            </div>

        </div>
    </div>
</section> -->

<div id="top-footer">
    <div class="container">
        <div class="row" style="display: flex; justify-content: space-around;">

            <div class="footer-block col-md-4 col-lg-4">

                <section id="text-2" class="widget widget_text">
                    <div class="textwidget">
                        <p><img loading="lazy" class="alignnone size-full wp-image-928" src="./images/logo/final-logo-footer.png" alt="" width="246" height="60"></p>
                        <div class="textwidget">
                            <p> F-32, Okhla Industrial Area, Phase-I, New Delhi-110022, India<br>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@www.betafour.in" class="footer-a text-white">info@www.betafour.in</a></p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:011-42575425" class="footer-a text-white"> 011-42575425 </a>
                            </p>
                            <p>Follow Us:</p>
                            <p><a href="https://www.instagram.com/" class="text-white" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/" class="text-white" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/" class="text-white" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="footer-block col-md-2 col-lg-2">

                <section id="nav_menu-2" class="widget widget_nav_menu">
                    <h3 class="widget-title text-uppercase">Product Catgories</h3>
                    <div class="menu-product-categories-container">
                        <ul id="menu-product-categories" class="menu">
                             <?php
                             include 'connection.php';
                $sql = "SELECT * FROM `categories`";
               
                if (mysqli_query($conn, $sql)) {
                  echo "";
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count = 1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {

                  while ($row = mysqli_fetch_array($result)) { ?>
                            <li id="menu-item-912" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-912"><a href="products.php?cat_name=<?php echo $row['cat_title']; ?>"><?php echo $row['cat_title']; ?></a></li>
                            <?php
                    $count++;
                  }
                } else {
                  echo '0 results';
                }
                ?>
                        </ul>
                    </div>
                </section>
            </div>

            <div class="footer-block col-lg-4 col-md-4">

                <section id="text-3" class="widget widget_text">
                    <h3 class="widget-title text-uppercase">Write Us!</h3>
                    <div class="form">
                        <form method="post" id="enquiry">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message"></textarea>
                            </div>
                            <button class="btn btn-danger btn1 text-uppercase" onclick="submitform('enquiry')">Subscribe</button>
                        </form>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<footer class="footer pad-tp-bt-20 clinic_fdownbgc">
    <div class="container">
        <div class="row">
            <div class=" col-sm-4 col-md-6 text-uppercase">
           COPYRIGHT © 2022 <span class="text-success"><strong>Beta Four</strong></span> all rights and reserved
            </div>
            <div class="col-sm-8 col-md-6 copywrite footer_responsive1">
            <span class="text-uppercase">Designed and Developed by <a href="https://www.uedeveloper.com" target="_blank" class="text_normal0 text-success"><strong>UE Developer</strong></a> and Team</span>
            </div>
        </div>
    </div>
</footer>


<!-- JS-url -->
<?php include 'include/js-url.php'; ?>

<div id="snackbar">Form Submitted Succefully</div>






