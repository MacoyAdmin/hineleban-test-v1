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
            <h1 class="m-0">Manage Transaction</h1>
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
              
          <form action="../../../admin/edittransaction" method="post">
            @csrf
            <input type="text" class="form-control" name="tid" value="{{$data['transactionid']}}" hidden>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Transaction ID</label>
                <input type="text" class="form-control" name="transactionid" value="{{$data['transactionid']}}" disabled>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Mode of Payment</label>
                    <select class="form-control" name="mop" required>
                        <option value="" disabled selected>Please Select ...</option> 
                        <option value="bank" <?php if($data['mop'] == "bank") { echo 'selected';}?>>Bank Transfer</option> 
                        <option value="GCASH" <?php if($data['mop'] == "GCASH") { echo 'selected';}?>>GCASH</option> 
                        <option value="remittance" <?php if($data['mop'] == "remittance") { echo 'selected';}?>>Remittance</option> 
                        </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Mode of Transfer</label>
                    <select class="form-control" name="mot">
                        <option value="" <?php if($data['transfer'] == "" || $data['transfer'] == null) { echo 'selected';}?> disabled>Please Select ...</option> 
                        <option value="pickup" <?php if($data['transfer'] == "pickup") { echo 'selected';}?>>Store Pick Up</option> 
                        <option value="graborlalamove" <?php if($data['transfer'] == "graborlalamove") { echo 'selected';}?>>Grab or LalaMove</option> 
                        <option value="lbc" <?php if($data['transfer'] == "lbc") { echo 'selected';}?>>LBC</option> 
                        </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Job Status</label>
                    <select class="form-control" name="jobstat">
                        <option value="" disabled>Please Select ...</option> 
                        <option value="1" <?php if($data['jobstatusid'] == 1) { echo 'selected';}?>>Pending Approval</option> 
                        <option value="2" <?php if($data['jobstatusid'] == 2) { echo 'selected';}?>>Approved</option> 
                        <option value="3" <?php if($data['jobstatusid'] == 3) { echo 'selected';}?>>Preparing</option> 
                        <option value="4" <?php if($data['jobstatusid'] == 4) { echo 'selected';}?>>Customer Received</option> 
                        <option value="5" <?php if($data['jobstatusid'] == 5) { echo 'selected';}?>>Rejected</option> 
                        </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Customer ID</label>
                    <input type="text" class="form-control" name="customerid" value="{{$data['customerid']}}" disabled>
                    <input type="text" class="form-control" name="customerid" value="{{$data['customerid']}}" hidden>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputPassword4">Total</label>
                    <input type="text" class="form-control" name="total" value="₱ {{$data['totalPrice']}}.00" disabled>
                  </div>
                  </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
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
