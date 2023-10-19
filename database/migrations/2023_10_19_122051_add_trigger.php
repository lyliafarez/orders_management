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
        //
        DB::unprepared('
        CREATE TRIGGER SupprimerUtilisateur
        AFTER DELETE ON utilisateurs
        FOR EACH ROW 
        BEGIN
            DELETE FROM commandes
            WHERE utilisateur_id = OLD.id;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP TRIGGER IF EXISTS SupprimerUtilisateur;');
    }
};
