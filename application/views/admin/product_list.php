<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Product List : </h4>
            <span style="float:left;width:110px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-12">
            <table class="table table-sm table-striped table-border">
                <tr>
                    <th>Sr.No</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Lable</th>
                    <th>Product Details</th>
                    <th>Product Image</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach($product_list as $key => $row){

                    ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$row['product_name']?></td>
                        <td><?=$row['product_price']?></td>
                        <td><?=$row['product_lable']?></td>
                        <td><?=$row['product_details']?></td>
                        <td>
                            <img src="<?=base_url().'uploads/'.$row['product_image']?>" style="height:100px;width:100px">
                        </td>
                        <td>
                        <a href="<?=base_url()?>admin/edit_product/<?=$row['product_id']?>">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-pen">Edit</i>
                                </button>
                            </a>
                            <a href="<?=base_url()?>admin/remove_product/<?=$row['product_id']?>">
                                <button type="button" class="btn btn-sm btn-danger">
                                    <i class="mdi mdi-delete">Delete</i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>