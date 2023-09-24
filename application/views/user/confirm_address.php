<form action="<?=base_url()?>user/place_order" method="POST">
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="shadow p-2 border">
    <h3 class="mb-4" style="color:#B66DFF">Confirm Address : </h3>
                Deliver To 
                <input type="text" name="deliver_to" class="form-control mb-3">
                State 
                <input type="text" name="state" class="form-control mb-3">
                District 
                <input type="text" name="district" class="form-control mb-3">
                City 
                <input type="text" name="city" class="form-control mb-3">
                Area 
                <input type="text" name="area" class="form-control mb-3">
                Pincode 
                <input type="text" name="pincode" class="form-control mb-3">
                <button class="btn btn-dark">Place Order</button>
            </div>
        </div>
    </div>
</div>
</form>
<br><br>