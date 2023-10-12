<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Students Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto my-5">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center float-start">Edit Information</h1>
            <a href="{{route('index')}}" class="btn btn-outline-danger btn-md float-end">Back</a>
          </div>
          <div class="card-body">
            <form action="{{route('update',$student->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="text" name="name" id="" placeholder="Enter Your Name" class="form-control mb-3" value="{{$student->name}}">
              <input type="text" name="roll" id="" placeholder="Enter Your Roll" class="form-control mb-3" value="{{$student->roll}}">
              <input type="text" name="reg" id="" placeholder="Enter Your Reg" class="form-control mb-3" value="{{$student->reg}}">
              <input type="email" name="email" id="" placeholder="Enter Your Email" class="form-control mb-3" value="{{$student->email}}">
              <input type="file" name="img" class="form-control mb-3">
              @if ($student->image)
                <div class="div">
                    <img src="{{asset('storage'.$student->image)}}" alt="{{$student->name}}" height="100px" width="100px" class="rounded">
                </div>
              @endif
              <input type="submit" value="Update" name="submit" class="btn btn-outline-warning w-100">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
