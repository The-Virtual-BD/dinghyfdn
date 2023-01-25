<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donar_firstname')->nullable();
            $table->string('donar_lasttname')->nullable();
            $table->string('donar_email');
            $table->string('phone');
            $table->longText('address')->nullable();
            $table->string('donation_ammount');
            $table->string('actual_donation_ammount')->nullable();
            $table->string('donation_method')->nullable();
            $table->string('donation_transaction_number')->nullable();
            $table->tinyInteger('donation_type')->default(1)->comment('1 => Dinghy Foundation, 2 => Specific Project',);
            $table->foreignId('project_id')->nullable()->constrained("projects");
            $table->tinyInteger('status')->default(1)->comment('1 => Interested, 2 => Contacted , 3 => Donated',);
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
        Schema::dropIfExists('donations');
    }
};
