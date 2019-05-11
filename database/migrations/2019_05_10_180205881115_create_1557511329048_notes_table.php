<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557511329048NotesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('notes')) {
            Schema::create('notes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('project_id')->nullable();
                $table->foreign('project_id', 'project_fk_48472')->references('id')->on('projects');
                $table->longText('note_text')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
