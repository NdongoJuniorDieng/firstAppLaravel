<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <title>liste des Produits</title>
</head>
<body>
    <br>
    <form action="/searchProduit" method="get">
        @method('get')
    <div class="input-group w-25 container d-flex align-items-center justify-content-center">
        <input type="search" class="form-control rounded" placeholder="Rechercher" aria-label="Search" aria-describedby="search-addon" name="search" value="{{ request()->get('search') }}" />
        <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
    </div>
    <br>
<a href="/ajoutProduit" class="btn btn-primary btn-rounded">Ajouter un Produit</a><br><br>
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    
<table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th> 
            <th scope="col">Categorie</th>
            <th scope="col"colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $increment_id = 1;
            @endphp
           @foreach($produit as $prod)
        <tr> 
            <td>{{ $increment_id }}</td>
            <td>{{ $prod->nom }}</td>
            <td>{{ $prod->prix }}</td> 
            <td>{{ $prod->categorie }}</td> 
            <td>
            <a href="/update/Produit/{{$prod->id}}" class="btn btn-primary btn-rounded">Modifier</a>
            </td>
            <td>
            <form action="{{route('produit.delete',$prod->id)}}" method="post">
                @csrf 
                @method("DELETE")
            <button class="btn btn-danger btn-rounded" type="submit">Supprimer</button>
            </form>
            </td>
        </tr>
            @php 
            $increment_id += 1;
            @endphp

            @endforeach
        </tbody>
    </table>
            <div class="container d-flex align-items-center justify-content-center">  {{ $produit->links() }} </div>
</body>
</html>