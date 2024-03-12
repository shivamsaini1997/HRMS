<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolkitDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toolkit_details', function (Blueprint $table) {
            $table->id();
            $table->string('toolkit_category')->comment("Toolkit category");
            $table->string('toolkit_title')->comment("Toolkit title based on category");
            $table->longtext('what_is_it')->comment("Toolkit what is it");
            $table->longtext('how_it_helps')->comment("Toolkit how it helps");
            $table->longtext('toolkit_title_desc')->comment("Toolkit title description");
            $table->longtext('use_cases_desc')->comment("Use cases description");
            $table->longtext('limitations_desc')->comment("Limitation Description");
            $table->longtext('sbs_desc')->comment("Step by step description");
            $table->string('table_img')->comment("How look default doc immage");
            $table->string('exmp_img')->comment("Example default doc image");
            $table->longtext('understanding_the_tool')->comment("Understanding the tool details");
            $table->string('toolkit_doc')->comment("Toolkit document");
            $table->string('toolkit_category_slug');
            $table->string('toolkit_title_slug');
            $table->enum('status', ['A', 'D'])->comment("A=>Activate,D=>Deactivate");
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
        Schema::dropIfExists('toolkit_details');
    }
}
