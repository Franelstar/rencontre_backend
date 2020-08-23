<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformationPersonnelles;
use App\Http\Resources\InformationPersonnellesRessource;
use Illuminate\Support\Facades\DB;

class InformationPersonnellesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string'
        ]);

        $info_persos = new InformationPersonnelles([
            'nom' => $request->nom,
        ]);

        $info_persos->save();
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $i_p = DB::table('information_personnelles')->where('user_id', $id)->get();
        return response()->json($i_p);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'sexe' => 'required|string|max:1',
            'date_naissance' => 'required|date',
            'o_sexuele' => 'required|numeric',
            'apropro' => 'required|string',
            'sexe_cherche' => 'required|string|max:1',
            'age_min' => 'required|numeric|min:18|max:100',
            'age_max' => 'required|numeric|min:18|max:100',
            //'photo' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);


        if (!$request->hasFile('photo')) {
            $affected = DB::table('information_personnelles')
              ->where('user_id', $id)
              ->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'sexe' => $request->sexe,
                'date_naissance' => $request->date_naissance,
                'o_sexuele' => $request->o_sexuele,
                'sexe_cherche' => $request->sexe_cherche,
                'apropro' => $request->apropro,
                'age_min' => $request->age_min,
                'age_max' => $request->age_max
              ]);

              return response()->json('Informations personnelles suavegardées avec succès');
        }

        $image = $request->file('photo');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $affected = DB::table('information_personnelles')
              ->where('user_id', $id)
              ->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'sexe' => $request->sexe,
                'date_naissance' => $request->date_naissance,
                'o_sexuele' => $request->o_sexuele,
                'sexe_cherche' => $request->sexe_cherche,
                'apropro' => $request->apropro,
                'age_min' => $request->age_min,
                'age_max' => $request->age_max,
                'photo' => $name
              ]);

        return response()->json(url('/').'/images/'.$name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
