<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function adminShowProduits()
    {
        $produits=\App\Models\Produit::with('categorie')->get();
        return view('admin.adminShowProduits', compact('produits'));
    }

    public function adminShowProduit($id)
    {
        $produit=\App\Models\Produit::where('id',$id)->with('categorie')->first();
        return view('admin.adminShowProduit', compact('produit'));
    }

  
    public function adminAddProduit()
    {
        $categories=\App\Models\Categorie::all();
        return view('admin.adminAddProduit',compact('categories'));
    }

    public function adminAddProduitPost(Request $request)
    {
        $produit = new \App\Models\Produit();

        $produit->nom=$request->nom;
        $produit->prix=$request->prix;
        $produit->description=$request->description;
        $produit->categorie_id=$request->categorie_id;

        $produit->save();

        return redirect()->route('adminShowProduits');
    }


    public function adminEditProduit($id)
    {
        $produit=\App\Models\Produit::where('id',$id)->first();
        $categories=\App\Models\Categorie::all();
        return view('admin.adminEditProduit',compact('produit','categories'));
    }

    public function adminEditProduitPost(Request $request)
    {
        $produit=\App\Models\Produit::where('id',$request->id)->first();

        $produit->nom=$request->nom;
        $produit->prix=$request->prix;
        $produit->description=$request->description;
        $produit->categorie_id=$request->categorie_id;

        $produit->update();

        return redirect()->route('adminShowProduits');
    }


    public function adminDeleteProduit($id)
    {
        $produit=\App\Models\Produit::where('id',$id)->first();
        return view('admin.adminDeleteProduit',compact('produit'));
    }

    public function adminDeleteProduitPost(Request $request)
    {
        $produit=\App\Models\Produit::where('id',$request->id)->first();
        $produit->delete();

        return redirect()->route('adminShowProduits');
    }



    



}
