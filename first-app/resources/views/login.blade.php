<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <style>
        @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
        }
    </style>
</head>
<body>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration</h3>
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <form class="px-md-2" action="{{route("auth.login")}}" method="post">
                @csrf
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Username</label>
                <input type="text" id="email" class="form-control" name="email" value="{{old('email')}}"/>
                @error('email')
                    {{$message}}
                @enderror
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Password</label>
                <input type="password" id="password" class="form-control" name="password" />
                @error('password')
                    {{$message}}
                @enderror
              </div>

              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg mb-1">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>