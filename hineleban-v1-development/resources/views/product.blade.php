<!doctype html>
<html lang="en">
<x-head data="Shop Hineleban | Hineleban Store"/>
  <body>
  <x-header data="store"/>

  <div class="container">
  <h3 style="margin-top:100px"></h3>
    <div class="row" style="background: #f8f8f8">
    @foreach($products as $item)
        <div class="col-sm-6">
          <img src="{{URL::asset('/media/'.$item->ResourcePath)}}"  class="img-fluid img-thumbnail rounded " style="margin-top:20px" alt="Not Found" width="100%">
          <br>
        </div>
    <div class="col-sm-6" style="margin-bottom:70px">
        <h3 style="margin-top:20px">{{$item->ProductName}}</h3><br><br>
        <h5><strong>Description</strong></h5>
        <p>{{$item->ProductName}}</p><br>
        <p><strong>Available Stocks : </strong><?php
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

                      $sql = "SELECT sum(Quantity) AS value_qty FROM inventorytbls where productid=$item->ProductId";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo $row['value_qty'];
                         
                        }
                      } else {
                        echo "0";
                      }
                      $conn->close();
                  ?></p>
        <p><i>{{$item->ProductDes}}</i></p>
        <h3 style="color:#FFA500">₱{{$item->Price}}.00</h3>
        <p>Quantity</p>
        <form action="product?id={{$item->ProductId}}" method="POST">
          @csrf
        <input type="number" class="form-control" min="1" value="1" name="Quantity">
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        
            <input type="text" name="ProductId" value="{{$item->ProductId}}" hidden/>
            <input type="text" name="Price" value="{{$item->Price}}" hidden/>
            <input type="text" name="customerId" value="{{session('customerId')}}" hidden/>
            <button class="btn btn-primary" type="submit" <?php
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

                      $sql = "SELECT sum(Quantity) AS value_qty FROM inventorytbls where productid=$item->ProductId";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          if($row['value_qty'] == 0){
                            echo 'disabled';
                          }
                         
                        }
                      } else {
                        echo "0";
                      }
                      $conn->close();
                  ?>> Add to Cart</button>
            </form>
          </div>
      </div>
      @endforeach

    <div class="container" style="margin-bottom:25px">
       <div class="row" style="background:#e6e2d3">
       <div class="container-fluid">
       <div class="row">
        <a  href="store" style="text-align:right">Go to market >></a>
      </div>
       </div>
            <div class="col-sm-3" style="margin-top:25px; margin-bottom:25px">
              <div class="card" style="width: 14rem;">
                <a href="www.google.com"  target="_blank"  style="text-decoration: none; color:black">
                        <img src="{{URL::asset('/media/media2.jpg')}}"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Item 1</h5>
                        <p class="card-subtitle mb-2 text-muted">Some Item Description sample test. Some Item Description sample test </p>
                        <h5 class="card-title" style="color:#FFA500">₱450.00</h5>
                    </div>
                </a>
              </div>    
            </div>
            <div class="col-sm-3" style="margin-top:25px; margin-bottom:25px">
              <div class="card" style="width: 14rem;">
                <a href="www.google.com"  target="_blank"  style="text-decoration: none; color:black">
                        <img src="{{URL::asset('/media/media2.jpg')}}"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Item 1</h5>
                        <p class="card-subtitle mb-2 text-muted">Some Item Description sample test. Some Item Description sample test </p>
                        <h5 class="card-title" style="color:#FFA500">₱450.00</h5>
                    </div>
                </a>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top:25px; margin-bottom:25px">
              <div class="card" style="width: 14rem;">
                <a href="www.google.com"  target="_blank"  style="text-decoration: none; color:black">
                        <img src="{{URL::asset('/media/media2.jpg')}}"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Item 1</h5>
                        <p class="card-subtitle mb-2 text-muted">Some Item Description sample test. Some Item Description sample test </p>
                        <h5 class="card-title" style="color:#FFA500">₱450.00</h5>
                    </div>
                </a>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top:25px; margin-bottom:25px">
              <div class="card" style="width: 14rem;">
                <a href="www.google.com"  target="_blank"  style="text-decoration: none; color:black">
                        <img src="{{URL::asset('/media/media2.jpg')}}"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Item 1</h5>
                        <p class="card-subtitle mb-2 text-muted">Some Item Description sample test. Some Item Description sample test </p>
                        <h5 class="card-title" style="color:#FFA500">₱450.00</h5>
                    </div>
                </a>
              </div>
            </div>
            
        </div>
       </div>
       
 
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