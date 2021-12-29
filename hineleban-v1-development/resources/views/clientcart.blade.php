<?php 
$sum_tot_Price = 0;
$orderid = array();
?>

<!doctype html>
<html lang="en">
<x-head data="Cart | Hineleban Store"/>
  <body>
  <x-header data="cart"/>
  <div class="container">
    <div class="row">
    <h1 style="text-align:center;margin-top:100px">Shopping Bag</h1>
    <div class="col-sm-12">
   
        <br>
        <br>

    </div>
    
@foreach($cart as $item)
@if(session('customerId') == $item->customerId && $item->transactionid == 0 )
<?php $respath; ?>
<div class="col-sm-10">
  <div class="card mb-3" style="background:#f0f0f0">
            <div class="row g-0" >
                <div class="col-sm-2" style="width:30px;margin-top:100px">
                </div>        
              <div class="col-md-4">
              <div class="container-fluid">
                
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

                      $sql = "SELECT resourcepath FROM productstbl where productid=$item->ProductId";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          $respath = $row['resourcepath'];
                        }
                      } else {
                        echo "0 results";
                      }
                      $conn->close();
                  ?>
                <img src="{{URL::asset('/media/'.$respath)}}"  class="img img-fluid" alt="..." style="margin-top:20px;width:50%;height:auto">
                
              </div>
              </div>
              <div class="col-md-6">
                <div class="card-body">
                <a href="#" style="float:right">
                <i class="nav-icon fas fa-times"></i>
              </a>
                  <h3 class="card-title">
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
                  ?>
                  </h3>
                  
                  <h5 class="card-text" style="color:#FFA500">₱{{$item->Price}}.00</h5><br>
                  <?php $sum_tot_Price += $item->Price ?>
                  <div class="row">
                      <div class="col-sm-2">
                      <p>Quantity</p>
                      <input type="number" class="form-control" min="1" value="{{$item->Quantity}}"><br>
                      </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
  </div>
@endif
@endforeach
        </div>
    </div>     
    </div>
  </div>
  <form action="clientcart" method="POST">
    @csrf
  <div class="container">
    <div class="row">
  
        <div class="col-sm-2">
            <h5>Subtotal  </h5>
        </div>
        <div class="col-sm-4">
          <h5 style="color:#FFA500">₱ {{$sum_tot_Price}}.00</h5>
          <input type="text" name="totalPrice" value="{{$sum_tot_Price}}" hidden/>
          <input type="text" name="customerId" value="{{$item->customerId}}" hidden/>
        </div>
        <div class="col-sm-2">

        </div>
        <div class="col-sm-4">
          
        </div>
        <br>

<hr/>

        <div class="col-sm-2">
                    <h5>Shipping  </h5>
                </div>
                <div class="col-sm-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="transfer" id="exampleRadios1" value="graborlalamove" checked>
                  <label class="form-check-label" for="exampleRadios1">
                  Grab or Lalamove. Payment fee to be covered by client upon delivery
                  </label>
                </div>
                <br>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="transfer" id="exampleRadios2" value="lbc">
                  <label class="form-check-label" for="exampleRadios2">
                  LBC 3-4 Days Lead Time(<strong>Cash On Delivery</strong>)
                  </label>
                </div>
                <br>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="transfer" id="exampleRadios3" value="pickup">
                  <label class="form-check-label" for="exampleRadios3">
                  Pick up at Summit One Tower 23rd Floor, 530 Shaw Blvd, Mandaluyong. M-F, 11am to 4pm.
                  </label>
                </div>
                <br>
                
                </div>
                <div class="col-sm-2">
                    
                </div>
                <div class="col-sm-4">
                  
                </div>
          <br>
                <hr/>

                <div class="col-sm-2">
                    <h5>Payment Method  </h5>
                </div>
                <div class="col-sm-4">
                <div class="form-check">
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   Online Bank Transfer/Payment
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                  <p><strong>BPI Lapasan, CDO</strong><br>
                  <strong>Account Name:</strong>  KALUGMANAN AGRI-DEV<br>
                  <strong> Account # : </strong>2171-0161-61</p>
                    <p><strong>Metrobank Lapasan, CDO</strong><br>
                    <strong> Account Name:</strong> KALUGMANAN AGRI-DEV<br>
                    <strong>Account #:</strong> 0507050509466</p>
                    <p><strong>BDO Limketkai Branch, CDO</strong><br>
                    <strong>Account Name:</strong> KALUGMANAN AGRI-DEV<br>
                    <strong>Account #:</strong> 0100-5800-7102</p>
                    <p><strong>Send transaction slip via Viber or Whatsapp to Mitch 09175149736</strong></p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    COD via Purchase or Pabili Service
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                  <p><i>Client to book preferred service.<br>Confirm your pickup schedule with Mitch 09175149736</i></p>
                  </div>
                </div>
              </div>
                </div>
                <br>
                
                </div>
                <div class="col-sm-2">
                    
                </div>
                <div class="col-sm-4">
                  
                </div>
          <br>
                <hr/>
              
                <button type="submit" class="btn btn-primary" style="margin-bottom:30px">Check-Out</button>
                    
    </div>
  </div>
  </form>
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