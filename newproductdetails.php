<!-- Header -->
<?php include 'include/header.php';
include 'connection.php';
$url = "http://localhost/betafour-static/admin/";
$id = "";
if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
}
$query = "SELECT * FROM `new-release` where `id` = '$id'";
$result = mysqli_query($conn, $query);
?>
<section class="news-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                        
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <li class="breadcrumb-item"><a href="newrelease.php" class="text-white"><?php echo $row['category']; ?></a></li>
                        <?php

                            }
                        } else {
                            echo '0 results';
                        }
                        ?>

                        <li class="breadcrumb-item active text-white" aria-current="page">Product Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>


<section class="product-details">
    <div class="container">
        <?php
        include 'connection.php';
        $url = "http://localhost/betafour-static/admin/";
        $id = "";
        if (isset($_GET['pid'])) {
            $id = $_GET['pid'];
        }
        $query = "SELECT * FROM `new-release` where `id` = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6 border-end">
                            <div class="d-flex flex-column justify-content-center">
                                <div class="main_image"><img src="<?php echo $url . $row['image']; ?>" id="main_product_image" width="350" /></div>
                                <div class="thumbnail_images">
                                    <ul id="thumbnail">
                                        <li><img onclick="changeImage(this)" src="images/products/18EM1200-F-B-B4.jpg" width="70" /></li>
                                        <li><img onclick="changeImage(this)" src="images/products/18EM1200-F-B-B4.jpg" width="70" /></li>
                                        <li><img onclick="changeImage(this)" src="images/products/18EM1200-F-B-B4.jpg" width="70" /></li>
                                        <li><img onclick="changeImage(this)" src="images/products/18EM1200-F-B-B4.jpg" width="70" /></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 right-side">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="text-danger"><?php echo $row['title']; ?></h3>
                                    <!-- <span class="heart"><i class="fa fa-heart fa1"></i></span> -->
                                </div>
                                <div class="mt-2 pr-3 content">
                                    <p>All models in the product line are engineered to offer sound reinforcement professionals solutions to meet nearly any challenge. Each model is compatible with others, both mechanically and acoustically.
                                        Delivers premium-quality audio in performance.</p>
                                </div>
                                <h3 class="text-success">Key Features</h3>
                                <div class="mt-2 pr-3 content">
                                    <ul class="ml-4">
                                        <li>HIGH PERFORMANCE</li>
                                        <li>PRECISION COVERAGE</li>
                                        <li>WIDE RANGE OF APPLICATIONS</li>
                                        <li>PROGRESSIVE WAVEGUIDES</li>
                                        <li>UNSURPASSED [B4] ENGINEERING</li>
                                        <li>ADVANCED TECHNOLOGY COMPONENTS</li>
                                    </ul>
                                </div>
                                <div>
                                    <table border="2" style="width: 100%;text-align: center;">
                                        <tr style="background: lightcyan;">
                                            <th>SPECIFICATIONS</th>
                                            <th>18-EM1290</th>
                                        </tr>
                                        <tr>
                                            <td>Nominal Diameter</td>
                                            <td>18 Inch</td>
                                        </tr>
                                        <tr>
                                            <td>Rated Impedance</td>
                                            <td>8 Ohms</td>
                                        </tr>
                                        <tr>
                                            <td>Power Capacity</td>
                                            <td>1200Watts RMS</td>
                                        </tr>
                                        <tr>
                                            <td>Sensitivity</td>
                                            <td>96 dB</td>
                                        </tr>
                                        <tr>
                                            <td>Frequency Range</td>
                                            <td>35 – 1600 Hz</td>
                                        </tr>
                                        <tr>
                                            <td>Voice Coil Diameter</td>
                                            <td>4 Inch</td>
                                        </tr>
                                        <tr>
                                            <td>Voice Coil Material</td>
                                            <td>Til/Copper In/Out Winding</td>
                                        </tr>
                                        <tr>
                                            <td>Magnet Size</td>
                                            <td>220x120x25 mm</td>
                                        </tr>
                                        <tr>
                                            <td>Magnet Type</td>
                                            <td>Ferrite</td>
                                        </tr>
                                        <tr>
                                            <td>Frame</td>
                                            <td>Aluminium Casting</td>
                                        </tr>
                                        <tr>
                                            <td>Cone Type</td>
                                            <td>Pulp Paper</td>
                                        </tr>
                                        <tr>
                                            <td>Dual/Dust Cap</td>
                                            <td> Pulp Paper</td>
                                        </tr>
                                    </table>
                                    <p><span class="text-danger">Categories:</span> New Release, Speakers Tag: Power Amplifier</p>
                                </div>

                                <!-- <div class="ratings d-flex flex-row align-items-center">
                            <div class="d-flex flex-row"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <span>441 reviews</span>
                        </div> -->
                                <!-- <div class="mt-5">
                            <span class="fw-bold">Color</span>
                            <div class="colors">
                                <ul id="marker">
                                    <li id="marker-1"></li>
                                    <li id="marker-2"></li>
                                    <li id="marker-3"></li>
                                    <li id="marker-4"></li>
                                    <li id="marker-5"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="buttons d-flex flex-row mt-5 gap-3"><button class="btn btn-outline-dark">Buy Now</button> <button class="btn btn-dark">Add to Basket</button></div> -->
                                <!-- <div class="search-option">
                        <i class="fa fa-search-alt-2 first-search"></i>
                        <div class="inputs"><input type="text" name="" /></div>
                        <i class="fa fa-share-alt share"></i>
                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
        <?php
                $count++;
            }
        } else {
            echo '0 results';
        }
        ?>
    </div>
    </sect>

    <!-- footer  -->
    <?php include 'include/footer.php'; ?>