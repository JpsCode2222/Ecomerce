<form action="<?=base_url()?>admin/save_slider" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h4 style="color:#B66DFF;">Manage Slider : </h4>
            <span style="float:left;width:130px;border:1px solid #B66DFF;"></span>
        </div>
        <div class="col-md-7 mb-3">
            <label class="mb-2">Slider Url <span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter url" name="slider_url" class="form-control" required>
        </div>
        <div class="col-md-5 mb-3">
            <label class="mb-2">Slider Image <span class="text-danger">*</span></label>
            <input type="file" name="slider_image" class="form-control bg-white" required>
        </div>
        <div class="col-md-12 mb-3 text-center">
            <button class="btn btn-primary">Save Slider</button>
        </div>
    </div>
</div>
</form>

<div class="row">
        <div class="col-md-12">
            <table class="table table-sm w-100 table-border table-striped">
                <tr>
                    <th>Sr.No</th>
                    <th>Slider URL</th>
                    <th>Slider Image</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach($slider as $key => $row){
                    ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$row['slider_url']?></td>
                        <td>
                            <img src="<?=base_url().'uploads/'.$row['slider_image']?>" style="width:100%;height:100%">
                        </td>
                        <td style="width:5%">
                            <a href="<?=base_url()?>admin/edit_slider/<?=$row['slider_id']?>">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-pen">Edit</i>
                                </button>
                            </a>
                            <a href="<?=base_url()?>admin/remove_slider/<?=$row['slider_id']?>">
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