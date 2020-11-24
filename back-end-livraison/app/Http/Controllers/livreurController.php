<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livreur;
use App\Models\zone;
use DB;

class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_livreur()
    {
        //$var = Livreur::all();
        //return $var->toJson();
        return Livreur::all();
        //return Livreur::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_livreur(Request $request)
    {
        if (Livreur::create($request->all())) {
            return response()->json([
                'success' => 'livreur créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_livreur(Livreur $livreur)
    {
        // return livreur::find($livreur->id_livreur);
        return $livreur; 
    }

    public function show_livreur_nom(Request $request)
    {
        $nom = $request->nom;
        $chercher = livreur::where('nom', $nom)->get();
        return $chercher->toJson();         
    }

    public function show_livreur_prenom(Request $request)
    {
        $prenom = $request->prénom;
        $chercher = livreur::where('prénom', $prenom)->get();
        return $chercher->toJson(); 
    }

    public function show_livreur_email(Request $request)
    {
        $mail = $request->mail;
        $chercher = livreur::where('mail', $mail)->get();
        return $chercher->toJson(); 
    }

    public function show_livreur_numero(Request $request)
    {
        $num = $request->num;
        $chercher = livreur::where('num', $num)->get();
        return $chercher->toJson(); 
    }
    

    public function get_zones()
    {
        //recuperer les zones
        //$zones = zone::all();
        $zones = DB::table('zone')->get();
        return view('livreur/zone')->with('z',$zone);
    }

    public function show_livreur_zone_choisi(Request $request)
    {
        $z = $request->get('zone');
        $select = DB::table ('zone')->where('nom_zone', $z)->first();
        $selct = DB::table('livreurs')->where('id_zone', $select->id_zone)->get();  
        return view('livreur/affichage')->with('l', $selct); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_livreur(Request $request, livreur $livreur)
    {
        if ($livreur->update($request->all())) {
            return response()->json([
                'success' => 'livreur modifiée avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_livreur(livreur $livreur)
    {
        $livreur->delete();
    }
}



