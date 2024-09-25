<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeeController extends Controller
{

    public function index(Request $request){
        $search=$request->input('search');
        if($search){
            $employe = Employe::where('prenom','like','%'.$search.'%')
                    ->orWhere('nom','like','%'.$search.'%')
                    ->orWhere('addresse','like','%'.$search.'%')
                    ->orWhere('numero_tel','like','%'.$search.'%')
                    ->paginate(6);
        }else{
            $employe = Employe::paginate(6);
        }

        return view('listEmployee',compact('employe'));
    }

    
    public function ajouter(){
        return view('ajoutEmployee');
    }

    public function liste(){
        $employe = Employe::all();
        $employe = Employe::paginate(6);
        return view('listEmployee',compact('employe'));
    }

    public function ajouter_request(Request $request){
        
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'addresse'=>'required',
            'numero_tel'=>'required',
        ]);

        $employe = new Employe();
        $employe->prenom = $request->prenom;
        $employe->nom = $request->nom;
        $employe->addresse = $request->addresse;
        $employe->numero_tel = $request->numero_tel;
        $employe->save();
        
        return redirect('/list')->with('status','l\'employé a bien été enregistré');
    }

    public function update($id){
        $employe = Employe::find($id);
        return view('update',compact('employe'));
    }

    public function update_request(Request $request){
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'addresse'=>'required',
            'numero_tel'=>'required',
        ]);

        $employe = Employe::find($request->id);
        $employe->prenom = $request->prenom;
        $employe->nom = $request->nom;
        $employe->addresse = $request->addresse; 
        $employe->numero_tel = $request->numero_tel;
        $employe->update();   
        return redirect('/list')->with('status','l\'employé a bien été modifié');
    }

    public function delete($id){
        $employee = Employe::find($id);
        $employee->delete();
        return redirect('/list')->with('status','l\'employé a bien été supprimé');
    }
}
