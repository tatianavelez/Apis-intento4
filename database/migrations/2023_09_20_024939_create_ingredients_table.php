<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type');
            $table->timestamps();
        });



        DB::table('ingredients')->insert([
            'name' => 'Limon',
            'type' => 'Fruta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('ingredients')->insert([
            'name' => 'Arroz',
            'type' => 'cereal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
