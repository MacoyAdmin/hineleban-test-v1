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
            <h1 class="m-0">Manage User</h1>
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
                <h3 class="card-title">List of User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Employee ID</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Password</th>
                      <th style="width: 40px">Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->UserId}}</td>
                      <td>{{$user->EmailAddress}}</td>
                      <td>{{$user->UserName}}</td>
                      <td>{{$user->UserRole}}</td>
                      <?php 
                      if($user->Active == 1){
                        $badge ="bg-success";
                        $text = "YES";
                      }else{
                        $badge ="bg-danger";
                        $text = "NO";
                      }
                      ?>
                      <td> <div class="collapse" id="collapseExample{{$user->UserId}}">
                        <div class="card card-body">
                        {{$user->Password}}
                        </div>
                      </div></td>
                      <td><span class="badge {{$badge}}">{{$text}}</span></td>
                      <td>
                      <div class="btn-group">
                        <a type="button" class="btn btn-warning btn-flat" data-toggle="collapse" data-target="#collapseExample{{$user->UserId}}" aria-expanded="false" aria-controls="collapseExample">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-primary btn-flat" href="./manageuser/update/{{$user->UserId}}">
                          <i class="fas fa-edit"></i>
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
