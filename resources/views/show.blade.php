<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Students Information Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <!-- Bootstrap Font Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body style="text-align: center;" class="bg-primary">

  <div class="container" style="width: 1400px;">
    <div class="row">
      <div class="col-md-12 my-5">
        <div class="card">

        @if (session('seccess'))
            <div class="alert alert-danger" role="alert">
                {{ session('success') }}
            </div>
        @endif
          <div class="card-header card-danger bg-info text-white">
            <h1 class="text-center float-start">Students List</h1>
            <a href="{{route('creat')}}" class="btn btn-warning btn-md float-end">Add Students</a>
          </div>
          <div class="card-body" style="padding: 0;">
            <div class="table-responsive">

              <table class="table table-primary table-striped table-hover table-bordered">
                <tr class="table-active table-primary">
                  <th>S/L</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Roll</th>
                  <th>Reg</th>
                  <th>Email</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>

                @foreach($student as $key=>$cus)
                <tr>
                  <td class="table-active table-primary">{{$loop->iteration}}</td>
                  <td>{{$cus['name']}}</td>
                  <td>
                    <img src="{{asset('storage/'.$cus->image)}}" alt="{{$cus->name}}" height="50px" width="50px">
                  </td>
                  <td>{{$cus['roll']}}</td>
                  <td>{{$cus['reg']}}</td>
                  <td>{{$cus['email']}}</td>
                  <td>{{date('d-m-Y | H:i A',strtotime($cus['created_at']))}}</td>
                  <td>{{($cus['created_at'] == $cus['updated_at']) ? "N/A" : date('d-m-Y | H:i A',strtotime($cus['updated_at']))}}</td>
                  <td>
                    <div class="btn-group ">
                      <a href="{{route('edit',$cus->id)}}" class="btn btn-danger btn-sm"> <i class='bi bi-pencil-square'></i></a>
                      <a href="{{route('delete',$cus->id)}}" class="btn btn-warning btn-sm"><i class='bi bi-x-lg'></i></a>
                    </div>
                  </td>
                </tr>

                @endforeach
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
