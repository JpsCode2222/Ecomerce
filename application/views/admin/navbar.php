<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecom Admin</title>
    <link rel="stylesheet" href="<?=base_url()?>admin_assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>admin_assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url()?>admin_assets/css/style.css">
    <link rel="shortcut icon" href="<?=base_url()?>admin_assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="<?=base_url()?>admin"><img src="<?=base_url()?>admin_assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="<?=base_url()?>admin"><img src="<?=base_url()?>admin_assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
          <li class="nav-item active">
              <a class="nav-link" href="<?=base_url('admin')?>" style="cursor:default">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false" aria-controls="orders">
                <span class="menu-title">Manage Orders</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="orders">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/pending_orders">Pending Orders</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/dispatched_orders">Dispatch Orders</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/delivered_orders">Delivered Orders</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/rejected_orders">Rejected Orders</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#cat" aria-expanded="false" aria-controls="cat">
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="cat">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/category">Manage category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/sub_category">Sub category</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/add_product">Add product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>admin/product_list">Product List</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('admin/manage_slider')?>" style="cursor:default">
                <span class="menu-title">Manage Slider</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">