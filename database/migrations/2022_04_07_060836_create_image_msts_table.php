<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_msts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ben_id')->unsigned()->nullable();
            $table->foreign('ben_id')->references('id')->on('election_surveys')->onDelete('cascade');
            $table->string('ben_image')->nullable();
            $table->boolean('status')->nullable();
            $table->string('create_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('image_msts');
    }
}
