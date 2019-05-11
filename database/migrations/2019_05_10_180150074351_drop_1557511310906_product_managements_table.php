<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557511310906ProductManagementsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('product_managements');
    }
}
