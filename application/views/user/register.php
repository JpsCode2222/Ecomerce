<form action="<?=base_url()?>user/registration_process" method="POST">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="p-3 border">
                <h2>Register Here</h2><br>
                <input required type="text" class="form-control" name="user_name" placeholder="Enter Name"><br>
                <input required type="number" class="form-control" name="user_mobile" placeholder="Enter Mobile"><br>
                <input required type="email" class="form-control" name="user_email" placeholder="Enter Email"><br>
                <input required type="password" class="form-control" id="pass1" onkeyup="checkPass()" name="user_password" placeholder="Enter Password"><br>
                <input required type="password" class="form-control" id="pass2" onkeyup="checkPass()" placeholder="Confirm Password">
                <span class="text-right text-danger" id="err_msg"></span><br>
                <button id="sub_btn" disabled class="btn btn-dark text-white">Register Now</button><br>
                Allready Account? <a href="<?=base_url()?>user/login">Login here</a>
            <br>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
function checkPass(){
    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();
    if(pass1.length > 5){
        if(pass1 == pass2){
            document.getElementById('sub_btn').removeAttribute('disabled');
            $('#err_msg').html(``);
        }
        else{
            document.getElementById('sub_btn').setAttribute('disabled','true');
            $('#err_msg').html(`Password doesn't match`);
        }
    }
    else{
        $('#err_msg').html('Password must be 6 character');

    }
}

</script>