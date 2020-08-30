<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\RechercheRessource;
use Carbon\Carbon;
use App\User;

class RechercheController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //$user = User::find($id)->informationPersonnelles;
        //DB::table('users')->where('id', $id)->get()->find();
        $user = User::find($id);

        $users = User::with(['informationPersonnelles' , 'informationPhysique'])->where('id', '<>', $id)->get();

        $result = [];

        if(isset($request->recherche) && $request->recherche == 'true'){
            foreach($users as $u) {
                if($u->informationPersonnelles->sexe == $user->informationPersonnelles->sexe_cherche){
                    $u['age'] = Carbon::parse($u->informationPersonnelles['date_naissance'])->age;
                    if(isset($request->age_min) && isset($request->age_max) &&
                    $u['age'] >= $request->age_min && $u['age'] <= $request->age_max) {
                        $result[] = $u;
                    }
                }
            }
        } else {
            foreach($users as $u) {
                if($u->informationPersonnelles->sexe == $user->informationPersonnelles->sexe_cherche){
                    $u['age'] = Carbon::parse($u->informationPersonnelles['date_naissance'])->age;
                    if($u['age'] >= $user->informationPersonnelles->age_min &&
                    $u['age'] <= $user->informationPersonnelles->age_max) {
                        $result[] = $u;
                    }
                }
            }
        }

        //$users = User::with(['informationPersonnelles' => function ($query) {
            //error_log($query);
            //$query->where('sexe', 'M');
        //}])->get();

        return response()->json($result);
        //return new RechercheRessource(User::find(1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {
        //$user = User::find($id)->informationPersonnelles;
        //DB::table('users')->where('id', $id)->get()->find();
        $user =User::with(['informationPersonnelles' , 'informationPhysique'])->where('id', $id)->get();
        $user[0]['age'] = Carbon::parse(User::find($id)->informationPersonnelles['date_naissance'])->age;

        return response()->json($user);
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
        //
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
