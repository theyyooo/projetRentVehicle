<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use App\ReturnsForms;


class RenduController extends Controller
{
    public function newRendu(){
        $rents = Rent::all();
        return view('newrendu')->with('rents', $rents);
    }








    public function newRendufromrent($id){
        $rent = Rent::find($id);
        return view('newrendufromrent')->with(['rent'=>$rent]);
    }







    public function newRendufromrentEx($id, Request $request){
        $dateDepart = $request->input('depart');
        $dateArrive = $request->input('arrive');
        $returnForms = [
            'dateDepart'=> $dateDepart,
            'dateArrive'=> $dateArrive  
        ];

        $form = ReturnsForms::create($returnForms);

       
        Rent::find($id)->update(['returnsForms_id' => $form->id ]);
        
        $alert = 'Votre ajout de formulaire de retour à été réalisé avec succès';
        $request->session()->flash('alert_mp', $alert);
        return redirect()->action('ToolsController@main');
    }












    public function getAllRendu(){
        $forms = Rent::where('created_at', '!=', null)->with('returnForm')->get();
        return view('allrendu')->with('forms', $forms);
    }

}
