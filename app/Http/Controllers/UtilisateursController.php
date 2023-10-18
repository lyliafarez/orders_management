<?php

namespace App\Http\Controllers;

use App\Models\utilisateurs;
use Illuminate\Http\Request;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = utilisateurs::all();
        return response()->json([
            'utilisateurs'=> $utilisateurs 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
       $utilisateur = utilisateurs::create([
        'nom'=>$request->nom ,
        'prenom'=>$request->prenom,
        'age'=>$request->age,
        'email'=>$request->email,
    ]);
        return response()->json(['utilisateur créé ',$utilisateur]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(utilisateurs $utilisateurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(utilisateurs $utilisateurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, 
     $id)
    {
        $utilisateur = utilisateurs::find($id);
    

        $utilisateur->nom = $request->nom;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->age = $request->age;
        $utilisateur->email = $request->email;
        
        $utilisateur->save();
            return response()->json(['utilisateur modifié ',$utilisateur]);
            //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $utilisateur = utilisateurs::find($id);
        $utilisateur->delete();
        return response()->json(['utilisateur supprimé ',$utilisateur]);

    }
}
