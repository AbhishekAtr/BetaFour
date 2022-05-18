
<?php
include 'include/css-url.php';
include('partials/header.php');
 ?>
 <div id="confirmBox">
  <p>Are You Sure to Delete ?</p>
  <button value="1" >Yes</button><button value="0">No</button>
 </div>
<div id="alertBox">mhvmbvbm</div>
<div class="container-fluid">
  <div class="row">
      <div class="col-sm-2">
 <?php include('partials/sidebar.php'); ?>
      </div>
      <div class="col-sm-10">
        <div id="dynamic-page">
          <!--dynamic page content-->
          <?php
    
  
        
        if(!empty($cat) && !empty($subcat)){
          
            
            $sub=explode('-', $subcat);
if($sub[0]=='add')
{
           $val=[];
          foreach ($sub as $key => $value) {
            if($value==$sub[0])
            {
             continue;
            }
            $val[]=$value;
            
         }
        
      include($cat."/".implode('-',$val).".php");   
 }else{
  include($cat."/".$subcat.".php");
 }
 
        }else{
            echo "<h1 class='text-success text-center'>Welcome To Admin Panel</h1>";
        }

         ?> 
          <!-- dynamic page content-->
        </div>
        
      </div>
  </div>
  </div>

  

<?php include 'include/js-url.php'; ?>