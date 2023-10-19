<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUtilisateurRequest;
use App\Models\commandes;
use App\Models\detailscommande;
use App\Models\produits;
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
            'utilisateurs' => $utilisateurs
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
    public function store(StoreUtilisateurRequest $request)
    {
        $utilisateur = utilisateurs::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'email' => $request->email,
        ]);
        return response()->json([ 'user' => $utilisateur]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = utilisateurs::find($id);
        return response()->json([
            'user'=>$user
        ]);
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
    public function update(
        StoreUtilisateurRequest $request,
        $id
    ) {
        $utilisateur = utilisateurs::find($id);


        $utilisateur->nom = $request->nom;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->age = $request->age;
        $utilisateur->email = $request->email;

        $utilisateur->save();
        return response()->json(['utilisateur modifié ', $utilisateur]);
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
        return response()->json(['utilisateur supprimé ', $utilisateur]);
    }

    public function getAvgAge()
    {
        $avg = utilisateurs::avg('age');

        return response()->json(["avg_age" => $avg, "total_users" => count(utilisateurs::all())]);
    }

    public function getUserWithOrder($id = null)
    {

        $list = collect();
        if ($id != null) {
            $user = utilisateurs::find($id);
            if (count($user->commandes()->get()) > 0) {
                $list->push([
                    'user' => $user->nom_complet,
                    'total_order_nbr' => count($user->commandes()->get()),
                ]);
            }
        } else {
            $users = utilisateurs::all();
            foreach ($users as $user) {
                if (count($user->commandes()->get()) > 0) {
                    $list->push([
                        'user' => $user->nom_complet,
                        'total_order_nbr' => count($user->commandes()->get()),
                    ]);
                }
            }
        }

        return response()->json(["list" => $list]);
    }



    public function getUsersWithproducts($id = null)
    {
        $list = collect();

        if ($id != null) {
            $user = utilisateurs::find($id);
            $prod_list = collect();
            if (count($user->commandes()->get()) > 0) {
                $orders = $user->commandes()->get();
                foreach ($orders as $order) {
                    $produit = produits::whereHas('detailscommande', function ($q) use ($order) {
                        $q->where('commande_id', $order->id);
                    })->pluck('nom_produit');

                    $prod_list->push(...$produit);
                }
            }

            $list->push([
                'user' => $user->nom,
                'produit' => $prod_list->unique()
            ]);
        } else {

            $users = utilisateurs::all();
            foreach ($users as $user) {
                $prod_list = collect();
                if (count($user->commandes()->get()) > 0) {
                    $orders = $user->commandes()->get();
                    foreach ($orders as $order) {
                        $produit = produits::whereHas('detailscommande', function ($q) use ($order) {
                            $q->where('commande_id', $order->id);
                        })->pluck('nom_produit');

                        $prod_list->push(...$produit);
                    }
                }

                $list->push([
                    'user' => $user->nom,
                    'produit' => $prod_list->unique()
                ]);
            }
        }

        return response()->json(["list" => $list]);
    }


    public function getUserWithOrderTotalPrice($id = null)
    {
        $list = collect();
        if ($id != null) {
            $user = utilisateurs::find($id);
            $order_list = collect();
            if (count($user->commandes()->get()) > 0) {
                $orders = $user->commandes()->get();
                $sum = 0;
                foreach ($orders as $order) {
                    $detail_list = collect();

                    foreach ($order->details()->get() as $detail) {
                        $produit = produits::find($detail->produit_id);
                        $sum += $detail->quantite * $produit->prix;
                        $detail_list->push([
                            'product' => $produit->nom_produit,
                            'quantité' => $detail->quantite
                        ]);
                    }
                }
                $order_list->push([
                    "total_price" => $sum,
                    "products_list" => $detail_list

                ]);
            }

            $list->push([
                'user' => $user->nom_complet,
                'detail' => $order_list

            ]);
        } else {

            $users = utilisateurs::all();
            foreach ($users as $user) {
                $order_list = collect();
                if (count($user->commandes()->get()) > 0) {
                    $orders = $user->commandes()->get();
                    $sum = 0;
                    foreach ($orders as $order) {
                        $detail_list = collect();

                        foreach ($order->details()->get() as $detail) {
                            $produit = produits::find($detail->produit_id);
                            $sum += $detail->quantite * $produit->prix;
                            $detail_list->push([
                                'product' => $produit->nom_produit,
                                'quantité' => $detail->quantite
                            ]);
                        }
                    }
                    $order_list->push([
                        "total_price" => $sum,
                        "products_list" => $detail_list

                    ]);
                }

                $list->push([
                    'user' => $user->nom_complet,
                    'detail' => $order_list

                ]);
            }
        }

        return response()->json(["list" => $list]);
    }
}
