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
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding-top: 5em;">
                <table class="table table-responsive">
                    <tr style="background-color: black">
                        <th style="padding: 10px;">Doctor Name</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Specialty</th>
                        <th style="padding: 10px;">Room No.</th>
                        <th style="padding: 10px;">Image</th>
                        <th style="padding: 10px;">Update</th>
                        <th style="padding: 10px;">Delete</th>
                    </tr>
                    @if(!empty($data) && $data->count())
                      @foreach($data as $doctor)
                      <tr align="center" style="background-color: skyblue">
                          <td>{{$doctor->name}}</td>
                          <td>{{$doctor->phone}}</td>
                          <td>{{$doctor->specialty}}</td>
                          <td>{{$doctor->room}}</td>
                          <td><img style="height: 5em; width: 5em;" src="doctorimage/{{$doctor->image}}"></td>
                          <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$doctor->name}}?')" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
                          <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>
                      </tr>
                      @endforeach
                    @else
                        <tr>
                            <td colspan="10">There are no data.</td>
                        </tr>
                    @endif
                    
                </table>
                {!! $data->links() !!}
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
  </body>
</html>

