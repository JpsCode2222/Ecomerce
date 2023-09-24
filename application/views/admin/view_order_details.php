<style>
    @media print{
        .hideinprint{
            display: none;
        }
        .maxsize{
            display: block !important;
            width: 100% !important;
            box-shadow:none !important;
            border:0px !important;
        }
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 maxsize">
            <div class="shadow border bg-white maxsize p-5">
                <table class="table">
                    <tr>
                        <td class="text-left">
                            <h3>Deliver To : <?=$order_det[0]['deliver_to']?></h3>
                            <?=$order_det[0]['area']?>,
                            <?=$order_det[0]['city']?>,
                            <?=$order_det[0]['district']?>,<br> <br>
                            <?=$order_det[0]['state']?> -
                            <?=$order_det[0]['pincode']?>
                        </td>
                        <td class="text-right" style="vertical-align:middle;">
                             Order Date : <?=date('d M Y',strtotime($order_det[0]['order_date']))?>
                             <br><br>
                             Order No : A00ZS14<?=$order_det[0]['order_id']?>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="table">
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $ttl = 0;
                    foreach($order_products as $row){
                        $ttl += $row['product_price']*$row['qnt'];
                        ?>
                             <tr>
                             <td><?=$row['product_name']?></td>
                             <td><?=$row['qnt']?></td>
                             <td><?=$row['product_price']?></td>
                             <td>&#8377; <?=number_format($row['product_price']*$row['qnt'])?></td>
                            </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th colspan="3" class="text-left">Net Total</th>
                        <th>&#8377; <?=number_format($ttl)?></th>
                    </tr>
                </table>
                <br><br>
                <div class="text-center">
                    Copyright &copy; Jp's Tech
                </div>
            </div>
            <br><br>
        <div class="col-md-12 text-center mt-4">
            <?php
            if($order_det[0]['order_status'] == 'pending'){
                ?>
                <a href="<?=base_url()?>admin/dispatch_order/<?=$order_det[0]['order_id']?>">
                    <button class="btn btn-primary">Dispatch Order</button>
                </a>
                <a href="<?=base_url()?>admin/reject_order/<?=$order_det[0]['order_id']?>">
                  <button class="btn btn-danger">Reject Order</button>
                </a>
                <?php
            }
            if($order_det[0]['order_status'] == 'dispatched'){
                ?>
                <a href="<?=base_url()?>admin/deliver_order/<?=$order_det[0]['order_id']?>">
                    <button class="btn btn-primary">Deliver Order</button>
                </a>
                <a href="<?=base_url()?>admin/unable_to_deliver_order/<?=$order_det[0]['order_id']?>">
                  <button class="btn btn-danger">Unable to Deliver</button>
                </a>
                <?php
            }
            ?>
        </div>
        </div>
    </div>
</div>