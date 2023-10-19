<?php

namespace App\Http\Controllers;

use App\Models\produits;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['products'=>produits::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = produits::create([
            'nom_produit'=>$request->nom_produit,
            'prix'=>$request->prix,
            'stock'=>$request->stock,
        ]);

        return response()->json(["product"=>$product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(produits $produits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product= produits::find($id);
        $product->nom_produit = $request->nom_produit;
        $product->prix = $request->prix;
        $product->stock = $request->stock;
        $product->save();

        return response()->json(["product"=>$product]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product= produits::find($id);
        $product->delete();

        return response()->json(["product"=>$product]);

    }
}
