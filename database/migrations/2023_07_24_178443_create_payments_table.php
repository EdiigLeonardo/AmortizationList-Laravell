<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('amortization_id');
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('profile_id');
            $table->string('state');
            $table->timestamps();

            // Add foreign key constraints for amortization_id and profile_id columns
            $table->foreign('amortization_id')->references('id')->on('amortizations')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

