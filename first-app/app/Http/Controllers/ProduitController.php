<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        if ($search) {
           $produit = Produit::where('nom','like','%'.$search.'%')
            ->orWhere('prix','like','%'.$search.'%')
            ->orWhere('categorie','like','%'.$search.'%')
            ->paginate(5);

        }else{
            $produit = Produit::paginate(5);
        }
        
        return view('produits.listProduit',compact('produit'));
    }
    public function list_produit(){
        $produit = Produit::all();
        $produit = Produit::paginate(5);
        return view('produits.listProduit',compact('produit'));
    }
    public function ajout_produit(){
        return view('produits.ajoutProduit');
    }
    public function ajout_produit_request(Request $request){

        $request->validate([
            'nom'=>'required',
            'prix'=>'required',
            'categorie'=>'required',
            'foreign_id'=>'required',
        ]);

        $produit = new Produit();
        $produit->nom = $request->nom;
        $produit->prix = $request->prix;
        $produit->categorie = $request->categorie;
        $produit->foreign_id = $request->foreign_id;
        $produit->save();

        return redirect('/listProduit')->with('status','Le produit a bien été créé');
    }

    public function update_produit($id){
        $produit = Produit::find($id);
        return view('produits.updateProduit',compact('produit'));
    }
    public function update_produit_request(Request $request,$id){
        $request->validate([
            'nom'=>'required',
            'prix'=>'required',
            'categorie'=>'required',
        ]);

        $produit = Produit::find($id);

        $produit->nom = $request->nom;
        $produit->prix = $request->prix;
        $produit->categorie = $request->categorie;
        $produit->update();

        return redirect('/listProduit')->with('status','le produit a bien été modifié.');
    }

    public function delete_produit($id){
        $produit = Produit::find($id);
        $produit->delete();
        
        return redirect('/listProduit')->with('status','le produit a bien été supprimé.');
    }
}
