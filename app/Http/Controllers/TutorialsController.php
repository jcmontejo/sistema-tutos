<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\Models\General;
use App\Models\Individual;
use Auth;
use App\User;
use Hash;
use Alert;

class TutorialsController extends Controller
{	
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*General Program*/
    public function add($id)
    {
    $general = General::find($id);
    	/*echo $general->general_objective;
    	echo "<br>";
    	echo $general->id;*/
    	return view('items.create')
    	->with('general', $general);
    }
    /*End Program General*/

    /*Individual Program*/
    public function additemindividual($id)
    {
    $individual = Individual::find($id);
        /*echo $general->general_objective;
        echo "<br>";
        echo $general->id;*/
        return view('itemindividuals.create')
        ->with('individual', $individual);
    }
    /*End Program General*/

    /*Update Password*/
    public function change(Request $request)
    {   
        $user = Auth::user();
        $password = $request->input('newpassword');
        $user->password = Hash::make($password);
        $user->save();
        Alert::success('Contraseña actualizada exitosamente!')->persistent("Cerrar");
        return redirect()->back();
    }
    /*End Update Paswword*/

}
