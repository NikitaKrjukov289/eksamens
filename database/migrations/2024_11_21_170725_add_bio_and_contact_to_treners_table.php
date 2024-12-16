<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('treners', function (Blueprint $table) {
        $table->text('bio')->nullable(); 
        $table->string('contact')->nullable(); 
    });
}

public function down()
{
    Schema::table('treners', function (Blueprint $table) {
        $table->dropColumn(['bio', 'contact']);
    });
}

};
