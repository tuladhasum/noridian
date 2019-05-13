<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557746255244ExampleTagPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('example_tag')) {
            Schema::create('example_tag', function (Blueprint $table) {
                $table->unsignedInteger('example_id');
                $table->foreign('example_id', 'example_id_fk_51648')->references('id')->on('examples');
                $table->unsignedInteger('tag_id');
                $table->foreign('tag_id', 'tag_id_fk_51648')->references('id')->on('tags');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('example_tag');
    }
}
