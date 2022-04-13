<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   
   public function index()
   {
       //if(Auth::user()->hasRole('user')) return view('userdash');
       //elseif(Auth::user()->hasRole('cadre')) return view('cadredash');
       //elseif(Auth::user()->hasRole('admin')) return view('admin.admindash');

      if (Auth::user()->actif=="non") 
         {
            Auth::guard('web')->logout();
             
            return redirect()->back()->with('ErrorMessage','Votre compte n\'est pas actif. Veuillez contactez l\'administrateur pour en savoir plus.');  
         }

      //Stat pour le dashboard
      $users=\App\Models\User::where('actif','oui')->get();
      $usersContrat=$users->groupBy('contrat');
      $usersStatut=$users->groupBy('statut');
      $usersCollege=$users->groupBy('college');
      //dd($usersCollege);
      $notes=\App\Models\Note::where('visible','oui')->orderBy('date','desc')->get();
    
      return view('dashbord',compact('notes','usersContrat','usersStatut','usersCollege'));
   }

   public function alerts($type)
   {
     $alerts=\App\Models\Alert::where('user_id',Auth::user()->id)
                                 ->where('typealert',$type)
                                 ->orderBy('date','desc')->get();

      return view('alerts.showAlerts',compact('alerts'));
   }

   public function goAlert($id)
   {
      $alert=\App\Models\Alert::where('id',$id)->where('user_id',Auth::user()->id)->first();
      $alert->etat="lu";
      $alert->save();

      if ($alert->typealert=="Contrats")
         return redirect()->route($alert->alert_route,['id'=>$alert->element_id]);
      else
         return redirect()->route($alert->alert_route);
   
   }


   public function profile()
   {
      $user=\Auth::user();
     return view('profile',compact('user'));
    }

  
   public function profilePost(Request $request)
   {
      
      $user=\Auth::user();
      
     if (\Hash::check($request->passwordActuel, $user->password) and $request->passwordNew1==$request->passwordNew2)
         {
                  $user->password=\Hash::make($request->passwordNew1);
                  $user->update();
                  return redirect()->route('dashboard')->with(['SuccessMessage'=>'Votre profile a été mis à jour.']);
         }
      else
      {
             return redirect()->route('profile')->with(['ErrorMessage'=>'Veuillez vérifier vos données !']);
      }
     
   }

   
  
}
