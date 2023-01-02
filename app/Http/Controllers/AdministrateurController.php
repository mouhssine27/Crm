<?php

namespace App\Http\Controllers;

use App\Employeur;
use App\Entreprise;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\storeMailEmployeurRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class AdministrateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('Admin.administrateur',compact('users'));
    }

    public function store(StoreAdminRequest $request){
        $data= $request->all();
        User::create(
            [
            
            'name' => $data['nomAdmin'],
            'email'=>$data['emailAdmin'],
            'password' => Hash::make($data['passwordAdmin']),
          
            ]);

            return redirect()->back()->with('success', 'Administrateur à éte crée avec success');
    }

    public function indexEmployeur()
    {
        $employeurs = Employeur::get();
        $entreprises = Entreprise::get();
        return view('Admin.Employeurs',compact('entreprises','employeurs'));
    }
    
  

    public function updateEpmloyeur(Request $request ,$EmployeurId){
    
        $data=$request->all();
        $Employeur = Employeur::find($EmployeurId);
        $nom = $data['nomEmployeur'] ;
        $Employeur->nom = $nom; 
        $Employeur->email = $data['emailEmployeur'];  
        $Employeur->entreprise_id = $data['entreprise'];  
        // $Employeur->status = $data['status'];    
        $Employeur->save();
        return redirect()->back()->with('success', "L'employeur à éte Modifier avec success");
    
    
        }

        public function mailEmployeur(storeMailEmployeurRequest $request){
    
        $idUser = Auth::id();
        $data=$request->all();
        $nomEmployeur = $data['nomEmployeur'];
        $emailEmployeur = $data['emailEmployeur'];
        $entrepriseId = $data['entreprise'];

       $Entreprise = Entreprise::where('id', $entrepriseId)->first();
       $nomEntrepriseEmployeur = $Entreprise->nom;
        
      
    $Em =  Employeur::create([
        'user_id'=>$idUser,
        'entreprise_id'=>$entrepriseId,
        'nom'=>$nomEmployeur,
        'email'=> $emailEmployeur,
        'status'=>0,
        'verification_code'=> sha1(time())
         ]);

    //    MailEmployeurController::EmployeurConf($idUser,$nomEmployeur,$emailEmployeur); 
    $code=' <!DOCTYPE html>
    <html lang="fr-FR">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Mini Crm</title>
                    <style type="text/css">

                    body {
                            background-color: #eceeef;
                            font-family: "Poppins", sans-serif;
                        }
                        .widget {
                            width: 80%;
                            margin: auto;
                            padding: 15px;
                            background-color: #f5f5f5;
                            border-radius: 10px;
                        }
                        .widget h1 {
                            text-align: center;
                            color: #000;
                            ;
                        }

                        .bas-content {
                            text-align: center;
                        }

                        .bas-content h3 {

                            color: #000;
                        }

                        .bas-content {
                            margin: 50px 0;
                        }
                        .bas-content a {
                            text-transform: uppercase;
                            text-decoration:none;
                            color: #fff;
                            margin-top:50px;
                            padding: 15px;
                            background-color: #000;
                            border: none;
                            width: 40%;
                            cursor: pointer;
                        }
                        .bas-content button {
                            text-transform: uppercase;
                            color: #fff;
                            padding: 15px;
                            background-color: #000;
                            border: none;
                            width: 40%;
                            cursor: pointer;
                        }
                        .cordonner{

                            width: 80%;
                            margin: auto;
                            margin-top: 50px;
                            /* margin: 0 120px 0 0; */
                            /* float: right; */

                        }
                        .cordonner span{
                            font-weight: 700;
                        }
                        .content-cord{
                            text-align: center;
                            font-size: 14px;
                        }

                     
                        @media (max-width:414) {
                            .widget h1 {
                                font-size: 20px;
                            }
                            .bas-content button {
                            text-transform: uppercase;
                            color: #fff;
                            padding: 15px;
                            background-color: #000;
                            border: none;
                            width: 100%;
                            cursor: pointer;
                        }
                        }
                        </style>
                </head>
                <body>
                <div class="container-style">
                    <div class="widget">
                    <h1>Bienvenue chez '.$nomEntrepriseEmployeur.'</h1>
                        <div class="client-style">
                        <h5>Bonjour '.$nomEmployeur .' , </h5>
                           <p>  Votre email identifiant :'.$emailEmployeur.'.</p>
                        </div>
                        <div class="bas-content">
                                                <h3>Veuillez cliquer sur le  button ce dessus pour redirigent vers l&#39;application pour valider votre profil</h3>
                                               <a href="'.URL::to('/Employeur/verify?code='.$Em->verification_code).'">
                                               valider votre profil
                                                </a>
                        </div>
                    </div>
                </div>
            </body>
            </html>
                ';

   $data = json_encode(array(
       // "contact" => ["recipientName"=>$client->prenom .' '. $client->nom,
          "contact" => ["recipientName"=>$nomEmployeur,
       "recipientAddress"=>$emailEmployeur,
       "fromName"=>"Invitation d'intégration",
       "fromAddress"=>"noreply@clicktakoul.ma"],

     "subject"=> "Veuillez consulter le contenu de ce mail",
      "html"=>$code


));
$curl = curl_init();
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_URL,"http://d.clicktakoul.ma:8444/mail/send");
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
'APIKEY: 111111111111111111111',
'Content-Type: application/json',
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
curl_close($curl);

return redirect()->back()->with('success',"L'invitaion a été  bien   Envoyé avec success ");

    }

    public function profileAdmin(){
        $admin = Auth::user();


        
        return view('admin.adminprofile', compact('admin'));
    }

      

}
