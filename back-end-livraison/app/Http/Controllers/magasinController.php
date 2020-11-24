<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class magasinController extends Controller
{
    public function index_magasin()
    {
        return magasin::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_magasin(Request $request)
    {
        if (magasin::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function show_magasin(Magasin $magasin)
    {
        return $magasin;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function update_magasin(Request $request, Magasin $magasin)
    {
        if ($magasin->update($request->all())) {
            return response()->json([
                'success' => 'Actualité modifiée avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function destroy_magasin(Magasin $magasin)
    {
        $magasin->delete();
    
    }

}






