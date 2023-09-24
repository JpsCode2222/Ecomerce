<br><br>
<div class="container">
    <div class="row">
    <div class="col-md-12">
            <h3 class="mb-5" style="color:#B66DFF">User Cart</h3>
        </div>
        <!-- <div class="col-md-2 text-right">
            <input type="checkbox" class="form-control d-inline-block w-25" onclick="checkAll(this)"><span style="display:inline-block;position:relative;top:-10px; padding:5px">Select All</span>
        </div> -->
        <div class="col-md-8">
        <?php
        $ttl = 0;
        foreach($cart_info as $row){
            $ttl += ($row['product_price']*$row['qnt']);
        ?>
        <div class="row">
            <div class="col-md-4 col-5" style="margin-top:-10px">
                <img class="w-50" src="<?=base_url()?>uploads/<?=explode('&&',$row['product_image'])[0]?>">
            </div>
            <div class="col-md-7 col-6 mb-2">
                <h5><?=$row['product_name']?></h5>
                <span>&#8377; <?=number_format($row['product_price'])?>/-</span>
                <button type="button" class="btn btn-dark text-white border-0" style="margin-top:-6px" onclick="decreaseQnt('<?=$row['product_id']?>')"> -</button>
                <input type="text" id="product_qnt_box<?=$row['product_id']?>" disabled class="form-control w-25 border-0 d-inline-block bg-light text-center" value="<?=$row['qnt']?>">
                <button type="button" class="btn btn-dark text-white border-0" style="margin-top:-6px" onclick="increaseQnt('<?=$row['product_id']?>')">+</button>
            </div>
            <div class="col-md-1 col-2">
                <a href="<?=base_url()?>user/removeFromCart/<?=$row['product_id']?>">
                    <button class="btn btn-danger mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash-fill" viewBox="0 0 16 16"> <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/> </svg>
                    </button>
                </a>
                <!-- <input type="checkbox" value="<?=$row['product_id']?>" name="product_id[]" class="chkbox form-control"> -->
            </div>
        </div>
        <hr>
            <?php
        }
        ?>
        <!-- <div class="row">
            <div class="col-9"></div>
            <div class="col-3 text-right">
                <button class="btn btn-danger">Remove</button>
            </div>
        </div> -->
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="border shadow p-3">
               <table class="table table-border table-striped">
               <tr>
                    <td>Sub Total</td>
                    <td>&#8377; <?=number_format($ttl)?>/-</td>
                </tr>
                <tr>
                    <td>Charges</td>
                    <td>&#8377; 0 /-</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>&#8377;<?=number_format($ttl)?>/-</th>
                </tr>
               </table>
                <a href="<?=base_url()?>user/confirm_address">
                    <button class='btn btn-dark w-100' type='button'>Proceed to Checkout</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  
    // increase Qnt
    function increaseQnt(product_id){
        $.ajax({
            url:'<?=base_url()?>user/increaseQnt/'+product_id,
            dataType:'json'
        })
        .done(function(res){
            console.log('success',res);
            document.getElementById('product_qnt_box'+product_id).value = res;
        })
    }

        // decrease Qnt
        function decreaseQnt(product_id){
        $.ajax({
            url:'<?=base_url()?>user/decreaseQnt/'+product_id,
            dataType:'json'
        })
        .done(function(res){
            console.log('success',res);
            document.getElementById('product_qnt_box'+product_id).value = res;
        })
    }
</script>

<script type="text/javascript">
    //     // Check All
    //     function checkAll(ele){
    //     var boxes = document.getElementsByClassName('chkbox');
    //     for(i=0;i<boxes.length;i++){
    //         boxes[i].checked = ele.checked; 
    //     }
    // }
</script>