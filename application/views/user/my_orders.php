<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow p-4 border mb-4">
            <h3 class="mb-3" style="color:#B66DFF"> My Orders </h3>
            <?php
            foreach($orders as $row){
                ?>
                <a href="<?=base_url()?>user/open_invoice/<?=$row['order_id']?>" style="text-decoration:none;color:black;">
                <div class="row">
                    <div class="col-6">
                        <?=date('d M Y',strtotime($row['order_date']))?>
                    </div>
                    <div class="col-6 text-right">
                    &#8377; <?=number_format($row['total_amount'])?>
                    </div>
                    <div class="col-9 mt-2 mb-2" style="font-size:13px;text-trasform:capitalize">
                        <?=$row['state']?>,
                        <?=$row['district']?>,
                        <?=$row['city']?>,
                        <?=$row['area']?> -
                        <?=$row['pincode']?>
                    </div>
                    <?php
                    if($row['order_status'] == 'pending'){
                        $color = "blue";
                    }
                    else if($row['order_status'] == 'dispatched'){
                        $color = "brown";
                    }
                    else{
                        $color = "darkgreen";
                    }
                    ?>
                    <div class="col-3 text-right"  style="font-size:13px; color:<?=$color?>">
                    <?=$row['order_status']?> . . .
                    </div>
                </div>
                </a>
                <?php
            }
            ?>
        </div>
        </div>
    </div>
</div>