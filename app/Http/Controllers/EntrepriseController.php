<?php

namespace App\Http\Controllers;

use App\Entreprise;
use App\Http\Requests\deleteEntrepriseRequest;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
  

    public function index()
    {
        $entreprises = Entreprise::all();        
        return view('Admin.Entreprise',compact('entreprises'));
    }
    
    public function store(StoreEntrepriseRequest $request){
        $idUser = Auth::id();
        $data= $request->all();
        Entreprise::create(
            [
            'user_id'=> $idUser,
            'nom' => $data['nomEntreprise'],
            ]);

            return redirect()->back()->with('success', 'Le Entreprise à éte crée avec success');
    }

 
    
    public function filtreEntreprise(Request $request){
        $entreprises = Entreprise::orderby('nom','desc');
        if($request['nom']!=""){
            $entreprises->where('nom',$request['nom']);
        }
       
        $entreprises= $entreprises ->get();

        $filter = [
            'nom' => $request['nom'],
         
        ];
        $data = [
            'entreprises'=>$entreprises,
            'filter' => $filter,
    
        ];

        return view('Admin.Entreprise', $data); 
    }
    public function update(UpdateEntrepriseRequest $request , $EntrepriseId){
        $data= $request->all();       
        $entreprise = Entreprise::find($EntrepriseId);
        $entreprise->nom = $data['nomEntreprise'];   
        $entreprise->save();
        return redirect()->back()->with('success', 'Entreprise à éte Modifier avec success');
    }

    public function destroy($EntrepriseId)
    {
        $Entreprise= Entreprise::find($EntrepriseId);
        $Entreprise->delete();
        return redirect()->back()->with('success', "L'entreprise à éte supprimé avec success");
    }

}
