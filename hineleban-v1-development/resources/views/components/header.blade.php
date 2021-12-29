<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="background:red;">
            <div class="container-fluid">
            <a class="navbar-brand" href="/">
                    <img src="{{URL::asset('/media/hineleban-logo.png')}}" alt="" width="170" height="40" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link {{$home}}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{$store}}" href="/store">Store</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{$contact}}" href="/contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{$tac}}" href="/tac">Terms & Condition</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{$faq}}" href="/faq">FAQs</a>
                    </li>
                </ul>
    
                @if(session('firstname') == '')
                
                <span class="navbar-text">
                <a class="nav-link" href="login" role="button">Login</a>
                </span>
                <span class="navbar-text">
                <a class="nav-link" href="register" role="button">Register</a>
                </span>
                @else
                <span class="navbar-text">
                <div class="btn-group">
                <a class="nav-link" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> Hello, {{session('lastname')}}, {{session('firstname')}}
<?php $userid = session('customerId') ?>
                </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="/users">Account</a></li>
                      <li><a class="dropdown-item" href="clientcart">My Cart <span class="badge bg-primary text-dark"><?php
                                $con=mysqli_connect("127.0.0.1","root","","hineleban_db");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }

                                $sql="SELECT cartid FROM carts where transactionid is null ORDER BY cartid";

                                if ($result=mysqli_query($con,$sql))
                                {
                                // Return the number of rows in result set
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                                // Free result set
                                mysqli_free_result($result);
                                }

                                mysqli_close($con);
                                ?>

</span></a></li>
                      <li><a class="dropdown-item" href="orders">Orders <span class="badge bg-primary"><?php
                                $con=mysqli_connect("127.0.0.1","root","","hineleban_db");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }

                                $sql="SELECT transactionid FROM transactiontbls where customerid=$userid and jobstatusid <> 4  ORDER BY transactionid";
                                
                                if ($result=mysqli_query($con,$sql))
                                {
                                // Return the number of rows in result set
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                                // Free result set
                                mysqli_free_result($result);
                                }

                                mysqli_close($con);
                                ?></span></a></li>
                      <li><a class="dropdown-item" href="orderhistory">Order History</a></li>
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
                </span>
                @endif
                </div>
            </div>
        </nav>
