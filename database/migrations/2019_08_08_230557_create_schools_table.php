<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('statut_id');
            $table->date('date_creation');
            $table->text('description');
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('ville_id');
            $table->string('quartier_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('video_url')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('scholarite_info');
            $table->text('avantage_sup')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('schools');
    }
}
