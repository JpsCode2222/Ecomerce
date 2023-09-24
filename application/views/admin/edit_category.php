<form action="<?=base_url()?>admin/update_category/<?=$cat_info[0]['category_id']?>" method="POST">
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Edit Category : </h4>
            <span style="float:left;width:124px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-5 mb-3">
            <label class="mb-2">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="category_name" value="<?=$cat_info[0]['category_name']?>" placeholder="Enter Category Name" class="form-control">
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2">Status <span class="text-danger">*</span></label>
            <input type="text" name="status" value="<?=$cat_info[0]['status']?>" placeholder="Enter Category Status" class="form-control">
        </div>
        <div class="col-md-3 mb-3">
            <br>
            <button class="btn btn-sm btn-primary h-75 w-100">Update Category</button>
        </div>
    </div>
</div>
</form>