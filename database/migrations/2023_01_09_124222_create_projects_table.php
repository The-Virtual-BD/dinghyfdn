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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('short_title');
            $table->foreignId('category_id')->constrained("categories")->onUpdate('cascade')->onDelete('cascade');
            $table->longText('body');
            $table->string('cover');
            $table->date('publish_date')->nullable();
            $table->bigInteger('target_fund')->default(0);
            $table->bigInteger('raised_fund')->default(0);
            $table->enum('status', ['active', 'disabled'])->default('active');
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
        Schema::dropIfExists('projects');
    }
};
