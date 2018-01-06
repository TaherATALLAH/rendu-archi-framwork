<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('designation');
            $table->text('description');
            $table->double('prix');
            $table->double('solde');
            $table->integer('quantite');
            $table->string('categorie');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->integer('vendeur_id') -> default(0);
            $table->foreign('vendeur_id')
                  ->references('id')->on('vendeur')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::drop('produits');
    }
}
