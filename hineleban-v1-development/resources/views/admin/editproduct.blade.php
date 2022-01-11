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
          <div class="col-sm-12">
          <img src="{{URL::asset('/media/hineleban-logo.png')}}" class="img-fluid mx-auto d-block" alt="Responsive image">
            <h1 class="m-0">Update Product</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <form action="../../editproduct" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$data['ProductId']}}" hidden>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Product Name</label>
                    <input type="text" class="form-control" name="productname" value="{{$data['ProductName']}}" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Product Description</label>
                    <textarea class="form-control" name="productdes" rows="3" required>{{$data['ProductDes']}}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    <label for="inputState">Category</label>
                        <select name="category" class="form-control">
                        <option value="{{$data['Category']}}" selected>{{$data['Category']}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                    <label for="inputState">IsFeatured </label>
                        <select name="IsFeatured" class="form-control">
                        <option value="0" <?php if($data['isFeatured'] == 0){echo "selected";}?>>False</option>
                        <option value="1" <?php if($data['isFeatured'] == 1){echo "selected";}?>>True</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Unit</label>
                        <input type="number" class="form-control" name="unit" placeholder="Unit" min="0.01" step=".01" value="{{$data['Unit']}}" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price" step=".01" min="0.01" value="{{$data['Price']}}" required>
                    </div>

                  
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Manufacturing Date</label>
                            <input type="date" class="form-control" name="mfgdate" value="{{$data['MfgDate']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Expiration Date</label>
                            <input type="date" class="form-control" name="expdate" value="{{$data['Expiration']}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                </div>
               
            </div>
            <div class="col-sm-4">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Image</label>
                            <div class="col-xs-7">
                            <img src="/media/{{$data['ResourcePath']}}" width="90%">
                            
                            </div>
                        <br>
                        <input type="file" class="form-control" name="file" value="{{$data['ResourcePath']}}">
                    </div>
                </div>
            </div>
            </form>
          </div>          <!-- /.col -->
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
