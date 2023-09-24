<form action="<?=base_url()?>admin/update_sub_category/<?=$sub_cat_info[0]['sub_category_id']?>" method="POST">
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Edit Sub Category : </h4>
            <span style="float:left;width:160px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-3 mb-3">
            <select name="category_id" required class="form-control h-100 w-100">
                <option value="" selected disabled>Select Category</option>
                <?php
                foreach($cat_list as $row){
                    ?>
                    <option value="<?=$row['category_id']?>"  <?=($sub_cat_info[0]['category_id']==$row['category_id'] ? "selected" : "")?>><?=$row['category_name']?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <input type="text" name="sub_category_name" placeholder="Enter Sub Category Name" class="form-control" value="<?=$sub_cat_info[0]['sub_category_name']?>">
        </div>
        <div class="col-md-3 mb-3">
            <input type="text" name="status" placeholder="Enter Status" class="form-control" value="<?=$sub_cat_info[0]['status']?>">
        </div>
        <div class="col-md-3 mb-3">
            <button class="btn btn-sm btn-primary h-100 w-100">Update Sub Category</button>
        </div>
    </div>
</div>
</form>
