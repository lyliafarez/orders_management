<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detailscommandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("commande_id")->constrained("commandes","id")->onDelete("cascade");
            $table->foreignId("produit_id")->constrained("produits","id")->onDelete("cascade");
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailscommandes');
    }
};
