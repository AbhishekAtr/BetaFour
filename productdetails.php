<!-- Header -->
<?php include 'include/header.php';
include 'connection.php';
$id = "";
if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
}
$query = "SELECT * FROM `products` where `product_id` = '$id'";
$result = mysqli_query($conn, $query);
?>
<section class="news-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <li class="breadcrumb-item"><a href="products.php?cat_name=<?php echo $row['product_cat']; ?>" class="text-white"><?php echo $row['product_cat']; ?></a></li>
                        <?php

                            }
                        } else {
                            echo 'No data found';
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
        $id = "";
        if (isset($_GET['pid'])) {
            $id = $_GET['pid'];
        }
        $query = "SELECT * FROM `products` where `product_id` = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6 border-end">
                            <div class="d-flex flex-column justify-content-center">
                                <div class="main_image"><img src="<?php echo $url . $row['product_img']; ?>" id="main_product_image" width="350" /></div>
                                <div class="thumbnail_images">
                                    <ul id="thumbnail">
                                        <li><img onclick="changeImage(this)" src="<?php echo $url . $row['product_img']; ?>" width="70" /></li>
                                        <li><img onclick="changeImage(this)" src="<?php echo $url . $row['other_img']; ?>" width="70" /></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 right-side">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="text-danger"><?php echo $row['product_title']; ?></h3>
                                </div>
                                <?php echo $row['product_desc']; ?>
                            </div>

                        </div>
                    </div>
                </div>
        <?php

            }
        } else {
            echo 'No data found';
        }
        ?>
    </div>
</section>

<!-- footer  -->
<?php include 'include/footer.php'; ?>


<a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
    <i class="fa fa-whatsapp whatsapp-icon"></i>
</a>