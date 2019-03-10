<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamation;

class ReclamationController extends Controller
{
	public function addReclamation(Request $request){
		$reclamation= new Reclamation;
		$reclamation->service =$request->Input('service');
		$reclamation->nom =$request->Input('nom');
		$reclamation->prenom =$request->Input('prenom');
	 	$reclamation->email =$request->Input('email');
		$reclamation->message =$request->Input('message');
		$reclamation->photo =$request->Input('photo');
		$reclamation->save();
		$response = array('response'=>'reclamation ADDED!' ,'success' =>true);
		return $response;
        

	}
}
