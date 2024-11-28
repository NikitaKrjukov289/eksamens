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
    Schema::table('trenins', function (Blueprint $table) {
        $table->unsignedBigInteger('treners_id')->nullable();
        $table->foreign('treners_id')->references('id')->on('treners')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('trenins', function (Blueprint $table) {
        $table->dropForeign(['treners_id']);
        $table->dropColumn('treners_id');
    });
}

};
