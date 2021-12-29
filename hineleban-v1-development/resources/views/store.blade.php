<!doctype html>
<html lang="en">
<x-head data="Shop Hineleban | Hineleban Store"/>
  <body>
  <x-header data="store"/>

  <div class="container">
  <h3 style="margin-top:100px">Products</h3>
    <div class="row">
      
      @foreach($products as $item)
    <div class="col-sm-3" style="margin-top:25px; margin-bottom:25px">
              <div class="card" style="width: 18rem;">
                <a href="product?id={{$item->ProductId}}" style="text-decoration: none; color:black">
                        <img src="{{URL::asset('/media/'.$item->ResourcePath)}}"  class="card-img-top" alt="...">
                    <div class="card-body" >
                        <h5 class="card-title" style=" width: 250px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$item->ProductName}}</h5>
                        <p class="card-subtitle mb-2 text-muted" style=" width: 250px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$item->ProductDes}}</p>
                        <h5 class="card-title" style="color:#FFA500">₱{{$item->Price}}</h5>
                    </div>
                </a>
              </div>
            </div>
            @endforeach
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