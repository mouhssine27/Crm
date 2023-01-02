<?php





namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmployeurMail;
use Illuminate\Support\Facades\Mail;


class mailEmployeurController extends Controller
{
    public static function EmployeurConf($idUser,$nomEmployeur,$emailEmployeur){
        $data = [
            'idUser' => $idUser,
            'nomEmployeur'=>$nomEmployeur,
            'emailEmployeur'=>$emailEmployeur,
        ];
        // dd($data);
        // return $data ;
        Mail::to($emailEmployeur)->send(new EmployeurMail($data));

        
    }
}