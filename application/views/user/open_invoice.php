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
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-12 maxsize">
            <div class="shadow border maxsize p-5">
                <h2 style="color:#B66DFF" >A-Ecom</h2>
                <br>
                <h3><?=$order_det[0]['deliver_to']?></h3><br>
                <table class="table">
                    <tr>
                        <td>
                             Order Date : <?=date('d M Y',strtotime($order_det[0]['order_date']))?>
                             <br>
                             Order No : A00ZS14<?=$order_det[0]['order_id']?>
                        </td>
                        <td class="text-right">
                            <?=$order_det[0]['area']?>,
                            <?=$order_det[0]['city']?>,
                            <?=$order_det[0]['district']?>,<br>
                            <?=$order_det[0]['state']?> -
                            <?=$order_det[0]['pincode']?>
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
                    foreach($order_product as $row){
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
            <div class="text-center">
                <button class="btn btn-dark btn-lg hideinprint" onclick="print()">Print</button>
            </div>
        </div>
    </div>
</div>