<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557511310853ProductsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('products');
    }
}
