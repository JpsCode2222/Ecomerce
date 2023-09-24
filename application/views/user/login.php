<form action="<?=base_url()?>user/login_process" method="POST">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="p-3 border">
                <h2>Login Here</h2><br>
                <input type="email" class="form-control" name="user_email" placeholder="Enter Email"><br>
                <input type="password" class="form-control" name="user_password" placeholder="Enter Password"><br>
                <button class="btn btn-dark text-white">Login Now</button><br>
                New user? <a href="<?=base_url()?>user/register">register here</a>
            <br>
            </div>
        </div>
    </div>
</div>
</form>