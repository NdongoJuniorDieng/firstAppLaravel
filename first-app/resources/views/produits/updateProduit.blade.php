<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Modification d'un Produit</title>

</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Modifier un Produit</h3>

            <form action="{{route('produit.update',$produit->id)}}" method="POST">
             @csrf
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="Nom" name="nom" class="form-control form-control-lg" value="{{$produit->nom}}" />
                    <label class="form-label" for="Nom">Nom</label>
                  </div>

                </div>

               
                <div class="col-md-6 mb-4">

                <div data-mdb-input-init class="form-outline">
                <input type="text" id="Prix" name="prix" class="form-control form-control-lg" value="{{$produit->prix}}"/>
                <label class="form-label" for="Prix">Prix</label>
                </div>               
                </div>

                <div class="col-md-6 mb-4">

                <div data-mdb-input-init class="form-outline">
                <!--<input type="text" id="categorie" name="categorie" class="form-control form-control-lg" /> -->
                <select  id="categorie" name="categorie" class="form-select" aria-label="Default select example">
                    
                    <option value="telephone">telephone</option>
                    <option value="electromenager">electromenager</option>
                    <option value="prêt à porter">prêt à porter</option>
                    <option value="électronique">électronique</option>
                </select>
                <!--<label class="form-label" for="categorie">categorie</label>-->
                </div>

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