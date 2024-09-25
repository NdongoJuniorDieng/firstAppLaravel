<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 

<h3>Importer</h3>

@if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
@endif
@if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
@endif
<p>Sélectionnez un fichier Excel (.xlsx) pour importer les données dans la table "clients".<br><strong>Les colonnes : </strong>name, email, phone, address</p>

<form method="POST" action="{{ route('excel.import') }}" enctype="multipart/form-data" >

    <!-- CSRF Token -->
    @csrf

    <input  class="form-control" type="file" name="fichier" >

    <button type="submit" class="btn btn-secondary">Importer</button>

</form