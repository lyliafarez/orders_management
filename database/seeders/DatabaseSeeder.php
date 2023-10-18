<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\commandes;
use App\Models\detailscommande;
use App\Models\produits;
use App\Models\utilisateurs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $utilisateur1 = utilisateurs::create([
            'nom'=>'deharo',
            'prenom'=>'florian',
            'age'=>24,
            'email'=>'florian@mail.com'
        ]);

        $utilisateur2 = utilisateurs::create([
            'nom'=>'farez',
            'prenom'=>'lylia',
            'age'=>21,
            'email'=>'lylia@mail.com'
        ]);

        $produit1 = produits::create([
            'nom_produit'=>'television',
            'prix'=>199.99,
            'stock'=>20
        ]);

        $produit2 = produits::create([
            'nom_produit'=>'ordinateur',
            'prix'=>299.99,
            'stock'=>40
        ]);

        $commande1 = commandes::create([
            'date_commande'=>'2023-10-18',
            'utilisateur_id'=>1
        ]);


        $commande2 = commandes::create([
            'date_commande'=>'2023-10-18',
            'utilisateur_id'=>2
        ]);

        $detail_commande1 = detailscommande::create([

            'commande_id'=>1,
            'produit_id'=>1,
            'quantite'=>3
        ]);

        $detail_commande2 = detailscommande::create([

            'commande_id'=>2,
            'produit_id'=>2,
            'quantite'=>1
        ]);
    }
}
