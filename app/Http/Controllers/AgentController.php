<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Models\Rdv;
use App\Models\Rdvsins;
use App\Models\User;
use App\Models\Dossier;
use App\Models\Mariage;
use App\Models\Naissance;
use App\Models\Divorce;
use App\Models\Dece;
use App\Models\Citoyen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function save_rendez_vous_agent(Request $request)
    {
        //dd($request->date,date("Y-m-d"));
        $originalDate= $request->date;
        $newDate = date("l", strtotime($originalDate));

     //   dd(  $newDate);

        $datesystem = date("Y-m-d");
        $daterdv = $request->date;
        $datesystem = strtotime ($datesystem);
        $daterdv = strtotime ($daterdv);

        $nbrjourssecond = $daterdv - $datesystem;
        $nbrjours = $nbrjourssecond/86400;
         
        // echo "$nbrjours : " .$nbrjours;
        if($nbrjours >= 90)
        {
            return redirect()->back()->with('danger','vous ne pouvez pas prendre un rendez-vous a une duré plus de 3 mois'); 
        }
        
       if(  $newDate=="Saturday" ||  $newDate=="Sunday" ||  $newDate=="Friday" )
       {
            return redirect()->back()->with('danger','veuillez choisir une autre date!(Jours fériés sont vendredi, samedi et dimanche)' ); 
       }
        $count=Rdv::all()->where('date_rdv','=',$request->date)->where('agent_id','=',Auth::user()->id)->count();
        if($count >= 30)
        {
            return redirect()->back()->with('danger','ce jour est déjà réservé completement!'); 
        }
        if(date($request->date) < date("Y-m-d"))
        {
            return redirect()->back()->with('danger','veuiilez choisir une date valide, et non une date passé');
        }
         $count=Rdv::all()->where('citoyen_id','=',$request->citoyen)->where('agent_id','=',Auth::user()->id)->count();
          if($count >= 1)
          {
              return redirect()->back()->with('danger','ce citoyen a déjà un rendez-vous!'); 
          }
        
        
        $rdv=new Rdv();
        $rdv->besoin=$request->besoin;
        $rdv->description=$request->description;
         $rdv->date_rdv=$request->date;
         $rdv->citoyen_id=$request->citoyen;
         $rdv->etat="oui";
         $rdv->agent_id=Auth::user()->id;
         $rdv->save();
         return back()->with('success','Le rendez vous est pris avec success!');
    }
    public function gestion_rdvs()
    {
        $rdvs=Rdv::all()->where('agent_id',Auth::user()->id);
        $citoyens=Citoyen::all();   
        return view('gestion_rdvs',['rdvs'=>$rdvs,'citoyens'=>$citoyens]);

    }
    
    public function gestion_dossiers()
    {
        $dossiers=Dossier::all()->where('agent_id',Auth::user()->id);
       
        return view('gestion_dossiers',['dossiers'=>$dossiers]);

    }
    public function modifier_dossier(Request $request)
    {
         $dossier=Dossier::find($request->id);
   
             $dossier->etat=$request->etat;
             $dossier->save();
        
       
        return redirect()->back();
    }
    


    public function delete_dossier(Request $request)
    {
        $dossier = Dossier::findOrFail($request->id);
        $dossier->delete();
        
        return back()->with('success','Le dossier  est Supprimé avec success!');
    }

    public function modifier_rendez_vous($id)
    {
        $rdv=Rdv::find($id);
        if($rdv->etat=="oui"){
            $rdv->etat="non";
            $rdv->save();
        }
        else{
            $rdv->etat="oui";
            $rdv->save();
        }
        return redirect()->back();
    }

    public function gestion_actes()
    {
        $actes_naissances=Naissance::all();
        $actes_divorces=Divorce::all();
        $actes_mariages=Mariage::all();
        $actes_deces=Dece::all();
        return view('gestion_actes',['actes_naissances'=>$actes_naissances,'actes_divorces'=>$actes_divorces,'actes_mariages'=>$actes_mariages,'actes_deces'=>$actes_deces]);

    }
    public function creer_mariage(Request $request)
    {
        $mariage=new Mariage();
        $mariage->date_mariage=$request->date;
        $mariage->lieu_mariage=$request->lieu;
        $mariage->homme_id=$request->homme;
        $mariage->femme_id=$request->femme;
        $mariage->agent_id=Auth::user()->id;
        
         if($request->file()) {
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $mariage->path=$fileName;
           
             $mariage->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
        else{
            $mariage->save();
        }

        
        return redirect()->back();
    }
    public function creer_divorce(Request $request)
    {
        $divorce=new Divorce();
        $divorce->date_divorce=$request->date;
        $divorce->lieu_divorce=$request->lieu;
        $divorce->homme_id=$request->homme;
        $divorce->femme_id=$request->femme;
        $divorce->agent_id=Auth::user()->id;
       if($request->file()) {
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

             $mariage = mariage::where('femme_id',$divorce->femme_id);
             $mariage->delete();
             
             $divorce->path=$fileName;
             $divorce->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
        else{
             $divorce->save();
            return back()
            ->with('success','File has been uploaded.');
            
        }
        
        return redirect()->back();
    }

    public function creer_naissance(Request $request)
    {
        $naissance=new naissance();
        $naissance->agent_id=Auth::user()->id;
        $naissance->citoyen_id=$request->id;
         if($request->file()) {
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $naissance->path=$fileName;
           
             $naissance->save();
            return back()
            ->with('success','File has been uploaded.');
            
        }
        else{
             $naissance->save();
            return back()
            ->with('success','File has been uploaded.');
          

        }
       
        return redirect()->back();

    }


    public function gestion_registes()
    {
        $citoyens=Citoyen::all();
        return view('gestion_registes',['citoyens'=>$citoyens]);
    }

    public function creer_citoyen(Request $request)
    {
         $agent=new Citoyen();
       
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->nni=$request->nni;
        $agent->date_naissance=$request->date_naissance;
        $agent->lieu_naissance=$request->lieu_naissance;
        $agent->sexe=$request->sexe;
        $agent->nationalite=$request->natio;
        $agent->password=Hash::make("12345678");
        $agent->nni_pere=$request->nni_pere;
        $agent->nni_mere=$request->nni_mere;
        $agent->save();
        return redirect()->back();
    }
    public function get_citoyen(Request $request)
    {
        $citoyen = citoyen::findOrFail($request->id);
        return view('edit_citoyen',['citoyen'=>$citoyen]);
    }

    public function update_citoyen(Request $request)
    {
        $agent = citoyen::findOrFail($request->id);

       
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->nni=$request->nni;
        $agent->date_naissance=$request->date_naissance;
        $agent->lieu_naissance=$request->lieu_naissance;
        $agent->sexe=$request->sexe;
        $agent->nationalite=$request->natio;
        $agent->password=Hash::make("12345678");
        $agent->nni_pere=$request->nni_pere;
        $agent->nni_mere=$request->nni_mere;
        $agent->save();
        return redirect('gestion_registes');
    }

    public function save_rendez_vous_agent_ins(Request $request)
    {
        
        $originalDate= $request->date;
        $newDate = date("l", strtotime($originalDate));
        

        $datesystem = date("Y-m-d");
        $daterdv = $request->date;
        $datesystem = strtotime ($datesystem);
        $daterdv = strtotime ($daterdv);

        $nbrjourssecond = $daterdv - $datesystem;
        $nbrjours = $nbrjourssecond/86400;
         
        // echo "$nbrjours : " .$nbrjours;
        if($nbrjours >= 90)
        {
            return redirect()->back()->with('danger','vous ne pouvez pas prendre un rendez-vous a une duré plus de 3 mois'); 
        }

       if(  $newDate=="Saturday" ||  $newDate=="Sunday" ||  $newDate=="Friday" )
       {
            return redirect()->back()->with('danger','veuillez choisir une autre date!(Jours fériés sont vendredi, samedi et dimanche)'); 
       }
       
       if(date($request->date) < date("Y-m-d"))
       {
           return redirect()->back()->with('danger','veuiilez choisir une date valide, et non une date passé');
       }
       $count=Rdv::all()->where('date_rdv','=',$request->date)->where('agent_id','=',$request->agent)->count();
       if($count >= 20)
       {
           return redirect()->back()->with('danger','ce jour est déjà réservé completement!'); 
       }
       $count=rdvsins::all()->where('telephone','=',$request->telephone)->count();
       if($count >= 1)
       {
           return redirect()->back()->with('danger','tu as déjà un rendez-vous!'); 
       }
        $rdv=new rdvsins();
        $rdv->telephone=$request->telephone;
         $rdv->date_rdv=$request->date;
         $rdv->etat="oui";
         $rdv->agent_id=Auth::user()->id;
         $rdv->save(); 
         return back()->with('success','Le rendez vous inscription est pris avec success!');
    }
 public function gestion_rdvs_ins()
    {
        
        $rdvsins=Rdvsins::all()->where('agent_id',Auth::user()->id);
        //dd($rdvs);
       
        return view('gestion_rdvs_ins',['rdvsins'=>$rdvsins,]);
    }
public function modifier_rendez_vous_ins($id)
    {
        $rdv=Rdvsins::find($id);
        if($rdv->etat=="oui"){
            $rdv->etat="non";
            $rdv->save();
        }
        else{
            $rdv->etat="oui";
            $rdv->save();
        }
        return redirect()->back();
    }


    public function statistiques()
    {
        $users=Citoyen::all()->count();
        $mariage=Mariage::all()->where('agent_id',Auth::user()->id)->count();
        $dece=Naissance::all()->where('agent_id',Auth::user()->id)->count();
        $divorce=Divorce::all()->where('agent_id',Auth::user()->id)->count();
        $dossiers=Dossier::all()->where('agent_id',Auth::user()->id)->count();
       return view('statistique',['users'=>$users,'mariage'=>$mariage,'dece'=>$dece,'divorce'=>$divorce,'dossiers'=>$dossiers]);
    }
    function find(Request $request){
        $request->validate([
          'query'=>'required'
       ]);

       $search_text = $request->input('query');
       $dossiers = DB::table('dossiers')
                  ->where('citoyen_id','LIKE','%'.$search_text.'%')
                  ->where('agent_id',Auth::user()->id)
                  ->paginate(10);
        return view('gestion_dossiers',['dossiers'=>$dossiers]);

}
function find_citoyen(Request $request){
    $request->validate([
      'query'=>'required'
   ]);
 
   $search_text = $request->input('query');
   $citoyens = DB::table('citoyens')
              ->where('nni','LIKE','%'.$search_text.'%')
              ->paginate(10);
    return view('gestion_registes',['citoyens'=>$citoyens]);

} 
}
