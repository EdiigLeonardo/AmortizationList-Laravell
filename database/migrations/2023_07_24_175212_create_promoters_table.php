<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotersTable extends Migration
{
    public function up()
    {
        Schema::create('promoters', function (Blueprint $table) {
            $table->id();
            // Add columns specific to the promoter model
            $table->string('name');
            $table->string('contact_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promoters');
    }
}

