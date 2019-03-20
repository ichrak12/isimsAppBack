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
	public function getReclamations(){
		$reclamations = Reclamation::orderBy('id', 'desc')->get();
		return response()->json($reclamations);
	}

	public function getReclamation($id){
    		$reclamation = Reclamation::where('id', $id)->get();
    		return response()->json($reclamation);
    }

    public function updateReclamation(Request $request)
    {
        $id = $request->Input('id');
        Reclamation::where('id', '=' ,$id)->update(array(
        'service'=>$request->Input('service'),
        'nom' => $request->Input('nom'),
        'prenom'=>$request->Input('prenom'),
        'photo'=>$request->Input('photo'),
        'email'=>$request->Input('email'),
        'message'=>$request->Input('message')
        ));
        $response = array('response'=>'reclamation updated' , 'success'=>true);
        return $response;
    }

    public function deleteReclamation($id)
    {
        Reclamation::where('id', $id)->delete();
        $response = array('response'=>'reclamation deleted' , 'success'=>true);
        return $response;
    }
}
