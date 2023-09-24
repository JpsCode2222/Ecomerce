<?php
if(isset($_SESSION['pop_msg'])){
    ?>
    <div id="pop_up" style="position:fixed;z-index:99999;top:60px;right:50px;background-color:yellowgreen;padding:10px;">
    <?=$_SESSION['pop_msg']?>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
            $("#pop_up").fadeOut(2000);
            },2000);
        });
    </script>
    <?php
unset($_SESSION['pop_msg']);
}
?>
<?php
if(isset($_SESSION['err_msg'])){
    ?>
    <div id="pop_up" style="position:fixed;z-index:99999;top:60px;right:50px;background-color:red;padding:10px;">
    <?=$_SESSION['err_msg']?>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
            $("#pop_up").fadeOut(2000);
            },2000);
        });
    </script>
    <?php
unset($_SESSION['err_msg']);
}
?>
</body>
</html>