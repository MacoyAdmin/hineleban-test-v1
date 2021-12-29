<?php 
$sum_tot_Price = 0;
$transactionid = session('transactionid');
?>
<!doctype html>
<html lang="en">
<x-head data="Contact Us | Hineleban Store"/>
  <body>
  <x-header data="faq"/>
  <div class="container" style="background:#f0f0f0">
    <div class="row">
    <h1 style="text-align:center;margin-top:100px"><strong>Order Summary</strong></h1>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Hineleban Farm.
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Summit One Tower</strong><br>
                    23rd Floor, 530 Shaw Blvd<br>
                    Mandaluyong, PH<br>
                    Phone: (804) 123-5432<br>
                    Email: info@hineleban.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{session('firstname')}},{{session('lastname')}} </strong><br>
                    {{session('street')}} {{session('brgy')}}<br>
                    {{session('province')}}, {{session('city')}} {{session('zip')}}<br>
                    Phone: {{session('contactno')}}<br>
                    Email: {{session('emailaddress')}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #000{{session('transactionid')}}</b><br>
                  <br>
                  <b>Transaction ID:</b> {{session('transactionid')}}<br>
                  <b>Transaction Date:</b> {{$ldate = date('Y-m-d H:i:s');}}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Cart #</th>
                      <th>Price</th>
                      <th>Date Added</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                    @if(session('customerId') == $item->customerId && $item->transactionid == 0 )
                    <tr>
                      <td>{{$item->Quantity}}</td>
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

                      $sql = "SELECT productname FROM productstbl where productid=$item->ProductId";
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
                  ?></td>
                      <td>{{$item->CartId}}</td>
                      <td>₱ {{$item->Price}}.00</td>
                      <?php $sum_tot_Price += $item->Price ?>
                      <td>{{$item->created_at}}</td>
                    </tr>
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

                        $sql = "UPDATE carts SET transactionid=$transactionid WHERE transactionid is null";

                        if ($conn->query($sql) === TRUE) {
                        echo "<script>console.log('success')</script>";
                        } else {
                        echo "Error updating record: " . $conn->error;
                        }

                        $conn->close();
                        ?>
                    @endif
                  @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Send transaction slip via Viber or Whatsapp to Mitch 09175149736
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Payable Until : <?php
$stop_date = $ldate = date('Y-m-d H:i:s');
$stop_date = date('Y-m-d', strtotime($stop_date . ' +5 day'));
echo $stop_date;
?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>₱ {{$sum_tot_Price}}.00</td>
                      </tr>
                      <tr>
                        <th>Base Shipping Price:</th>
                        <td>₱150.00</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>₱ {{$sum_tot_Price + 150}}.00</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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