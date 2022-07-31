<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!--<h1>Add Doctor</h1>-->
            
            <div class="container" align="center" style="padding-top: 10em;">
                  @if(session()->has('message'))
                    <div class="alert alert-success">                      
                      {{session()->get('message')}}
                      <button type="button" class="close" data-dismiss="alert">X</button>
                    </div>
                  @endif
                  <form  method="POST" action="{{url('upload_doctor')}}"enctype="multipart/form-data">
                      @csrf
                      <div style="padding: 1em;">
                        <label>Doctor Name</label>
                        <input type='text' name='name' placeholder="Write the name" style="color: black;" required=""></input>
                      </div>
                      <div style="padding: 1em;">
                        <label>Phone </label>
                        <input type='number' name='phone' placeholder="Write the number" style="color: black;" required=""></input>
                      </div>
                      <div style="padding: 1em;">
                        <label>Specialty</label>
                        <select name ="specialty"style="color: black; width: 13em;" required="">
                            <option>--Select--</option>
                            <option value="Skin">Skin</option>
                            <option value="Eye">Eye</option>
                            <option value="Heart">Heart</option>
                            <option value="Nose">Nose</option>
                        </select>
                      </div>
                      <div style="padding: 1em;">
                        <label>Room No.</label>
                        <input type='text' name='room' placeholder="Write the room number" style="color: black;" required=""></input>
                      </div>
                      <div style="padding: 1em;">
                        <label>Doctor Image</label>
                        <input type='file' name='file' required=""></input>
                      </div>
                      <div style="padding: 1em;">
                        <input type="submit" class="btn btn-success">
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

