
<div id="demo" class="carousel slide" data-ride="carousel">
  
  <!-- The slideshow -->
  <div class="carousel-inner">
  <?php
    foreach($slider as $key => $row){
  ?>
    <div class="carousel-item <?=($key == 0) ? 'active' : ''?>">
      <img src="<?=base_url()?>uploads/<?=$row['slider_image']?>" height="300px" width="100%">
    </div>
    <?php
    }
    ?>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-4 mt-5 text-center">
            <h4 style="color:#B66DFF">Trending Products</h4>
        </div>
        <?php
        foreach($trending_products as $key => $row){
        ?>
        <div class="col-lg-3 col-md-4 col-6 mt-3 mb-3">
         <a href="<?=base_url()?>user/product_information/<?=$row['product_id']?>" style="color:black">
         <div class="card h-100 border-0">
          <div class="card-header bg-white">
            <?php
            // To find only fist image in muliple images 
            $fist_p_name = explode('&&',$row['product_image']);
            // print_r($fist_p_name);
            ?>
            <div  class="h-100 w-100 text-center">
            <img src="<?=base_url()?>uploads/<?=$fist_p_name[0]?>" style="height:200px;">
            </div>
          </div>
          <div class="card-body">
          <p class="text-bold h6"><?=$row['product_name']?></p>
          <p><mark><?=$trending_products[$key]['product_lable']?></mark><span class="h5">&#8377; <?= number_format($trending_products[$key]['product_price'])?></span></p>
          <p class="h6"></p>
          <!-- <p class="h6"><?= $trending_products[$key]['product_details']?></p> -->
          </div>
          </div>
        </a>
        </div>
        <?php
        }
        ?>
        <div class="col-md-12 mb-4 mt-5 text-center">
            <h4 style="color:#B66DFF">All Products</h4>
        </div>
         <?php
        foreach($all_products as $key => $row){
          ?>
          <div class="col-lg-3 col-md-4 col-6 mt-3 mb-3">
          <a href="<?=base_url()?>user/product_information/<?=$row['product_id']?>" style="color:black">
          <div class="card h-100 border-0">
            <div class="card-header bg-white">
              <?php
              // To find only fist image in muliple images 
              $fist_p_name = explode('&&',$row['product_image']);
              // print_r($fist_p_name);
              ?>
              <div  class="h-100 w-100 text-center">
              <img src="<?=base_url()?>uploads/<?=$fist_p_name[0]?>" style="height:200px;">
              </div>
            </div>
            <div class="card-body">
            <p class="text-bold h6"><?=$row['product_name']?></p>
            <p><mark><?=$trending_products[$key]['product_lable']?></mark><span class="h5">&#8377; <?= number_format($trending_products[$key]['product_price'])?></span></p>
            <p class="h6"></p>
            <!-- <p class="h6"><?= $trending_products[$key]['product_details']?></p> -->
            </div>
            </div>
          </a>
          </div>
          <?php
          }
        ?>
  </div>
</div>