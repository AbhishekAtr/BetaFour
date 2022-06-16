<!-- Header -->

<?php include 'include/header.php';
include 'connection.php';
$catname = "";
if (isset($_GET['cat_name'])) {
  $catname = $_GET['cat_name'];
}
$query = "SELECT * FROM `products` where `product_cat` = '$catname'";
$result = mysqli_query($conn, $query);
?>

<!-- Breadcrums start -->

<section class="news-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page"><?php echo $catname; ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<!-- Our Products start -->

<section style="background-color: #eee;">
  <div class="container py-5 heading">
    <h4 class="text-center mb-5 text-uppercase"> <span>O</span>ur Products</h4>

    <div class="row">

      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { ?>
          <div class=" col-md-4 mb-4">

            <div class="bg-image hover-zoom ripple shadow-1-strong rounded card p-2 border">
              <a href="productdetails.php?pid=<?php echo $row['product_id']; ?>" class="text-center">

                <img src="<?php echo $url . $row['product_img']; ?>" class="w-100" />
                <div class="mt-2 card-footer">
                  <h6 class="text-dark font-weight-bold"> <?php echo $row['product_title']; ?></h6>
                  <button class="btn btn-danger">Read More</button>
                </div>
              </a>
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
  </div>
</section>


<!-- footer  -->
<?php include 'include/footer.php'; ?>

{/* WhatsApp icon */}
      <a href="https://wa.me/2348100000000" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
        <i class="fa fa-whatsapp whatsapp-icon"></i>
      </a>