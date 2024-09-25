<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>laravel list</title>
</head>
<body>
    @auth
       <h1 class="text-primary"> {{ \Illuminate\Support\Facades\Auth::user()->name }} </h1>
       <form action="{{route('auth.logout')}}" action="get">
        @csrf
        
        <button class="btn btn-danger float-end">Se deconnecter</button>
       </form>
    @endauth
    <br>
    <form action="/listSearch" method="get">
        @method('get')
    <div class="input-group w-25 container d-flex align-items-center justify-content-center">
        <input type="search"  class="form-control rounded" placeholder="Rechercher" aria-label="Search" aria-describedby="search-addon" name="search" value="{{ request()->get('search') }}" />
        <button  type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
    </div>
    </form>
    <br>
             @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <!-- <img src="/images/S1-t-max.jpg" alt="t_max_images"> -->
    <a href="/ajout" class="btn btn-primary btn-rounded">Ajouter un employe</a><br><br>
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th> 
            <th scope="col">Addresse</th>
            <th scope="col">n° Tel</th>
            <th scope="col">categorie produit</th>
            <th scope="col"colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $increment_id = 1;
            @endphp
        @foreach( $employe as $empl)
        <tr> 
            <td>{{$empl->id}}</td>
            <td><box-icon type='solid' name='user-pin'></box-icon> {{$empl->prenom}}</td> 
            <td>{{$empl->nom}}</td> 
            <td>{{$empl->addresse}}</td>
            <td>{{$empl->numero_tel}}</td>
            <td>{{$empl->produit ? $empl->produit->categorie : "pas de nom"}}</td> 
            <!-- <td>{{$empl->produit ? $empl->produit->nom : "pas de nom du produit"}}</td>  -->
            <td>
            <a href="/update/{{$empl->id}}" class="btn btn-primary btn-rounded">Modifier</a>
            </td>
            <td>
            <a href="/delete/{{$empl->id}}" class="btn btn-danger btn-rounded">Supprimer</a>
            </td>
        </tr>
             @php
                $increment_id += 1;
            @endphp
        @endforeach
        </tbody>
    </table>
    <div class="container d-flex align-items-center justify-content-center">  {{ $employe->links() }} </div>


    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>    
</body>
</html>