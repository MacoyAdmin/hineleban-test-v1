<!DOCTYPE html>
<html lang="en">
<x-admin-head/>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{URL::asset('/media/hineleban-logo.png')}}" alt="Hineleban Logo">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link" target="_blank">Live Site View</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <x-admin-sidebar/>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
           
    <!-- /.card -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Product ID</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Unit</th>
                      <th>Price</th>
                      <th>MFG Date</th>
                      <th>EXP Date</th>
                      <th>isFeatured</th>
                      <th>Image</th>
                      <th style="width: 40px">Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $item)
                    <tr>
                      <td>{{$item->ProductId}}</td>
                      <td>{{$item->ProductName}}</td>
                      <td>{{$item->ProductDes}}</td>
                      <td>{{$item->Category}}</td>
                      <td>{{$item->Unit}}</td>
                      <td>{{$item->Price}}</td>
                      <td>{{$item->MfgDate}}</td>
                      <td>{{$item->Expiration}}</td>
                      <td>{{$item->isFeatured}}</td>
                      <td>@if($item->ResourcePath == null || $item->ResourcePath == '')
                        <img src="{{URL::asset('/media/noImg.png')}}" width="50%" alt="no image found">
                        @else
                        <img src="{{URL::asset('/media/'.$item->ResourcePath)}}" width="50%" alt="no image found">
                        @endif</td>
                        <?php 
                      if($item->Active == 1){
                        $badge ="bg-success";
                        $text = "YES";
                      }else{
                        $badge ="bg-danger";
                        $text = "NO";
                      }
                      ?>
                      <td><span class="badge {{$badge}}">{{$text}}</span</td>
                      <td><span class="badge bg-success"></span></td>
                      <td>
                      <div class="btn-group">
                      <a type="button" class="btn btn-warning btn-flat <?php if($item->isFeatured == 1){echo "disabled";}?>" href="./manageproduct/feature/{{$item->ProductId}}" <?php if($item->isFeatured == 1){echo "hidden";}?>>
                          <i class="fas fa-star"></i> Feature
                       </a>
                      <a type="button" class="btn btn-success btn-flat <?php if($item->Active == 1){echo "disabled";}?>" href="./manageproduct/enable/{{$item->ProductId}}" <?php if($item->Active == 1){echo "hidden";}?>>
                          <i class="fas fa-toggle-on"></i> Enable
                       </a>
                      <a type="button" class="btn btn-primary btn-flat" href="./manageproduct/update/{{$item->ProductId}}">
                          <i class="fas fa-edit"></i> Update
                       </a>
                       <a type="button" class="btn btn-danger btn-flat" href="./manageproduct/delete/{{$item->ProductId}}" <?php if($item->Active == 0){echo "hidden";}?>>
                          <i class="fas fa-trash"> </i> Remove
                       </a>
                      </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
       
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <x-admin-footer/>
</div>
<!-- ./wrapper -->


</body>
</html>
