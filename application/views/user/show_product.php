<div class="container mt-5">
    <h3 class="mb-5" style="color:#B66DFF"><?=$category_name[0]['sub_category_name']?> : </h3>
    <div class="row">
        <?php
        foreach($product_info as $key => $row){
            ?>
            <div class="col-lg-3 col-md-4 col-6">
         <a href="<?=base_url()?>user/product_information/<?=$row['product_id']?>" style="color:black">

                    <div class="card border-0">
                        <div class="card-header bg-white">
                            <img src="<?=base_url()?>uploads/<?=explode('&&',$row['product_image'])[0]?>" style="height:200px; width:100%" alt="">
                        
                        </div>
                        <div class="card-body">
                            <h4><?=$row['product_name']?></h4>
                            <mark><?=$row['product_lable']?></mark>
                            <h4>&#8377;<?=number_format($row['product_price'])?></h4>
                            <div class="w-100 text-center">
                            <button class="btn mt-3 btn-dark text-white text-right">Add To Cart</button>
                            </div>
                        </div>
                    </div>
        </a>
             </div>
            <?php
        }
        ?>
    </div>
</div>