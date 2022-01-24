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
            <h1 class="m-0">Update Existing Stocks</h1>
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
          <form action="../../../admin/editstock" method="post">
            @csrf
                <input type="text" name="id" value="{{$data['InventoryId']}}" hidden>
            <div class="form-group col-md-8">
                <label for="inputPassword4">Product Name</label>
                <input type="text" class="form-control" name="Product Name" placeholder="Batch Code" value="<?php
                  $servername = "127.0.0.1";
                  $username = "root";
                  $password = "";
                  $dbname = "hineleban_db";
                    $prodid= $data['InventoryId'];
                  // Create connection
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  // Check connection
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

                  $sql = "SELECT ProductName FROM productstbls where productid = $prodid ";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                          echo $row["ProductName"];
                    }
                  } else {
                    echo "0";
                  }
                  $conn->close();
              ?>" disabled required>
           
                  
                </select>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Quantity</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" min="1" step="1" value="{{$data['Quantity']}}" required>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Unit</label>
                    <input type="number" class="form-control" name="unit" placeholder="Unit" min="0.01" step=".01" value="{{$data['unit']}}" required>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Unit Type</label>
                    <input type="text" class="form-control" name="unit_type" placeholder="Unit Type" min="0.01" step=".01" value="{{$data['unit_type']}}"  required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Batch Code</label>
                    <input type="number" class="form-control" name="batch" placeholder="Batch Code" value="{{$data['BatchCode']}}"  required>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputPassword4">Date Recieved</label>
                    <input type="date" class="form-control" name="date_received" value="{{$data['ReceivedDate']}}" >
                  </div>
                  </div>
            
            <button type="submit" class="btn btn-primary">Update Stock</button>
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
