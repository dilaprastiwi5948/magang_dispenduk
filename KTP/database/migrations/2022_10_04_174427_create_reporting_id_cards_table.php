<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReportingIdCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporting_id_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId("reportingtype_id")->constrained('reporting_types');
            $table->foreignId("submissiontype_id")->constrained('submission_types');
            $table->foreignId("explanationtype_id")->constrained('explanation_types');
            $table->string("nik");
            $table->string("name");
            $table->date('birthdate');
            $table->string('birthplace');
            $table->text('address');
            $table->text('sub_districts');
            $table->text('districts');
            $table->text('city');
            $table->text('province');
            $table->foreignId('created_by')->constrained('users');
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
        Schema::dropIfExists('reporting_id_cards');
    }
}
