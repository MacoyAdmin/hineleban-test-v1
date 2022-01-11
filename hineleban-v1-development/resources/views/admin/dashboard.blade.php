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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
                                $con=mysqli_connect("127.0.0.1","root","","hineleban_db");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }

                                $sql="SELECT cartid FROM carts";

                                if ($result=mysqli_query($con,$sql))
                                {
                                // Return the number of rows in result set
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                                // Free result set
                                mysqli_free_result($result);
                                }

                                mysqli_close($con);
                                ?></h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="./manageorder" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
                                $con=mysqli_connect("127.0.0.1","root","","hineleban_db");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }

                                $sql="SELECT transactionid FROM transactiontbls where jobstatusid=2";

                                if ($result=mysqli_query($con,$sql))
                                {
                                // Return the number of rows in result set
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                                // Free result set
                                mysqli_free_result($result);
                                }

                                mysqli_close($con);
                                ?></h3>

                <p>Approved Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                                $con=mysqli_connect("127.0.0.1","root","","hineleban_db");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }

                                $sql="SELECT transactionid FROM transactiontbls where jobstatusid=1";

                                if ($result=mysqli_query($con,$sql))
                                {
                                // Return the number of rows in result set
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                                // Free result set
                                mysqli_free_result($result);
                                }

                                mysqli_close($con);
                                ?></h3>

                <p>Pending Approval</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php
                                $con=mysqli_connect("127.0.0.1","root","","hineleban_db");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }

                                $sql="SELECT cartid FROM carts where isReturned=1";

                                if ($result=mysqli_query($con,$sql))
                                {
                                // Return the number of rows in result set
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                                // Free result set
                                mysqli_free_result($result);
                                }

                                mysqli_close($con);
                                ?></h3>

                <p>Returned order</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
        </div>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
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

                      $sql = "SELECT * FROM carts ORDER BY cartid DESC
                      LIMIT 10";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          if($row['isReturned']==1)
                          {
                            $return = 'Return';
                            $badge = 'badge-danger';
                          }
                          else
                          {
                            $return = 'On-Going';
                            $badge = 'badge-success';
                          }
                          echo '<tr>
                          <td>'.$row['CartId'].'</td>
                          <td>'.getProductName($row['ProductId']).'</td>
                          <td>'.$row['Quantity'].'</td>
                          <td>₱'.$row['Price'].'.00</td>
                          <td><span class="badge '.$badge.'">'. $return.'</span></td>
                          </tr>';
                         
                        }
                      } else {
                        echo "0 results";
                      }
                      $conn->close();
                      function getProductName($productId){
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
  
                        $sql = "SELECT productname FROM productstbls where productid=$productId";
                        
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            return $row['productname'];
                           
                          }
                        } else {
                          echo "0 results";
                        }
                        $conn->close();
                      }
                  ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($products as $item)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{URL::asset('/media/'.$item->ResourcePath)}}"  alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php
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
                        echo "0 results";
                      }
                      $conn->close();
                  ?>
                        <span class="badge badge-warning float-right">{{$item->Price}}</span></a>
                      <span class="product-description">
                      {{$item->ProductDes}}
                      </span>
                    </div>
                  </li>
                    @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
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
