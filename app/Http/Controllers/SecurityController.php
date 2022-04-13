<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function adminEditSecurite($id)
    {
        $securite=\App\Models\Securite::where('id',$id)->first();
        return view('admin.adminEditSecurite',compact('securite'));
    }

    public function adminEditSecuritePost(Request $request)
    {
        $securite=\App\Models\Securite::where('id',$request->id)->first();
        $securite->commentaire=\Carbon\Carbon::now()." :<b> ".\Auth::user()->name." </b>: ".$request->commentaire."<br/>".$securite->commentaire;
        $securite->etat=$request->etat;
        $securite->update();

        return redirect()->route('adminShowSecurites');
    }

    public function rh_managerEditSecurite($id)
    {
        $securite=\App\Models\Securite::where('id',$id)->first();
        return view('rh_manager.rh_managerEditSecurite',compact('securite'));
    }

    public function rh_managerEditSecuritePost(Request $request)
    {
        $securite=\App\Models\Securite::where('id',$request->id)->first();
        $securite->commentaire=\Carbon\Carbon::now()." :<b> ".\Auth::user()->name." </b>: ".$request->commentaire."<br/>".$securite->commentaire;
        $securite->etat=$request->etat;
        $securite->update();

        return redirect()->route('rh_ShowSecurites');
    }

    public function adminShowSecurites(Request $request)
    {
        $securites=\App\Models\Securite::all();
        return view('admin.adminShowSecurites',compact('securites'));
    }

    public function rh_ShowSecurites(Request $request)
    {
        $securites=\App\Models\Securite::all();
        return view('rh_manager.rh_ShowSecurites',compact('securites'));

    }

   
}
