<?php
// Get all list of images in silge row and divide it usnig expload 
// print_r($product_info);
$p_images = explode('&&',$product_info[0]['product_image']);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 p-3">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <?php
                    foreach($p_images as $key => $row){
                        ?>
                        <!--
                            logic for click functionality 
                             onclick="getImage('<base_url()/??>uploads/</?=$row?>'  onclick="getImage('</?=base_url()?>uploads/</?=$row?>')")"
                         -->
                        <img src="<?=base_url()?>uploads/<?=$row?>" style="width:100%" class="p-1" onclick="getImage('<?=$key?>')">
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-9">
                    <img id="full_img" src="<?=base_url()?>uploads/<?=$p_images[0]?>" width="100%" class="pt-2">
                </div>
            </div>
        </div>
        <div class="col-md-6 p-4">
                 <?php
                    if($product_info[0]['product_lable']){
                        ?>
                        <div style="display:inline-block;padding:2px;padding-left:30px;padding-right:30px;background-image:linear-gradient(50deg,white 0%,white 15%,black 15%,black 85%,white 85%);color:#B66DFF;">
                    <?=$product_info[0]['product_lable']?>
                    </div>
                        <?php
                    }
                    ?>
            <h1><?=$product_info[0]['product_name']?></h1>
            <p style="font-weight:100px;font-size:40px;letter-spacing:4px">&#8377; <?=number_format($product_info[0]['product_price'])?> /-</p>
            <?php
            if(count($cart) == 0){
                ?>
                 <a href="<?=base_url()?>user/add_to_cart/<?=$product_info[0]['product_id']?>">
                    <button style="color:white;border-radius:0;" class="btn btn-dark btn-lg">
                    <svg style="position:relative;top:-3px" xmlns="http://www.w3.org/2000/svg" fill="white" width="24" height="24" viewBox="0 0 24 24"><path d="M10 21.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.305-15l-3.432 12h-10.428l-3.777-9h-2.168l4.615 11h13.239l3.474-12h1.929l.743-2h-4.195zm-13.805-4c6.712 1.617 7 9 7 9h2l-4 4-4-4h2s.94-6.42-3-9z"/></svg>    
                    Add To Cart
                    </button>
                </a>
                <?php
            }
            else{
                ?>
                <button class="btn btn-dark text-white border-0" style="margin-top:-6px" onclick="decreaseQnt('<?=$product_info[0]['product_id']?>')"> -</button>
                <input type="text" id="product_qnt_box<?=$product_info[0]['product_id']?>" disabled class="form-control w-25 border-0 d-inline-block bg-light text-center" value="<?=$cart[0]['qnt']?>">
                <button class="btn btn-dark text-white border-0" style="margin-top:-6px" onclick="increaseQnt('<?=$product_info[0]['product_id']?>')">+</button>
                <?php
            }
            ?>
            <br><br>
           <!-- Use for just like pre tag -nl2br -->
            <p><?=nl2br($product_info[0]['product_details'])?></p>
        </div>
    </div>
</div>

<script type="text/javascript">
    // // Logic for change image using click functionality
    // function getImage(path){
    //     document.getElementById('full_img').src = path;
    // }

    // Logic for carosel the images automatic
    var img = '<?=$product_info[0]['product_image']?>';
    img = img.split('&&');
    var i = 0;
    var inter = setInterval(function(){
        i++;
        getImage(i%img.length,false);
    },2000);
    function getImage(index,ci=true){
        document.getElementById('full_img').src = '<?=base_url()?>uploads/'+img[index];
        if(ci)
            clearInterval(inter);
    }

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