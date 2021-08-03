<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


namespace App\Http\Controllers;
use App\Models\Rdv;
use App\Models\Dossier;
use App\Models\Naissance;
use App\Models\Mariage;
use App\Models\Divorce;
use App\Models\Citoyen;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Auth;
use Illuminate\Http\Request;

class CitoyenController extends Controller
{
    public function authenticate(Request $request){
        // Retrive Input
       // $dataLogin = $request->only(['nni', 'password']);
        
        $citoyen = Citoyen::where('nni', '=', $request->nni)->first();
     // dd( $citoyen);
        if (empty($citoyen)) {
        //  return redirect()->back();
        //  return redirect()->back()->with('danger','NNI Invalide'); 
        return redirect('/failed');
          
        }
       if (Auth::guard('citoyen')->loginUsingId($citoyen->id)) {
        $details = Auth::guard('citoyen')->user();
       // return $details;
        $user = $details['original'];
        return redirect('/prendre_rendez_vous');
         } else {
        return 'auth fail';
        }

        // if failed login
        return redirect('login');
    }
    public function logoutt()
    {
        Auth::guard('citoyen')->logout();
         return redirect('/');

    }
    public function prendre_rendez_vous()
    {
      //  dd( Auth::guard('citoyen')->user()->id );
        $rdvs=Rdv::all()->where('citoyen_id',"=",Auth::guard('citoyen')->user()->nni );
        $agents=User::all()->where('type',"agent");
        return view('prendre_rendez_vous',['rdvs'=>$rdvs,'agents'=>$agents]);
    }
    public function save_rendez_vous(Request $request)
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
          if($count >= 30)
          {
              return redirect()->back()->with('danger','ce jour est déjà réservé completement!'); 
          }
          $count=Rdv::all()->where('citoyen_id','=',Auth::guard('citoyen')->user()->nni)->where('agent_id','=',$request->agent)->count();
          if($count >= 1)
          {
              return redirect()->back()->with('danger','tu as déjà un rendez-vous!'); 
          }
          $rdv=new Rdv();
          $rdv->besoin=$request->besoin;
          $rdv->description=$request->description;
          $rdv->date_rdv=$request->date;
          $rdv->citoyen_id=Auth::guard('citoyen')->user()->nni;
          $rdv->agent_id=$request->agent;
          $rdv->etat="oui";
        
          $rdv->save();
         return back()->with('success','Le rendez vous est pris avec success!');
         
    }

    public function dossiers()
    {
         $dossiers=Dossier::all()->where('citoyen_id',"=",Auth::guard('citoyen')->user()->nni);
        return view('dossiers',['dossiers'=>$dossiers]);
    }
    public function save_dossiers(Request $request)
    {
        $dossier=new Dossier();
        $dossier->nom=$request->name;
        $dossier->etat=$request->etat;
        $dossier->description=$request->description;

        $dossier->agent_id=Auth::user()->id;
        $dossier->citoyen_id=$request->citoyen;
        $dossier->save();
         return back()->with('success','Le dossier  est enregistré avec success!');
    }

    public function acte_naissance() 
    {
        $actes=Naissance::all()->where('citoyen_id',"=",Auth::guard('citoyen')->user()->nni);
        return view('acte_naissance',['actes'=>$actes]);
    }
     public function acte_mariage()
    {
        $actes=DB::table('mariages')->where('homme_id',"=",Auth::guard('citoyen')->user()->nni)->orWhere('femme_id',"=",Auth::guard('citoyen')->user()->nni)->get();
        return view('acte_mariage',['actes'=>$actes]);
    }
       public function acte_divorce()
    {
           $actes=DB::table('divorces')->where('homme_id',"=",Auth::guard('citoyen')->user()->nni)->orWhere('femme_id',"=",Auth::guard('citoyen')->user()->nni)->get();
        return view('acte_divorce',['actes'=>$actes]);
    }
}
