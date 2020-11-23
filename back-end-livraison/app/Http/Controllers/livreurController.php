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
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_livreur()
    {
        return view('livreur/formulaire_ajout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_livreur(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prénom' => 'required',
            'mail' => 'required',
            'num' => 'required'
        ]);
        $data = array(
            'nom' => $request->nom,
            'prénom' => $request->prénom,
            'mail' => $request->mail,
            'num' => $request->num,
        );

        $new = livreur::create($request->all());
        
        if($new){
            return response()->jason([
                'data' =>[
                    'type' => '',
                    'message' => 'success',
                    'id' => $new->id_livreur,
                    'attributs'=>$new
                ]
                ], 201);
        } else {
            return response()->json([
                'type' => '',
                'message' =>'Fail'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_livreur()
    {
        return view('livreur/chercher');
    }

    public function show_livreur_nom_choisi(Request $request)
    {
        $nom = $request->get('nom');
        $selct = DB::table ('livreurs')->where('nom', $nom)->get();  
        //->where ([['niveau', $varNiveau], ['grp', $varGrp]])
        //$data = DB::table('userquestion')->where('userEmail', '=', auth()->user()->email)->get();
        return view('livreur/affichage')->with('l', $selct); 
    }

    public function show_livreur_prenom_choisi(Request $request)
    {
        $prenom = $request->get('prénom');
        $selct = DB::table ('livreurs')->where('prénom', $prenom)->get();  
        return view('livreur/affichage')->with('l', $selct); 
    }

    public function show_livreur_email_choisi(Request $request)
    {
        $mail = $request->get('mail');
        $selct = DB::table ('livreurs')->where('mail', $mail)->get();  
        return view('livreur/affichage')->with('l', $selct); 
    }

    public function show_livreur_numero_choisi(Request $request)
    {
        $num = $request->get('num');
        $selct = DB::table ('livreurs')->where('num', $num)->get();  
        return view('livreur/affichage')->with('l', $selct); 
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_livreur($id)
    {
        $data= livreur::find($id);
        return view('livreur/edit', ['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_livreur(Request $request)
    {
        $data=livreur::find($request->livreur_id);
        $data->nom=$request->nom;
        $data->prénom=$request->prénom;
        $data->mail=$request->mail;
        $data->num=$request->num;
        $zone= DB::table ('zone')->where('nom_zone', $request->zone)->first();
        $data->id_zone=$zone->id_zone;
        $data->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_livreur($id)
    {
        DB::delete('delete from livreurs where id_livreur = ?',[$id]);
        return redirect('dashboard');
    }
}



