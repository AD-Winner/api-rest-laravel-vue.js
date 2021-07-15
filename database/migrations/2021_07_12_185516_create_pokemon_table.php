<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
                $table->id();
                $table->string('name',50)->nullable();
                $table->string('type1',50)->nullable();
                $table->string('type2',50)->nullable();
                $table->integer('total')->nullable();
                $table->integer('hp')->nullable();
                $table->integer('attack')->nullable();
                $table->integer('defense')->nullable();
                $table->integer('sp_atk')->nullable();
                $table->integer('sp_def')->nullable();
                $table->integer('speed')->nullable();
                $table->integer('generation')->nullable();
                $table->string('legendary', 6)->nullable();
                $table->timestamps();
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}
