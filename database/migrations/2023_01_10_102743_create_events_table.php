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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('short_title');
            $table->foreignId('category_id')->constrained("categories")->onUpdate('cascade')->onDelete('cascade');
            $table->longText('body');
            $table->string('cover');
            $table->date('date_one');
            $table->date('date_two')->nullable();
            $table->time('time_one');
            $table->time('time_two')->nullable();
            $table->longText('address_line_one')->nullable();
            $table->longText('address_line_two')->default();
            $table->longText('address_line_three')->default();
            $table->longText('address_line_four')->default();
            $table->string('organizer_name')->nullable();
            $table->string('organizer_phone')->nullable();
            $table->string('organizer_webname')->nullable();
            $table->string('organizer_weblink')->nullable();
            $table->enum('status', ['upcomming', 'completed', 'canceled'])->default('upcomming');
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
        Schema::dropIfExists('events');
    }
};
