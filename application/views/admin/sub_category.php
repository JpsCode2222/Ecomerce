<form action="<?=base_url()?>admin/save_sub_category" method="post">
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Sub Category : </h4>
            <span style="float:left;width:120px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-3 mb-3">
            <select name="category_id" required class="w-100 h-100 form-control">
                <option value="" selected disabled>Select Category</option>
                <?php
                foreach($cat_list as $row){
                    ?>
                    <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <input type="text" name="sub_category_name" placeholder="Enter Sub Category Name" class="form-control">
        </div>
        <div class="col-md-3 mb-3">
            <button class="btn btn-sm btn-primary h-100 w-100">Save Sub Category</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm w-100 table-border table-striped">
                <tr>
                    <th>Sr.No</th>
                    <th>Category Name</th>
                    <th>Sub-Category Name</th>
                    <th>Entry Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach($sub_cat_list as $key => $row){
                    ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$row['category_name']?></td>
                        <td><?=$row['sub_category_name']?></td>
                        <td><?=$row['entry_date']?></td>
                        <td><?=$row['status']?></td>
                        <td style="width:5%">
                            <a href="<?=base_url()?>admin/edit_sub_category/<?=$row['sub_category_id']?>">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-pen">Edit</i>
                                </button>
                            </a>
                            <a href="<?=base_url()?>admin/remove_sub_category/<?=$row['sub_category_id']?>">
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
</form>