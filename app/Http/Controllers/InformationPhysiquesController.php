<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationPhysiquesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $i_ph = DB::table('information_physiques')->where('user_id', $id)->get();
        return response()->json($i_ph);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //'continent' => 'required|string',
           // 'taille' => 'required|numeric',
            //'couleur_peau' => 'required|string',
            //'silhouette' => 'required|string',
           // 'couleur_yeux' => 'required|string',
            //'couleur_cheuveux' => 'required|string',
        ]);

        $affected = DB::table('information_physiques')
              ->where('user_id', $id)
              ->update([
                'continent' => $request->continent,
                'taille' => $request->taille,
                'couleur_peau' => $request->couleur_peau,
                'silhouette' => $request->silhouette,
                'couleur_yeux' => $request->couleur_yeux,
                'couleur_cheuveux' => $request->couleur_cheuveux
              ]);

        //return response()->json(url('/').'/images/'.$name);
        return response()->json('Informations physique suavegardées avec succès');
    }
}
