<form action="<?=base_url()?>admin/save_product" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Add Product : </h4>
            <span style="float:left;width:113px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-3 mb-3">
        <label class="mb-2">Category <span class="text-danger">*</span></label>
            <select class="form-control w-100 h-50" name="category_id" id="cat_id" onchange="getSubCategory()">
                <option value="" disabled required selected>Select Category</option>
            
            <?php
                foreach($cat_list as $row){
                ?>
                <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
                <?php
                }
            ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
        <label class="mb-2">Sub-Category <span class="text-danger">*</span></label>
            <select class="form-control w-100 h-50" id="sub_cat_id" name="sub_category_id" required>
                <option value="" >Select Sub-Category</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="mb-2">Product Name <span class="text-danger">*</span></label>
            <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="col-md-3 mb-3">
            <label class="mb-2">Product Price <span class="text-danger">*</span></label>
            <input type="number" name="product_price" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2">Product Image <span class="text-danger">*</span></label>
            <input type="file" name="product_image[]" class="form-control" required multiple>
        </div>
        
        <div class="col-md-5 mb-3">
            <label class="mb-2">Product Lable</label>
            <select name="product_lable" class="form-control w-100 h-50">
                <option value="" selected>No Lable</option>
                <option>Exclusive</option>
                <option>Featured</option>
                <option>Trending</option>
                <option>Best Seller</option>
                <option>Free Delevery</option>
                <option>Assured</option>
                <option>upto 10% off</option>
                <option>upto 20% off</option>
                <option>upto 30% off</option>
                <option>upto 40% off</option>
            <select>
        </div>
        <div class="col-md-12 mb-3">
            <label class="mb-2">Product Details</label>
            <textarea name="product_details" class="form-control"></textarea>
        </div>
        <div class="col-md-12 text-center">
            <button class="btn btn-primary">Save Product</button>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
    function getSubCategory(){
        // var cat_id = document.getElementById('cat_id').value;
        var cat_id = $('#cat_id').val();
        // alert(cat_id);
        $.ajax({
            url: '<?=base_url()?>admin/getSubCategoryByIdUsingAjax/'+cat_id,
            dataType: 'json'
        })
        .done(function(res){
            // console.log(res)/
            var row;
            for(i=0;i<res.length;i++){
                row += `<option value="${res[i].sub_category_id}">${res[i].sub_category_name}</option>`;
                // console.log(res[i].sub_category_id);
                // console.log(res[i].sub_category_name);
            }
            $('#sub_cat_id').html(row);
        })
    }
</script>