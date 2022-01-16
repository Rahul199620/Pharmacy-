<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doc_name', 50)->unique();  //'to be fixed by us
            $table->string('option_name', 50);  //'to be fixed by us  'i.e. GATEINSCRAP
            $table->string('carry_forward', 1)->default('N');   // Yes/No
            $table->string('value_dependent', 1)->default('N');   // Yes/No
            $table->decimal('min_value', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('document_dets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('doc_id')->default(0);
            $table->integer('s_no');
            $table->string('doc_disp_name', 50);  //'RC No
            $table->integer('doc_decimals');
            $table->string('doc_mandatory', 1)->default('Y');   // Yes/No
            $table->timestamps();
            $table->unique(['doc_id', 'doc_disp_name']);
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
