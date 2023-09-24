<form action="<?=base_url()?>admin/save_category" method="post">
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Category : </h4>
            <span style="float:left;width:85px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-9 mb-3">
            <input type="text" name="category_name" placeholder="Enter Category Name" class="form-control">
        </div>
        <div class="col-md-3 mb-3">
            <button class="btn btn-sm btn-primary h-100 w-100">Save Category</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-md-12 mb-3">
            <table class="table table-border table-sm table-striped">
            <tr>
                    <th>Sr.No</th>
                    <th>Category Name</th>
                    <th>Entry Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach($cat_list as $key => $row){
                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$row['category_name']?></td>
                        <td><?=$row['entry_date']?></td>
                        <td><?=$row['status']?></td>
                        <td style="width:5%">
                            <a href="<?=base_url()?>admin/edit_category/<?=$row['category_id']?>">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-pen">Edit</i>
                                </button>
                            </a>
                            <a href="<?=base_url()?>admin/remove_category/<?=$row['category_id']?>">
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