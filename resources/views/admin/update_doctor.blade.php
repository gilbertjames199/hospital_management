<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public"></base>
    <style type="text/css">
      label
      {
        display: inline-block;
        width:    200px;
      }
    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        
        <div class="container-fluid page-body-wrapper">
          
          <div class="container" align="center" style="padding-top: 10em;">
            @if(session()->has('message'))
            <div class="alert alert-success">                      
              {{session()->get('message')}}
              <button type="button" class="close" data-dismiss="alert">X</button>
            </div>
            @endif
            <form  method="POST" action="{{url('editdoctor',$data->id)}}" enctype="multipart/form-data" >
                @csrf
                <div style="padding: 1em;">
                  <label>Doctor Name</label>
                  <input type='text' name='name' value="{{$data->name}}" style="color: black;" required=""></input>
                </div>
                <div style="padding: 1em;">
                  <label>Phone </label>
                  <input type='number' name='phone' value="{{$data->phone}}" style="color: black;" required=""></input>
                </div>
                <div style="padding: 1em;">
                  <label>Specialty</label>
                  <select name ="specialty"style="color: black; width: 13em;" required="" placeholder="{{$data->specialty}}">
                      <option>--Select--</option>
                      @foreach($specialty as $special)
                        <option value="{{$special->specialty}}" {{(strcmp($data->specialty,$special->specialty)) ? '' : 'selected'}}>{{$special->specialty}}</option>
                      @endforeach
                  </select>
                </div>
                <div style="padding: 1em;">
                  <label>Room No.</label>
                  <input type='text' name='room' value="{{$data->room}}" style="color: black;" required=""></input>
                </div>
                <div style="padding: 1em;">
                  <label>Doctor Image</label>
                  <img style="height: 10em; width: 10em;" src="doctorimage/{{$data->image}}" />
                </div>
                <div style="padding: 1em;">
                  <label>Change Image</label>
                  <input type='file' name='file' ></input>
                </div>
                <div style="padding: 1em;">
                  <input type="submit" class="btn btn-primary">
                </div>                      
            </form>      
          </div>    
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
  </body>
</html>

