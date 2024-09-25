<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Modification laravel 10</title>

</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Modifier Employer</h3>
            @if(session('status'))
            <div class="alert alert primary">
                {{session('status')}}
            </div>
            @endif

            <ul>
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            <form action="/update/request" method="POST">
                @csrf
                <input type="text" id="id" name="id" style="display: none;" value="{{$employe->id}}"/>
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="Prenom" name="prenom" class="form-control form-control-lg" value="{{$employe->prenom}}" />
                    <label class="form-label" for="Prenom">Prenom</label>
                  </div>

                </div>

               
                <div class="col-md-6 mb-4">

                <div data-mdb-input-init class="form-outline">
                <input type="text" id="Nom" name="nom" class="form-control form-control-lg" value="{{$employe->nom}}"/>
                <label class="form-label" for="Nom">Nom</label>
                </div>               
                </div>

                <div class="col-md-6 mb-4">

                <div data-mdb-input-init class="form-outline">
                <input type="text" id="Adresse" name="addresse" class="form-control form-control-lg" value="{{$employe->addresse}}"/>
                <label class="form-label" for="Adresse">addresse</label>
                </div>

                </div>
                </div>

                <div class="col-md-6 mb-4">

                <div data-mdb-input-init class="form-outline">
                <input type="text" id="Numero_tel" name="numero_tel" class="form-control form-control-lg" value="{{$employe->numero_tel}}"/>
                <label class="form-label" for="numero_tel">n° Tel</label>
                </div>               
                </div>
                <div class="mt-4 pt-2">
                <button data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit">Modifier</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>