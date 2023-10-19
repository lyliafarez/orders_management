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
       /*  detailscommande::truncate();
        commandes::truncate();
        utilisateurs::truncate();
        produits::truncate(); */

        //seed users
        $users['nom']=['Alpha', 'Bravo', 'Charlie', 'Delta', 'Echo', 'Foxtrot', 'Golf', 'Hotel', 'India', 'Juliet', 'Kilo', 'Lima', 'Mike'];
        $users['prenom']=['Floriant','Meriam','Lylia','Alice', 'Bob', 'Charlie', 'David', 'Eva', 'Frank', 'Grace', 'Harry', 'Ivy', 'Jack'];
        $users['age']= [22, 34, 28, 45, 19, 56, 30, 42, 25, 37, 41, 29, 33];
        $users['email']= [
        'user1@example.com',
        'john.doe@gmail.com',
        'alice_smith@yahoo.com',
        'jane_doe@hotmail.com',
        'test_user@domain.com',
        'email123@site.net',
        'random_email@web.org',
        'hello.world@emailprovider.com',
        'sample_email@server.io',
        'user456@webmail.co',
        'newuser@emailservice.net',
        'email_tester@domain.org',
        'demo@example.net'];

        for($i=0; $i<count($users['nom']);$i++)
        {
            if(utilisateurs::Where('email', $users['email'][$i])->first() == null) {
                utilisateurs::create(['nom' => $users['nom'][$i], 'prenom'=>$users['prenom'][$i] , 'age'=>$users['age'][$i], 'email'=>$users['email'][$i]]);
            }
        }

        //seed products
        $products['nom_produit'] = [
            'Smartphone',
            'Laptop',
            'Headphones',
            'Digital Camera',
            'Fitness Tracker',
            'Bluetooth Speaker',
            'Coffee Maker',
            'Tablet',
            'Gaming Console',
            'Wireless Mouse',
            'Portable Charger',
            'Smart Watch',
            'Robot Vacuum'
        ];
        $products['prix'] =[
            299.99,
            899.95,
            49.99,
            199.50,
            129.99,
            79.95,
            349.00,
            599.99,
            149.95,
            249.50,
            169.99,
            449.95,
            299.00
        ];
        $products['stock'] = [
            50,
            120,
            30,
            75,
            90,
            20,
            65,
            100,
            42,
            88,
            60,
            110,
            25
        ];

        for($i=0; $i<count($products['nom_produit']);$i++)
        {
            if(produits::Where('nom_produit', $products['nom_produit'][$i])->first() == null) {
                produits::create(['nom_produit' => $products['nom_produit'][$i], 'prix'=>$products['prix'][$i] , 'stock'=>$products['stock'][$i]]);
            }
        }


        // seed orders

        /* $orders['utilisateur_id'] = [1,2,6,6,7,5,4,5,5,6,5,9,5];
        $orders['date_commande'] = ['2023-10-18','2023-10-10','2023-10-19','2023-10-04','2023-10-06','2023-10-18','2023-10-17','2023-10-10','2023-10-11','2023-10-12','2023-10-11','2023-10-12','2023-10-13'];
 */     
        foreach(utilisateurs::all() as $user)
        {
            
                commandes::create(['date_commande' => '2023-10-18', 'utilisateur_id' =>$user->id ]);
            
        }

        $orders_details['commande_id'] = [1,2,3,4,1,6,7,8,9,10,5,9,2];
        $orders_details['produit_id'] = [1,2,3,4,5,6,7,8,9,10,9,11,2];
        $orders_details['quantite'] = [1,2,3,1,2,2,4,3,5,6,5,4,5];
        foreach(commandes::all() as $order)
        {
            foreach(produits::all() as $product){
                detailscommande::create(['commande_id' => $order->id, 'produit_id' => $product->id ,'quantite' => random_int(1, 7)]);
            }
           
                
            
        }

    }
}
