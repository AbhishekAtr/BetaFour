<nav class="top-app-bar navbar navbar-expand  bg-dark fixed-top" style="box-shadow: 0 0 8px 2px rgb(0 0 0 / 5%);">
    <div class="container-fluid px-4">
        <div class="hamburger text-white" id="toggle">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
        <a class="navbar-brand me-auto" href="index.html">
            <img src="./assets/images/blogo.png" class="logo" alt="">
        </a>
        <div class="d-flex align-items-center mx-3 me-lg-0">
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-lg btn-white btn-icon dropdown-toggle text-white mdc-ripple-upgraded" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user text-white"></i></button>
                    <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuProfile">
                        <!-- <li>
                            <a href="#" class="dropdown-item" id="side-style">
                                <i class="fa fa-user" aria-hidden="true"><span id="dropLi">Profile</span></i></a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item " id="side-style">
                                <i class="fa fa-inbox" aria-hidden="true"><span id="dropLi">Inbox</span></i></a>
                        </li> -->
                        <li>
                            <a href="logout.php" class="dropdown-item droplist">
                                <i class="fa fa-sign-out" aria-hidden="true">
                                    <span id="dropLi">Logout</span>
                                </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<div id="sidemenu" class="side-bar  w3-animate-left bg-dark">
    <div class="mt-5">
        <ul id="menu">
            <li class="nav-label first text-white">
                Main Menu
            </li>

            <li class="text-white">
                <a class="" href="home-slider.php" aria-expanded="false">
                    <i id="side-style" class="fa fa-tachometer text-white" aria-hidden="true"></i>
                    <span class="nav-text text-white">Home Slider</span>
                </a>
            </li>
            <li class="nav-label first text-white">Products</li>
            <li id="side-style" class="text-white">
                <a href="products.php">
                    <i class="fa fa-android text-white" aria-hidden="true"></i>
                    <span class="nav-text text-white">Product</span>
                </a>
            </li>
            <li id="side-style" class="text-white">
                <a class="has-arrow ai-icon" href="new-release.php" aria-expanded="false">
                    <i class="fa fa-bar-chart text-white" aria-hidden="true"></i>
                    <span class="nav-text text-white">New Release Products</span>
                </a>
            </li>
            <li class="nav-label first text-white">Product-Categories</li>
            <li id="side-style" class="text-white">
                <a class="has-arrow ai-icon" href="categories.php" aria-expanded="false">
                    <i class="fa fa-diamond text-white" aria-hidden="true"></i>
                    <span class="nav-text text-white">Category</span>
                </a>
            </li>
        </ul>
    </div>
</div>