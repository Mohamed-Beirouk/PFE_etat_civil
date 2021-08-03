<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Rdv;
use App\Models\Rdvsins;
use App\Models\Dossier;
use App\Models\Mariage;
use App\Models\Naissance;
use App\Models\Divorce;
use App\Models\Dece;
use App\Models\Citoyen;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $agents=User::all()->where('type','agent');
        return view('agents',['agents'=>$agents]);
    }
    public function creer_agent(Request $request)
    {
        $agent=new User();
        $agent->email=$request->email;
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->type='agent';
        $agent->password=Hash::make($request->password);
        $agent->save();
       return redirect('agents');

    }

   


    public function destroy(Request $request)
    {
        $agent = User::findOrFail($request->id);
        $agent->delete();
        return redirect('agents');
    }

    public function get_agent(Request $request)
    {
        $agent = User::findOrFail($request->id);
        return view('edit_agent',['agent'=>$agent]);
    }

    public function update(Request $request)
    {
        $agent = User::findOrFail($request->id);
        $agent->email=$request->email;
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->type='agent';
        $agent->password=Hash::make($request->password);
        $agent->save();
        return redirect('agents');
    }
    public function statistiques_admin()
    {
        $users=Citoyen::all()->count();
        $mariage=Mariage::all()->count();
        $dece=naissance::all()->count();
        $divorce=Divorce::all()->count();
        $dossiers=Dossier::all()->count();
       return view('statistique_admin',['users'=>$users,'mariage'=>$mariage,'dece'=>$dece,'divorce'=>$divorce,'dossiers'=>$dossiers]);
    }

    function dossiers_agence_find(Request $request){
        $request->validate([
          'query'=>'required'
       ]);

       $search_text = $request->input('query');
       $dossiers = DB::table('dossiers')
                  ->where('agent_id','LIKE','%'.$search_text.'%')
                  ->paginate(10);
        return view('stat_dossiers',['dossiers'=>$dossiers]);

        }
       
        public function stat_dossiers()
        {
              $dossiers=Dossier::all();
   
             return view('stat_dossiers',['dossiers'=>$dossiers]);

        }
}


