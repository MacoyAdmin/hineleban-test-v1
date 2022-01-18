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
            <h1 class="m-0">Update User</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">  
          <form action="../../edituser" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="id" value="{{$data['UserId']}}" hidden>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Firstname</label>
                <input type="text" class="form-control" name="firstname" value="{{$data['FirstName']}}" placeholder="Firstname">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Lastname</label>
                <input type="text" class="form-control" name="lastname" value="{{$data['LastName']}}"  placeholder="Lastname">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username" value="{{$data['UserName']}}" placeholder="Email">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="password" value="{{$data['Password']}}" placeholder="Password">
              </div>
            </div>
           
            <div class="form-row">
               <div class="form-group col-md-4">
              <label for="inputAddress">Email Address</label>
              <input type="email" class="form-control" name="email" value="{{$data['EmailAddress']}}"  placeholder="test@test.com">
            </div>
              <div class="form-group col-md-4">
              <label for="inputState">User Role</label>
                <select name="role"  class="form-control" disabled>
                  <option value="{{$data['UserRole']}}">{{$data['UserRole']}}</option>
                </select>
              </div>
              <div class="form-group col-md-4">
              <label for="inputState">Active</label>
                <select name="active" class="form-control">
                  <option value="1" <?php echo $data['Active'] == "1" ? "selected" : "" ?>>Active</option>
                  <option value="0" <?php echo $data['Active'] == "0" ? "selected" : "" ?>>In-Active</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          
          
          </div>
          <div class="col-sm-4">
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputEmail4">Image</label>
                    <div class="col-xs-7">
                    <img src="/media/{{$data['resourcepath']}}" width="50%">
                    
                    </div>
                  <br>
                  <input type="file" class="form-control" name="file" value="{{$data['resourcepath']}}" placeholder="Firstname">
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
