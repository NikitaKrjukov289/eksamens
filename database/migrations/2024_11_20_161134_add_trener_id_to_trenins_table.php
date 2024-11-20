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
        Schema::table('trenins', function (Blueprint $table) {
            $table->unsignedBigInteger('trener_id')->nullable()->after('address'); 
            $table->foreign('trener_id')->references('id')->on('treners')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trenins', function (Blueprint $table) {
            $table->dropForeign(['trener_id']); 
            $table->dropColumn('trener_id'); 
        });
    }
};

