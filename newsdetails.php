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
                        <li class="breadcrumb-item"><a href="news.php" class="text-white">News</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">News Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>


<section class="product-details">
    <div class="container">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"><img src="images/news/n1.jpg" id="main_product_image" width="350" /></div>
                        <div class="thumbnail_images">
                            <ul id="thumbnail">
                                <li><img onclick="changeImage(this)" src="images/news/n1.jpg" width="70" /></li>
                                <li><img onclick="changeImage(this)" src="images/news/n1.jpg" width="70" /></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="text-danger">INDIAN DJ EXPO 2017</h3>
                        </div>
                        <p> We had taken part at Delhi Expo 2017, Our Stall no. was D-95. Above there are some of the pictures [OK]</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer  -->
<?php include 'include/footer.php'; ?>


<a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
    <i class="fa fa-whatsapp whatsapp-icon"></i>
</a>