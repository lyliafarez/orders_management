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
        $procedure = "DROP PROCEDURE IF EXISTS `get_nbr_order_per_user`;            
        CREATE PROCEDURE `get_nbr_order_per_user` (IN id int)            BEGIN        
            SELECT COUNT(*) AS total FROM commandes WHERE utilisateur_id = id;            END;";      
                \DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
