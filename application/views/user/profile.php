<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <div class="col-md-12 mt-5">
            <h3 class="mb-5" style="color:#B66DFF">Profile</h3>
            </div>
                <div class="col-2">
                    <img class="mt-4" src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png" width="100%">
                    <p class="text-center">Profile</p>
                </div>
                <div class="col-6 pl-4 mt-3">
                    <div class="mt-3">
                    <h5>Email :  <span class="h6"><?=$user[0]['user_email']?></span></h5>
                    <h5>Name :  <span class="h6"><?=$user[0]['user_name']?></span></h5>
                    <h5>Mobile :  <span class="h6"><?=$user[0]['user_mobile']?></span></h5>
                    <h5>User ID : <span class="h6"> <?=$_SESSION['user_id']?></span></h5>    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>