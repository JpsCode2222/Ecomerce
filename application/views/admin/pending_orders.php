<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Pending Orders : </h4>
            <span style="float:left;width:110px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-border">
                <tr>
                    <th>Action</th>
                    <th>SN</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Order From</th>
                    <th>Address</th>
                    <th>Ammount</th>
                </tr>
                <?php
                foreach($orders as $key => $row){
                    ?>
                    <tr>
                        <td>
                            <a href="<?=base_url()?>admin/view_order_details/<?=$row['order_id']?>">
                            <button class="btn btn-sm btn-primary ">View</button>
                            </a>
                        </td>
                        <td><?=$key+1?></td>
                        <td>A00ZS14<?=$row['order_id']?></td>
                        <td><?=date('d M Y',strtotime($row['order_date']))?></td>
                        <td><?=$row['user_name']?></td>
                        <td style="white-space:normal"><?=$row['deliver_to']." , ".$row['area']." , ". $row['city'] ." , ". $row['district']." , ". $row['state']." - ". $row['pincode']?></td>
                        <td><b>&#8377; <?=number_format($row['total_amount'])?></b></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>    