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
          <div class="col-sm-6">
            <h1 class="m-0">Manage Order</h1>
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
                      <th style="width: 10px">Transaction ID</th>
                      <th>Mode of Payment</th>
                      <th>Mode of Transfer</th>
                      <th>Total Price</th>
                      <th>Job Status</th>
                      <th>Customer ID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($jo as $order)
                    <tr>
                    <td># {{$order->transactionid}}</td>
                    <td>{{$order->mop}}</td>
                    <td>{{$order->transfer}}</td>
                    <td>₱ {{$order->totalPrice}}.00</td>
                    <td><?php
                      $servername = "127.0.0.1";
                      $username = "root";
                      $password = "";
                      $dbname = "hineleban_db";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }

                      $sql = "SELECT joname FROM jobstatustbl where jobstatusid=$order->jobstatusid";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo $row['joname'];
                        }
                      } else {
                        echo "0";
                      }
                      $conn->close();
                  ?></td>
                    <td>{{$order->customerid}}</td>
                    <td>
                    <div class="btn-group">
                    <a type="button" class="btn btn-warning btn-flat" href="./vieworder/{{$order->transactionid}}">
                          <i class="fas fa-eye"></i> View Order
                       </a>

                      <a type="button" class="btn btn-primary btn-flat" href="./manageorder/update/{{$order->transactionid}}">
                          <i class="fas fa-edit"></i> Manage
                       </a>
                       @if($order->jobstatusid == 5)
                       <a type="button" class="btn btn-danger btn-flat" href="./manageorder/reject/{{$order->transactionid}}" hidden>
                          <i class="fas fa-trash"> </i> Rejected
                       </a>
                       @else
                       <a type="button" class="btn btn-danger btn-flat" href="./manageorder/reject/{{$order->transactionid}}">
                          <i class="fas fa-trash"> </i> Rejected
                       </a>
                       @endif
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
