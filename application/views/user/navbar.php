<!DOCTYPE html>
<html lang="en">
<head>
  <title>All in one Ecom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark hideinprint">
<a class="navbar-brand ml-4 mr-5 pr-5" href="<?=base_url()?>user/index" style="width:140px;color:#B66DFF;">All IN ONE ECOM</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item ml-3">
    <a class="nav-link" href="<?=base_url()?>user/index">Home</a>
  </li>
  <?php
  foreach($cat_list as $key=>$row){
  ?>
  <!-- Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle ml-3" href="#" id="navbardrop" data-toggle="dropdown">
      <?=$row['category_name']?>
    </a>
    <div class="dropdown-menu">
      <?php
      foreach($row['sub_cat_list'] as $row1){        
      ?>
      <a class="dropdown-item" href="<?=base_url()?>user/show_product_with_sub_category/<?=$row1['sub_category_id']?>"><?=$row1['sub_category_name']?></a>
      <?php
      }
      ?>
    </div>
  </li>
  <?php
  }
  if(!isset($_SESSION['user_id'])){
    ?>
      <li class="nav-item ml-3">
            <a class="nav-link" href="<?=base_url()?>user/login">Login</a>
      </li>
    <?php
  }
  else{
    ?>
    <li class="nav-item ml-3">
    <a class="nav-link" href="<?=base_url()?>user/profile">Profile</a>
  </li>
  <li class="nav-item ml-3">
    <a class="nav-link" href="<?=base_url()?>user/cart">Cart</a>
  </li>
  <li class="nav-item ml-3">
    <a class="nav-link" href="<?=base_url()?>user/my_orders">My Orders</a>
  </li>
  <li class="nav-item ml-3">
            <a class="nav-link" href="<?=base_url()?>user/logout">Logout</a>
      </li>
    <?php
  }
  ?>
    </ul>
  </div>
</nav>
