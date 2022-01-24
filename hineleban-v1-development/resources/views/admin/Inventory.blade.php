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
            <h1 class="m-0">Inventory</h1>
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
           
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Product Inventory</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Inventory #</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Batch Code</th>
                    <th>Received Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($inventory as $item)
                  <tr>
                    <td>{{$item->InventoryId}}</td>
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

                      $sql = "SELECT productname FROM productstbls where productid=$item->ProductId";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo $row['productname'];
                        }
                      } else {
                        echo "0";
                      }
                      $conn->close();
                  ?></td>
                    <td>{{$item->Quantity}}</td>
                    <td>{{$item->BatchCode}}</td>
                    <td>{{$item->ReceivedDate}}</td>
                  </tr>
                 @endforeach
                  </tfoot>
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
 <!-- jQuery -->
 <script src="/../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/../plugins/jszip/jszip.min.js"></script>
<script src="/../plugins/pdfmake/pdfmake.min.js"></script>
<script src="/../plugins/pdfmake/vfs_fonts.js"></script>
<script src="/../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
