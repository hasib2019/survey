<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_surveys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('district')->nullable();
            $table->string('upazilas')->nullable();
            $table->string('unions')->nullable();
            $table->string('informer_name')->nullable();
            $table->string('informer_designation')->nullable();
            $table->string('holding')->nullable();
            $table->string('village')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('edu_qualification')->nullable();
            $table->string('family_member')->nullable();
            $table->string('land_percent_abadi')->nullable();
            $table->string('land_percent_onabadi')->nullable();
            $table->string('family_income')->nullable();
            $table->string('personal_income')->nullable();
            $table->string('annual_income')->nullable();
            $table->string('amount_income')->nullable();
            $table->string('domestic_animal')->nullable();
            $table->string('hybrid_animal')->nullable();
            $table->string('improved_varieties')->nullable();
            $table->string('animal_status')->nullable();
            $table->string('wish_animal')->nullable();
            $table->string('disadvantages_types')->nullable();
            $table->string('any_loan_source')->nullable();
            $table->string('allowance_source')->nullable();
            $table->string('wish_project_loan')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('election_surveys');
    }
}
