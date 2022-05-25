       <!DOCTYPE html>
       <html lang="en">

       <head>
           <meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Document</title>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <style>
               @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

               :root {
                   --header-height: 3rem;
                   --nav-width: 68px;
                   --first-color: #c1474e;
                   --first-color-light: #b8b2d3;
                   --white-color: #f7f6fb;
                   --body-font: "Nunito", sans-serif;
                   --normal-font-size: 1rem;
                   --z-fixed: 100;
               }

               *,
               ::before,
               ::after {
                   box-sizing: border-box;
               }

               body {
                   position: relative;
                   margin: var(--header-height) 0 0 0;
                   padding: 0 1rem;
                   font-family: var(--body-font);
                   font-size: var(--normal-font-size);
                   transition: 0.5s;
               }

               .nav a {
                   text-decoration: none;
               }

               .header {
                   width: 100%;
                   height: var(--header-height);
                   position: fixed;
                   top: 0;
                   left: 0;
                   display: flex;
                   align-items: center;
                   justify-content: space-between;
                   padding: 0 1rem;
                   background-color: var(--first-color);
                   z-index: var(--z-fixed);
                   transition: 0.5s;
               }

               .header_toggle {
                   color: var(--white-color);
                   font-size: 1.5rem;
                   cursor: pointer;
               }

               .header_img {
                   width: 35px;
                   height: 35px;
                   display: flex;
                   justify-content: center;
                   border-radius: 50%;
                   overflow: hidden;
               }

               .header_img img {
                   width: 40px;
               }

               .sign {
                   font-family: FontAwesome !important;
               }

               .l-navbar {
                   position: fixed;
                   top: 0;
                   left: -30%;
                   width: var(--nav-width);
                   height: 100vh;
                   background-color: var(--first-color);
                   padding: 0.5rem 1rem 0 0;
                   transition: 0.5s;
                   z-index: var(--z-fixed);
               }

               .nav {
                   height: 100%;
                   display: flex;
                   flex-direction: column;
                   justify-content: space-between;
                   overflow: hidden;
               }

               .nav_logo,
               .nav_link {
                   display: grid;
                   grid-template-columns: max-content max-content;
                   align-items: center;
                   column-gap: 1rem;
                   padding: 0.5rem 0 0.5rem 1.5rem;
               }

               .nav_logo {
                   margin-bottom: 2rem;
               }

               .nav_logo-icon {
                   font-size: 1.25rem;
                   color: var(--white-color);
               }

               .nav_logo-name {
                   color: var(--white-color);
                   font-weight: 700;
               }

               .nav_link {
                   position: relative;
                   color: var(--first-color-light);
                   margin-bottom: 1.5rem;
                   transition: 0.3s;
               }

               .nav_link:hover {
                   color: var(--white-color);
               }

               .nav_icon {
                   font-size: 1.25rem;
               }

               .show1 {
                   left: 0;
               }

               .body-pd {
                   padding-left: calc(var(--nav-width) + 1rem);
               }

               .active {
                   color: var(--white-color);
               }

               .active::before {
                   content: "";
                   position: absolute;
                   left: 0;
                   width: 2px;
                   height: 32px;
                   background-color: var(--white-color);
               }

               .height-100 {
                   height: 100vh;
               }

               @media screen and (min-width: 768px) {
                   body {
                       margin: calc(var(--header-height) + 1rem) 0 0 0;
                       padding-left: calc(var(--nav-width) + 2rem);
                   }

                   .header {
                       height: calc(var(--header-height) + 1rem);
                       padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
                   }

                   .header_img {
                       width: 40px;
                       height: 40px;
                   }

                   .header_img img {
                       width: 45px;
                   }

                   .l-navbar {
                       left: 0;
                       padding: 1rem 1rem 0 0;
                   }

                   .show1 {
                       width: calc(var(--nav-width) + 170px);
                   }

                   .body-pd {
                       padding-left: calc(var(--nav-width) + 188px);
                   }
               }
           </style>
       </head>

       <body id="body-pd">
           <header class="header" id="header">
               <div class="header_toggle"><i class="fa fa-bars" id="header-toggle"></i></div>
               <div class="header_img"><img src="../images/download.png" alt="" /></div>
           </header>
           <div class="l-navbar" id="nav-bar">
               <nav class="nav">
                   <div>
                       <a href="home-slider.php" class="nav_logo">
                           <img src="../images/logo/final-logo-footer.png" class="w-50" id="logo" alt="">
                       </a>
                       <div class="nav_list">
                           <a href="home-slider.php" class="nav_link active">
                               <i class='fa fa-home nav_icon'></i>
                               <span class="nav_name">Home-Slider</span>
                           </a>
                           <a href="products.php" class="nav_link">
                               <i class='fa fa-shopping-cart nav_icon'></i>
                               <span class="nav_name">Products</span>
                           </a>
                           <a href="categories.php" class="nav_link">
                               <i class='fa fa-bookmark nav_icon'></i>
                               <span class="nav_name">Categories</span>
                           </a>
                           <a href="new-release.php" class="nav_link">
                               <i class='fa fa-plus nav_icon'></i>
                               <span class="nav_name">New Release Products</span>
                           </a>
                       </div>
                   </div>
                   <a href="logout.php" class="nav_link">
                       <i class='fa fa-sign-out nav_icon sign'></i>
                       <span class="nav_name">SignOut</span>
                   </a>
               </nav>
           </div>

       </body>

       <script>
           document.addEventListener("DOMContentLoaded", function(event) {

               const showNavbar = (toggleId, navId, bodyId, headerId) => {
                   const toggle = document.getElementById(toggleId),
                       nav = document.getElementById(navId),
                       bodypd = document.getElementById(bodyId),
                       headerpd = document.getElementById(headerId)

                   // Validate that all variables exist
                   if (toggle && nav && bodypd && headerpd) {
                       toggle.addEventListener('click', () => {
                           // show navbar
                           nav.classList.toggle('show1')
                           // change icon
                           toggle.classList.toggle('fa-times')
                           // add padding to body
                           bodypd.classList.toggle('body-pd')
                           // add padding to header
                           headerpd.classList.toggle('body-pd')
                       })
                   }
               }

               showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

               /*===== LINK ACTIVE =====*/
               const linkColor = document.querySelectorAll('.nav_link')

               function colorLink() {
                   if (linkColor) {
                       linkColor.forEach(l => l.classList.remove('active'))
                       this.classList.add('active')
                   }
               }
               linkColor.forEach(l => l.addEventListener('click', colorLink))

               // Your code to run since DOM is loaded and ready
           });
       </script>
       </body>

       </html>