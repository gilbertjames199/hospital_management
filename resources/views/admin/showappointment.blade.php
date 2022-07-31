<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
      tr:hover
      {
        background-color: #08dca4 !important;
      }
      tr:first-child:hover
      {
        background-color: black !important;
      }
    </style>
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
              <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row ">
                    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                            
                            <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                              <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
                                </div>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <input type="text" placeholder="search" style="color: black; height: 1.3em; width: 10em;" />
                          <button class="btn btn-success" >Search</button></br>
                          <button class="btn btn-success" >Add Appointments</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-12 grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Appointments</h4>
                          <div class="table table-responsive">
                            <table class="table table-bordered">
                              <tr style="background-color: black">
                                  <th style="padding: 10px;">Customer Name</th>
                                  <th style="padding: 10px;">Email</th>
                                  <th style="padding: 10px;">Phone</th>
                                  <th style="padding: 10px;">Doctor Name</th>
                                  <th style="padding: 10px;">Date</th>
                                  <th style="padding: 10px;">Message</th>
                                  <th style="padding: 10px;">Status</th>
                                  <th style="padding: 10px;">Approve</th>
                                  <th style="padding: 10px;">Cancel</th>
                              </tr>
                              @if(!empty($data) && $data->count())
                                @foreach($data as $appoint)
                                  <tr align="center" style="background-color: skyblue">
                                      <td>{{$appoint->name}}</td>
                                      <td>{{$appoint->email}}</td>
                                      <td>{{$appoint->phone}}</td>
                                      <td>{{$appoint->doctor}}</td>
                                      <td>{{$appoint->date}}</td>
                                      <td></td>
                                      <td>{{$appoint->status}}</td>
                                      <td>
                                          <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approve</a>
                                      </td>
                                      <td>
                                          <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Cancel</a>
                                      </td>
                                  </tr>
                                @endforeach
                              @else
                                  <tr>
                                      <td colspan="10">There are no data.</td>
                                  </tr>
                              @endif
                            </table>
                            <span style="color: red !important;">{!! $data->links() !!}</span>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
  </body>
</html>

