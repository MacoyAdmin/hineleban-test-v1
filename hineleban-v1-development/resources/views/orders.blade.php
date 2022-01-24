<?php 
$customerId = session('customerId');
?>
<!doctype html>
<html lang="en">
<x-head data="Contact Us | Hineleban Store"/>
  <body>
  <x-header data="faq"/>
  <div class="container" style="background:#f0f0f0">
    <div class="row">
        <h1 style="text-align:center;margin-top:100px"><strong>Orders</strong></h1>
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Transaction #</th>
                      <th>Mode of Delivery</th>
                      <th>Total Price</th>
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($transaction as $item)
                      @if($customerId == $item->customerid)
                    <tr>
                      <td>{{$item->transactionid}}</td>
                      <td>{{$item->transfer}}</td>
                      <td>₱ {{$item->totalPrice}}.00</td>
                      <td><span class="badge <?php if($item->jobstatusid!=5){echo "bg-primary";}?>"><?php
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

                      $sql = "SELECT joname FROM jobstatustbl where jobstatusid=$item->jobstatusid";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo $row['joname'];
                        }
                      } else {
                        echo "0 results";
                      }
                      $conn->close();
                  ?></span></td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    
</div>
  </div>
  <x-footer/>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>