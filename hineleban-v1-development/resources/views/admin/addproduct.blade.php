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

    <!-- Right navbar links -->

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
            <h1 class="m-0">Add New Product</h1>
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
           
          <form action="./addproduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-8">
                <label for="inputPassword4">Product Name</label>
                <input type="text" class="form-control" name="productname" placeholder="Product Name">
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4">Product Description</label>
                <textarea class="form-control" name="productdes" rows="3"></textarea>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-2">
                  <label for="inputState">Category</label>
                    <select name="category" class="form-control">
                      <option>Whole Bean</option>
                      <option selected>Ground Bean</option>
                      <option selected>NONE</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                  <label for="inputState">IsFeatured </label>
                    <select name="IsFeatured" class="form-control">
                      <option value="0">False</option>
                      <option value="1" selected>True</option>
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Unit</label>
                    <input type="number" class="form-control" name="unit" placeholder="Unit" min="0.01" step=".01">
                  </div>

                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" step=".01" min="0.01">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputPassword4">Manufacturing Date</label>
                    <input type="date" class="form-control" name="mfgdate">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputPassword4">Expiration Date</label>
                    <input type="date" class="form-control" name="expdate" >
                  </div>
              </div>
                  <div class="mb-3 col-md-4">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" name="file">
          </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
   
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
