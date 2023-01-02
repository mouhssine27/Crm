<?php

namespace App\Http\Controllers;

use App\Employeur;
use App\Entreprise;
use App\Http\Requests\updateProfileEmployeurRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\SessionGuard;


class EmployeurController extends Controller
{

    public function index(){
       
        $idEmployeur = Auth::guard('employeur')->id();
        $getInfoEmployeur=  DB::table('entreprises')
        ->join('employeurs','entreprise_id', '=', 'entreprises.id')
        ->where('employeurs.id', $idEmployeur)
        ->first();
        $idEntreprise =  $getInfoEmployeur->entreprise_id;
        $Entreprise = Entreprise::where('id', $idEntreprise)->first();
        $nomEntreprise = $Entreprise->nom;
        $getInfos=DB::table('entreprises')
        ->join('employeurs','entreprise_id', '=', 'entreprises.id')
        ->where('employeurs.entreprise_id', $idEntreprise )
        ->where('employeurs.is_verified', 1)
        ->get();
        return view('employeur.index',compact('getInfos', 'nomEntreprise'));
    }


public function verifyEmployeur(Request $request){

        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $Em = Employeur::where(['verification_code' => $verification_code])->first();
        $EmployeurId = $Em->id;

        if( $Em!= null){
            $Em->status = 1;
            $Em ->save();
            return view('authEmployeur.registerEmployeur',compact('EmployeurId'));
        }
    }

    public function registreEmployeur(Request $request ){
        $data=$request->all();
        $idEmployeur = $data['employeurId'] ;
        $Em = Employeur::find($idEmployeur);
        $Em -> is_verified = 2;
        $Em-> password=Hash::make($data['password']);
        $Em -> save();
        return view('authEmployeur.loginEmployeur')->with('success','Votre compte créer avec success veuillez entrer votre email identifiant et votre mot de passe pour completer votre profile et accéder dans votre espace privé ');          
    }
  
    public function showLoginFormEmployeur(){
        return view('authEmployeur.loginEmployeur');   
    }
    

        public function profileEmployeur(){
            $idEmployeur = Auth::guard('employeur')->id();
            $employeur = Employeur::where('id', $idEmployeur)->first();
            return view('employeur.employeurProfile',compact('employeur'));
        }

        public function showProfile(){

            $idEmployeur = Auth::guard('employeur')->id();
            $employeur = Employeur::where('id', $idEmployeur)->first();
            return view('employeur.showProfileEmployeur',compact('employeur'))->with('alert','veuillez completer votre inscription pour pourriez voir tous les fonctionalité');

        }

        public function updateProfile(updateProfileEmployeurRequest $request , $employeurId){
            $data= $request->all();       
            $employeur = Employeur::find($employeurId);
            $employeur->nom = $data['nom'];   
            $employeur->phone = $data['phone'];   
            $employeur->adresse = $data['adresse'];     
            $employeur->date_naissance = $data['dateNaissance'];     
            $employeur->is_verified = 1;
            $employeur->save();

            return redirect()->back()->with('success', 'Votre information personnelle à éte Enregistrer avec success et votre profile est vérifier');
        }
   
}
