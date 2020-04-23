<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use App\ReturnsForms;
use Illuminate\Support\Facades\Auth;


class RenduController extends Controller
{
    public function newRendu(){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                $rents = Rent::all();
                return view('newrendu')->with('rents', $rents);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
        
    }
    








    public function newRendufromrent($id){


        if (Auth::check()) {
            if (Auth::user()->admin) {

                $rent = Rent::find($id);
                return view('newrendufromrent')->with(['rent'=>$rent]);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }







    public function newRendufromrentEx($id, Request $request){

        $request->validate([
            'dateDepart'=> 'required|date',
            'dateArrive'=> 'required|date|after_or_equal:dateDepart'
            
        ]);

        $returnForms = [
            'dateDepart'=> $request->input('dateDepart'),
            'dateArrive'=> $request->input('dateArrive')  
        ];

        $form = ReturnsForms::create($returnForms);

       
        Rent::find($id)->update(['returnsForms_id' => $form->id ]);
        
        $alert = 'Votre ajout de formulaire de retour à été réalisé avec succès';
        $request->session()->flash('alert_mp', $alert);
        return redirect()->action('ToolsController@main');
    }












    public function getAllRendu(){

        if (Auth::check()) {
            if (Auth::user()->admin) {
                $forms = Rent::where('created_at', '!=', null)->with('returnForm')->get();
                return view('allrendu')->with('forms', $forms);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }

}
